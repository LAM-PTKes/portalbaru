<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SecureFileController extends Controller
{
    public function serveDocument(Request $request, $filename, $folder = null)
    {
        
        try {

            // Cek berdasarkan jumlah parameter di route
            $routeName = $request->route()->getName();

            if ($routeName === 'secure.document.nested') {
                // Route dengan nested folder: folder/subfolder/{filename}
                // Parameter: $filename = folder, $folder = subfolder, dan ada parameter ketiga untuk filename
                $allParams = $request->route()->parameters();
                $actualFolder = $allParams['folder'] . '/' . $allParams['subfolder'];
                $actualFilename = $allParams['filename'];
            }else if ($routeName === 'secure.document.folder') {
                // Route dengan folder: folder/{filename}
                $actualFolder = $filename; // parameter pertama adalah folder
                $actualFilename = $folder; // parameter kedua adalah filename
            } else {
                // Route tanpa folder: {filename}
                $actualFolder = null;
                $actualFilename = $filename;
            }

             

            // Decode URL untuk handle karakter spesial
            $actualFilename = urldecode($actualFilename);
            if ($actualFolder) {
                $actualFolder = urldecode($actualFolder);
            }

            // Log untuk debugging
            \Log::info('File request', [
                'route' => $routeName,
                'folder' => $actualFolder,
                'filename' => $actualFilename,
                'original_params' => ['filename' => $filename, 'folder' => $folder]
            ]);

            
            // Validasi untuk mencegah directory traversal
            if (preg_match('/\.\.\/|\.\.\\\\/', ($actualFolder ?? '') . $actualFilename)) {
                abort(403, 'Invalid file path');
            }
            
            if ($actualFolder) {
                // Daftar folder yang diizinkan
                $allowedFolderPatterns = [
                    '/^[0-9]+-[A-Z]+$/',  
                    '/^album$/',
                    '/^album\/gallery$/', // Support nested folder
                    '/^cover$/',
                    '/^unduhan$/',
                    '/^img$/',
                    '/^newsletter$/',
                    '/^riset$/',
                    '/^renstra$/',
                    '/^jurnal$/',
                ];
                

                $folderValid = false;
                foreach ($allowedFolderPatterns as $pattern) {
                    if (preg_match($pattern, $actualFolder)) {
                        $folderValid = true;
                        break;
                    }
                }

                

                if (!$folderValid) {
                    \Log::warning('Invalid folder format', [
                        'folder' => $actualFolder,
                        'allowed_patterns' => $allowedFolderPatterns
                    ]);
                    abort(403, 'Invalid folder format');
                }
            }

           

            

            // Validasi extension file
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp','pdf','doc','docx','xls','xlsx','ppt','pptx','zip','zip'];
            $extension = strtolower(pathinfo($actualFilename, PATHINFO_EXTENSION));
            if (!in_array($extension, $allowedExtensions)) {
                abort(403, 'File type not allowed');
            }

            // Build file path
            $disk = Storage::disk('nfs_documents');
            $filePath = '';
            
            if ($actualFolder) {
                $filePath = $actualFolder . '/' . $actualFilename;
            } else {
                $filePath = $actualFilename;
            }

            // Log file path untuk debugging
            \Log::info('Looking for file', ['path' => $filePath]);

            // Coba find file dengan berbagai encoding
            if (!$disk->exists($filePath)) {
                $alternativeFilenames = [
                    $actualFilename,
                    rawurldecode($actualFilename),
                    html_entity_decode($actualFilename),
                    str_replace('%20', ' ', $actualFilename),
                    str_replace('+', ' ', $actualFilename),
                    // Tambahan untuk handle karakter spesial
                    str_replace(['%28', '%29'], ['(', ')'], $actualFilename),
                    // Kombinasi decode
                    str_replace(['%20', '%28', '%29'], [' ', '(', ')'], $actualFilename)
                ];
                

                $found = false;
                foreach ($alternativeFilenames as $altFilename) {
                    
                    $altPath = '';
                    if ($actualFolder) {
                        $altPath .= $actualFolder . '/';
                    }

                    
                    $altPath .= $altFilename;
                   
                    if ($disk->exists($altPath)) {
                        $filePath = $altPath;
                        $actualFilename = $altFilename;
                        $found = true;
                        break;
                    }
                }

                

                if (!$found) {
                    \Log::warning('File not found', [
                        'requested_path' => $filePath,
                        'alternatives_tried' => $alternativeFilenames
                    ]);
                    abort(404, 'File not found');
                }
            }

            // Get file content
            $file = $disk->get($filePath);
            $mimeType = $disk->mimeType($filePath);

            // Set proper headers berdasarkan file type
            $headers = [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . $actualFilename . '"',
                'Cache-Control' => 'public, max-age=3600',
                'Expires' => gmdate('D, d M Y H:i:s \G\M\T', time() + 3600),
            ];

            return Response::make($file, 200, $headers);

        } catch (\Exception $e) {
            \Log::error('File serving error: ' . $e->getMessage(), [
                'filename' => $filename ?? 'none',
                'folder' => $folder ?? 'none',
                'trace' => $e->getTraceAsString()
            ]);
            abort(404, 'File not found');
        }
    }
}
