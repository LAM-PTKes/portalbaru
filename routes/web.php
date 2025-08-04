<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');


// PAGE INDONESIA
Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/Gallery', 'BerandaController@photo')->name('gallery');
Route::get('/Gallery-Video', 'BerandaController@video')->name('tvideo');
Route::get('/Gallery/{cover}/Album-Photo', 'BerandaController@albumdetail')->name('aphoto');
Route::get('/Hubungi-Kami', 'BerandaController@hubkami')->name('hubkami');
Route::get('/Sertifikat', 'BerandaController@srtakre')->name('srtfakre');
Route::get('/sertifikat/{sk_id}/{ser_digital_id}', 'BerandaController@Sertifikat')->name('sertifikatapi');

Route::get('/Hasil-Pencarian', 'AwalController@search')->name('cari');
Route::get('/Profil', 'AwalController@profil')->name('bprofil');
Route::get('/Organisasi', 'AwalController@torgan')->name('torgan');
Route::get('/Newsletter', 'AwalController@tnewslet')->name('tnewsletter');
Route::get('/Company-Profile', 'AwalController@tcmpny')->name('tcom');
Route::get('/Berita', 'AwalController@tberita')->name('tberita');
Route::get('/Regulasi', 'AwalController@regulasi')->name('regulasi');
Route::get('/Regulasi/Undang-undang', 'AwalController@reguu')->name('reguu');
Route::get('/Regulasi/Peraturan/Presiden', 'AwalController@regpres')->name('regpres');
Route::get('/Regulasi/Peraturan/Pemerintah', 'AwalController@regpem')->name('regpem');
Route::get('/Regulasi/Peraturan/Menteri', 'AwalController@regmen')->name('regmen');
Route::get('/Regulasi/Peraturan/BAN-PT', 'AwalController@regbanpt')->name('regbanpt');
Route::get('/Regulasi/Peraturan/LAM-PTKes', 'AwalController@reglamptkes')->name('reglamptkes');
Route::get('/Kegiatan-LAM-PTKes', 'AwalController@tagenda')->name('tagenda');
Route::get('/Pengumuman', 'AwalController@tpengumuman')->name('tpengumuman');
Route::get('/Capaian-Tahunan', 'AwalController@capaian')->name('tcapaian');
Route::get('/File-Unduhan', 'AwalController@unduhan')->name('tunduhan');
Route::get('/Faq', 'AwalController@tfaq')->name('tfaq');
Route::get('/Saran', 'AwalController@saran')->name('tsaran');
Route::get('/Site-Map', 'AwalController@tsitemap')->name('tsitemap');
Route::get('/Manual-SIMAk', 'AwalController@tmanual')->name('tmanualsimak');
Route::get('/Glosarium', 'AwalController@tglosa')->name('tglosariumakreditasi');

Route::get('/Dokumen-Persyaratan-Akreditasi', 'AwalController@tdokakred')->name('tdokper');
Route::get('/Biaya-Akreditasi', 'AwalController@tbiaya')->name('tbiayakred');
Route::get('/Pengembalian-Dana', 'AwalController@tbalikin')->name('tpd');
Route::get('/Pajak-dan-Bukti-Potong', 'AwalController@tpabut')->name('tpbp');
Route::post('saran/store', 'PesanController@store')->name('saran.store');

Route::get('/Hasil-Pencarian-Database-Hasil-Akreditasi', 'HasilAkreditasiController@caridha')->name('cdha');
Route::get('/Riwayat-Hasil-Akreditasi', 'HasilAkreditasiController@riwayat')->name('riwayat');
Route::get('/Tampil-Database-Hasil-Akreditasi', 'HasilAkreditasiController@alldha')->name('alldha');
Route::get('/Tim-Penilai', 'HasilAkreditasiController@timp')->name('timp');
Route::get('/Database-Hasil-Akreditasi', 'HasilAkreditasiController@tdhakre')->name('dhakre');
Route::get('/File-Unduhan-Instrumen-7-standar', 'HasilAkreditasiController@instrumenundh')->name('iakre');
Route::get('/File-Unduhan-Instrumen-9-kriteria', 'HasilAkreditasiController@instrumensembilan')->name('iakresembilan');
Route::get('/File-Unduhan-Instrumen-Izin-Prodi-Baru', 'HasilAkreditasiController@instrumenminimum')->name('iakreminimum');
// Route::get('/File-Unduhan-Instrumen-APS-Kualitatif', 'HasilAkreditasiController@instrumendelapan')->name('iakredelapan');
Route::get('/Instrumen-APS-Kualitatif-Terakreditasi', 'HasilAkreditasiController@instrumenapsterakred')->name('iakreapsterakred');
Route::get('/Instrumen-APS-Kualitatif-Terakreditasi-Unggul', 'HasilAkreditasiController@instrumenapsunggul')->name('iakreapsterakredunggul');

Route::get('/Proses-Akreditasi', 'HasilAkreditasiController@db_prodi')->name('pakre');
Route::get('/Alur-dan-Tahapan-Akreditasi', 'HasilAkreditasiController@tqaakre')->name('tqaakre');
Route::get('/akreditasi/spmi', 'HasilAkreditasiController@lamptkesapi')->name('lamptkesapi');
Route::get('/cron/update', 'HasilAkreditasiController@cronup')->name('cronup');
Route::get('/cron/cek', 'HasilAkreditasiController@croncek')->name('croncek');
//inu//
Route::get('/Rapat-Anggota', 'AwalController@rapatanggota')->name('rapatanggota');
Route::get('/Pengawas', 'AwalController@pengawas')->name('pengawas');
Route::get('/Pengurus', 'AwalController@pengurus')->name('pengurus');
Route::get('/Koordinator', 'AwalController@koordinator')->name('koordinator');
Route::get('/Sub-Koordinator', 'AwalController@subkoor')->name('subkoor');
Route::get('/Komite-Akreditasi', 'AwalController@komite')->name('komite');
Route::get('/Penjamin-Mutu-Internal', 'AwalController@pmi')->name('pmi');
Route::get('/Direktorat', 'AwalController@direktorat')->name('direktorat');


Route::get('/Hasil-Pencarian-Database-Hasil-Akreditasi-Prodi-Baru', 'HasilAkreditasiController@caridhamini')->name('cdhamini');
Route::get('/Database-Hasil-Akreditasi-Prodi-Baru', 'HasilAkreditasiController@tdhakremini')->name('dhakremini');
Route::get('/Tampil-Database-Hasil-Akreditasi-Prodi-Baru', 'HasilAkreditasiController@alldhamini')->name('alldhamini');
//
Route::get('/Berita/{new}/Detail-Berita', 'DetailController@detail_berita')->name('dberita');
Route::get('/Kegiatan/{agenda}/Detail-Kegiatan', 'DetailController@dagenda')->name('dagenda');
Route::get('/Proses-Pemberian-Assesor', 'DetailController@prosesakre')->name('padetail');
Route::get('/Proses-Assesmen-Kecukupan', 'DetailController@akdetail')->name('detailak');
Route::get('/Proses-Assesmen-Lapangan', 'DetailController@aldetail')->name('detailal');
Route::get('/Proses-Validasi', 'DetailController@pvdetail')->name('detailpv');
Route::get('/Proses-Selesai-Validasi', 'DetailController@svdetail')->name('detailsv');
Route::get('/Proses-Majelis', 'DetailController@pmdetail')->name('detailpm');
Route::get('/Pengumuman/{new}/Detail-Pengumuman', 'DetailController@detail_berita')->name('dpengum');
Route::get('/Regulasi/{new}/Detail-Regulasi', 'DetailController@detail_berita')->name('dregul');
Route::get('/Pencarian/{new}/Detail', 'DetailController@detail_berita')->name('dcari');

//PAGE RnD
Route::get('/Riset-dan-Publikasi/Laporan-Riset', 'RndController@lpriset')->name('lpriset');
Route::get('/Riset-dan-Publikasi/Laporan-Riset/{rst}/Detail', 'RndController@dlpriset')->name('dlpriset');
Route::get('/Riset-dan-Publikasi/Survei', 'RndController@tsurvei')->name('vsurvei');
Route::get('/Riset-dan-Publikasi/Survei/lihat', 'RndController@lsurvei')->name('lsurvei');
Route::get('/Riset-dan-Publikasi/Daftar-Jurnal', 'RndController@tjurnal')->name('tjurnal');
Route::get('/Riset-dan-Publikasi/Daftar-Jurnal/{jnl}/Detail', 'RndController@djurnal')->name('djurnal');
Route::get('/Riset-dan-Publikasi/Newsletter', 'RndController@tnewslet')->name('tnewslet');
Route::get('/Riset-dan-Publikasi/Newsletter/{nlt}/Detail', 'RndController@dnewslet')->name('dnewslet');
Route::get('/Akreditasi/Infografis', 'RndController@infograf')->name('infograf');
Route::get('/Akreditasi/Infografis/{ifg}/Detail', 'RndController@dinfograf')->name('dinfograf');
Route::get('/Statistik', 'StatistikController@index')->name('statistik');
Route::get('/Renstra/LAM-PTKes', 'RndController@renstralam')->name('renstralam');

// PAGE ENGLISH
// Route::get('/en', 'BerandaController@inggris')->name('inggris');
// Route::get('/en/Accreditation/Infographics', 'BerandaController@tgrafen')->name('tgrafen');
// Route::get('/en/Gallery', 'BerandaController@photoen')->name('galleryen');
// Route::get('/en/Gallery-Video', 'BerandaController@videoen')->name('tvideoen');
// Route::get('/en/Gallery/{cover}/Album-Photo', 'BerandaController@albumdetailen')->name('aphotoen');
// Route::get('/en/Contact-us', 'BerandaController@hubkamien')->name('hubkamien');
// Route::get('/en/Medical-Accreditation-Results', 'BerandaController@marakreen')->name('maren');

// Route::get('/en/Search-Result', 'AwalController@searchen')->name('carien');
// Route::get('/en/Profile', 'AwalController@profilen')->name('bprofilen');
// Route::get('/en/Organization', 'AwalController@torganen')->name('torganen');
// Route::get('/en/News', 'AwalController@tberitaen')->name('tberitaen');
// Route::get('/en/Regulation', 'AwalController@regulasien')->name('regulasien');
// Route::get('/en/Regulation/Constitution', 'AwalController@regucon')->name('regucon');
// Route::get('/en/Regulation/Presidential-decree', 'AwalController@regupd')->name('regupd');
// Route::get('/en/Regulation/Government-Regulations', 'AwalController@regugr')->name('regugr');
// Route::get('/en/Regulation/Ministerial-Regulations', 'AwalController@regumr')->name('regumr');
// Route::get('/en/Regulation/NAAHE-Regulations', 'AwalController@regubanpt')->name('regubanpt');
// Route::get('/en/Regulation/IAAHEH-Regulations', 'AwalController@regulam')->name('regulam');
// Route::get('/en/IAAHEH-Activities', 'AwalController@tagendaen')->name('tagendaen');
// Route::get('/en/Announcement', 'AwalController@tpengumumanen')->name('tpengumumanen');
// Route::get('/en/Annual-Archievement', 'AwalController@capaianen')->name('tcapaianen');
// Route::get('/en/Download-File', 'AwalController@unduhanen')->name('tunduhanen');
// Route::get('/en/Faq', 'AwalController@tfaqen')->name('tfaqen');
// Route::get('/en/Suggestion', 'AwalController@saranen')->name('tsaranen');
// Route::get('/en/Site-Map', 'AwalController@tsitemapen')->name('tsitemapen');
// Route::get('/Flow-of-Accreditation', 'AwalController@alurakre')->name('alurakre');
// Route::get('/en/Manual-SIMAk', 'AwalController@tmanualen')->name('tmanualsimaken');

// Route::post('en/Suggestion/store', 'PesanController@storeen')->name('saran.storeen');

// Route::get('/en/Search-Result-of-Accreditation-Result-Database', 'HasilAkreditasiController@caridhaen')->name('cdhaen');
// Route::get('/en/Accreditation-Results-Database-Appears', 'HasilAkreditasiController@alldhaen')->name('alldhaen');
// Route::get('/en/Assessment-Team', 'HasilAkreditasiController@timpen')->name('timpen');
// Route::get('/en/Accreditation-Result-Database', 'HasilAkreditasiController@tdhakreen')->name('dhakreen');
// Route::get('/en/Standard-7-Instrument-Download-file', 'HasilAkreditasiController@instrumenundhen')->name('iakreen');
// Route::get('/en/Instrument-Download-File-9-Criteria', 'HasilAkreditasiController@instrumensembilanen')->name('iakresembilanen');
// Route::get('/en/Accreditation-Process', 'HasilAkreditasiController@db_prodien')->name('pakreen');
// Route::get('/en/Accreditation-Q&A', 'HasilAkreditasiController@tqaakreen')->name('tqaakreen');

// Route::get('/en/News/{new}/News-Details', 'DetailController@detail_beritaen')->name('dberitaen');
// Route::get('/en/Activity/{agenda}/Activity-Details', 'DetailController@dagendaen')->name('dagendaen');
// Route::get('/en/Assessor-Request', 'DetailController@prosesakreen')->name('padetailen');
// Route::get('/en/Adequacy-Assessment-Process', 'DetailController@akdetailen')->name('detailaken');
// Route::get('/en/Field-Assessment-Process', 'DetailController@aldetailen')->name('detailalen');
// Route::get('/en/Validation-Process', 'DetailController@pvdetailen')->name('detailpven');
// Route::get('/en/Validation-Complete-Process', 'DetailController@svdetailen')->name('detailsven');
// Route::get('/en/Assembly-Process', 'DetailController@pmdetailen')->name('detailpmen');
// Route::get('/en/Announcement/{new}/Announcement-Details', 'DetailController@detail_beritaen')->name('dpengumen');
// Route::get('/en/Regulation/{new}/Regulation-Details', 'DetailController@detail_beritaen')->name('dregulen');
// Route::get('/en/Search/{new}/Details', 'DetailController@detail_beritaen')->name('dcarien');

// //PAGE RnD ENGLISH
// Route::get('/Research-and-Publication/Research-Report', 'RndController@lpriseten')->name('lpriseten');
// Route::get('/Research-and-Publication/Research-Report/{rst}/Details', 'RndController@dlpriseten')->name('dlpriseten');
// Route::get('/Research-and-Publication/Survey', 'RndController@tsurveien')->name('vsurveien');
// Route::get('/Research-and-Publication/Journal-List', 'RndController@tjurnalen')->name('tjurnalen');
// Route::get('/Research-and-Publication/Journal-List/{jnl}/Details', 'RndController@djurnalen')->name('djurnalen');
// Route::get('/Research-and-Publication/Newsletter', 'RndController@tnewsleten')->name('tnewsleten');
// Route::get('/Research-and-Publication/Newsletter/{nlt}/Details', 'RndController@dnewsleten')->name('dnewsleten');

Route::get('/cekq', 'SimpanController@create')->name('cekq');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	// Route::get('/simpan', 'SimpanController@index')->name('simpandb');

	Route::get('/admin/user', 'UserController@index')->name('user');
	Route::post('/admin/user/store', 'UserController@store')->name('user.store');
	Route::get('/admin/user/{user}/edit', 'UserController@edit')->name('user.edit');
	Route::patch('/admin/user/{user}/update', 'UserController@update')->name('user.update');
	Route::delete('/admin/user/{user}/delete', 'UserController@destroy')->name('user.destroy');

	Route::get('/admin/user/profil', 'PenggunaController@index')->name('pengguna');
	Route::patch('/admin/user/profil/{user}/update', 'PenggunaController@update')->name('pengguna.update');

	Route::get('/admin/saran', 'PesanController@index')->name('saran');
	Route::get('/admin/saran/{saran}/balas', 'PesanController@edit')->name('saran.edit');
	Route::patch('/admin/saran/{saran}/update', 'PesanController@update')->name('saran.update');
	Route::delete('/admin/saran/{saran}/delete', 'PesanController@destroy')->name('saran.destroy');

	Route::get('/admin/kategori/bahasa', 'KategoriBahasaController@index')->name('bahasa');
	Route::post('/admin/kategori/bahasa/store', 'KategoriBahasaController@store')->name('bahasa.store');
	Route::get('/admin/kategori/bahasa/{bhs}/edit', 'KategoriBahasaController@edit')->name('bahasa.edit');
	Route::patch('/admin/kategori/bahasa/{bhs}/update', 'KategoriBahasaController@update')->name('bahasa.update');
	Route::delete('/admin/kategori/bahasa/{bhs}/delete', 'KategoriBahasaController@destroy')->name('bahasa.destroy');

	Route::get('/admin/kategori/berita', 'KategoriBeritaController@index')->name('katberita');
	Route::post('/admin/kategori/berita/store', 'KategoriBeritaController@store')->name('katberita.store');
	Route::get('/admin/kategori/berita/{brt}/edit', 'KategoriBeritaController@edit')->name('katberita.edit');
	Route::patch('/admin/kategori/berita/{brt}/update', 'KategoriBeritaController@update')->name('katberita.update');
	Route::delete('/admin/kategori/berita/{brt}/delete', 'KategoriBeritaController@destroy')->name('katberita.destroy');

	Route::get('/admin/kategori/unduhan', 'KategoriUnduhanController@index')->name('katunduhan');
	Route::post('/admin/kategori/unduhan/store', 'KategoriUnduhanController@store')->name('katunduhan.store');
	Route::get('/admin/kategori/unduhan/{undh}/edit', 'KategoriUnduhanController@edit')->name('katunduhan.edit');
	Route::patch('/admin/kategori/unduhan/{undh}/update', 'KategoriUnduhanController@update')->name('katunduhan.update');
	Route::delete('/admin/kategori/unduhan/{undh}/delete', 'KategoriUnduhanController@destroy')->name('katunduhan.destroy');

	Route::get('/admin/berita', 'BeritaController@index')->name('berita');
	Route::get('/admin/berita/unpublish', 'BeritaController@unpublish')->name('brtunpublish');
	Route::get('/admin/berita/create', 'BeritaController@create')->name('berita.create');
	Route::post('/admin/berita/store', 'BeritaController@store')->name('berita.store');
	Route::get('/admin/berita/{berita}/edit', 'BeritaController@edit')->name('berita.edit');
	Route::patch('/admin/berita/{berita}/update', 'BeritaController@update')->name('berita.update');
	Route::delete('/admin/berita/{berita}/delete', 'BeritaController@destroy')->name('berita.destroy');

	Route::get('/admin/profil', 'ProfileController@index')->name('profil');
	Route::get('/admin/profil/create', 'ProfileController@create')->name('profil.create');
	Route::post('/admin/profil/store', 'ProfileController@store')->name('profil.store');
	Route::get('/admin/profil/{prf}/edit', 'ProfileController@edit')->name('profil.edit');
	Route::patch('/admin/profil/{prf}/update', 'ProfileController@update')->name('profil.update');
	Route::delete('/admin/profil/{prf}/delete', 'ProfileController@destroy')->name('profil.destroy');

	Route::get('/admin/organisasi', 'OrganisasiController@index')->name('organ');
	Route::get('/admin/organisasi/create', 'OrganisasiController@create')->name('organ.create');
	Route::post('/admin/organisasi/store', 'OrganisasiController@store')->name('organ.store');
	Route::get('/admin/organisasi/{org}/edit', 'OrganisasiController@edit')->name('organ.edit');
	Route::patch('/admin/organisasi/{org}/update', 'OrganisasiController@update')->name('organ.update');
	Route::delete('/admin/organisasi/{org}/delete', 'OrganisasiController@destroy')->name('organ.destroy');

	Route::get('/admin/orientasi', 'OrientasiController@index')->name('ori');
	Route::get('/admin/orientasi/create', 'OrientasiController@create')->name('ori.create');
	Route::post('/admin/orientasi/store', 'OrientasiController@store')->name('ori.store');
	Route::get('/admin/orientasi/{ori}/edit', 'OrientasiController@edit')->name('ori.edit');
	Route::patch('/admin/orientasi/{ori}/update', 'OrientasiController@update')->name('ori.update');
	Route::delete('/admin/orientasi/{ori}/delete', 'OrientasiController@destroy')->name('ori.destroy');

	Route::get('/admin/rencana-strategis', 'RencanaController@index')->name('rencana');
	Route::get('/admin/rencana-strategis/create', 'RencanaController@create')->name('rencana.create');
	Route::post('/admin/rencana-strategis/store', 'RencanaController@store')->name('rencana.store');
	Route::get('/admin/rencana-statregis/{rcn}/edit', 'RencanaController@edit')->name('rencana.edit');
	Route::patch('/admin/rencana-strategis/{rcn}/update', 'RencanaController@update')->name('rencana.update');
	Route::delete('/admin/rencana-strategis/{rcn}/delete', 'RencanaController@destroy')->name('rencana.destroy');

	Route::get('/admin/agenda-kegiatan', 'AgendaController@index')->name('agenda');
	Route::get('/admin/agenda-kegiatan/create', 'AgendaController@create')->name('agenda.create');
	Route::post('/admin/agenda-kegiatan/store', 'AgendaController@store')->name('agenda.store');
	Route::get('/admin/agenda-kegiatan/{agn}/edit', 'AgendaController@edit')->name('agenda.edit');
	Route::patch('/admin/agenda-kegiatan/{agn}/update', 'AgendaController@update')->name('agenda.update');
	Route::delete('/admin/agenda-kegiatan/{agn}/delete', 'AgendaController@destroy')->name('agenda.destroy');

	Route::get('/admin/capaian-tahunan', 'CapaianController@index')->name('capaian');
	Route::get('/admin/capaian-tahunan/create', 'CapaianController@create')->name('capaian.create');
	Route::post('/admin/capaian-tahunan/store', 'CapaianController@store')->name('capaian.store');
	Route::get('/admin/capaian-tahunan/{cpt}/edit', 'CapaianController@edit')->name('capaian.edit');
	Route::patch('/admin/capaian-tahunan/{cpt}/update', 'CapaianController@update')->name('capaian.update');
	Route::delete('/admin/capaian-tahunan/{cpt}/delete', 'CapaianController@destroy')->name('capaian.destroy');

	Route::get('/admin/testimoni', 'TestimoniController@index')->name('testimoni');
	Route::get('/admin/testimoni/create', 'TestimoniController@create')->name('testimoni.create');
	Route::post('/admin/testimoni/store', 'TestimoniController@store')->name('testimoni.store');
	Route::get('/admin/testimoni/{ttm}/edit', 'TestimoniController@edit')->name('testimoni.edit');
	Route::patch('/admin/testimoni/{ttm}/update', 'TestimoniController@update')->name('testimoni.update');
	Route::delete('/admin/testimoni/{ttm}/delete', 'TestimoniController@destroy')->name('testimoni.destroy');

	Route::get('/admin/kontak-kami', 'KontakController@index')->name('kontak');
	Route::get('/admin/kontak-kami/create', 'KontakController@create')->name('kontak.create');
	Route::post('/admin/kontak-kami/store', 'KontakController@store')->name('kontak.store');
	Route::get('/admin/kontak-kami/{ktk}/edit', 'KontakController@edit')->name('kontak.edit');
	Route::patch('/admin/kontak-kami/{ktk}/update', 'KontakController@update')->name('kontak.update');
	Route::delete('/admin/kontak-kami/{ktk}/delete', 'KontakController@destroy')->name('kontak.destroy');

	Route::get('/admin/footer-web', 'FooterController@index')->name('footer');
	Route::get('/admin/footer-web/create', 'FooterController@create')->name('footer.create');
	Route::post('/admin/footer-web/store', 'FooterController@store')->name('footer.store');
	Route::get('/admin/footer-web/{fweb}/edit', 'FooterController@edit')->name('footer.edit');
	Route::patch('/admin/footer-web/{fweb}/update', 'FooterController@update')->name('footer.update');
	Route::delete('/admin/footer-web/{fweb}/delete', 'FooterController@destroy')->name('footer.destroy');

	Route::get('/admin/faq', 'FaqController@index')->name('faq');
	Route::get('/admin/faq/create', 'FaqController@create')->name('faq.create');
	Route::post('/admin/faq/store', 'FaqController@store')->name('faq.store');
	Route::get('/admin/faq/{faq}/edit', 'FaqController@edit')->name('faq.edit');
	Route::patch('/admin/faq/{faq}/update', 'FaqController@update')->name('faq.update');
	Route::delete('/admin/faq/{faq}/delete', 'FaqController@destroy')->name('faq.destroy');

	Route::get('/admin/Q&A-akreditasi', 'QnAController@index')->name('qna');
	Route::get('/admin/Q&A-akreditasi/create', 'QnAController@create')->name('qna.create');
	Route::post('/admin/Q&A-akreditasi/store', 'QnAController@store')->name('qna.store');
	Route::get('/admin/Q&A-akreditasi/{qna}/edit', 'QnAController@edit')->name('qna.edit');
	Route::patch('/admin/Q&A-akreditasi/{qna}/update', 'QnAController@update')->name('qna.update');
	Route::delete('/admin/Q&A-akreditasi/{qna}/delete', 'QnAController@destroy')->name('qna.destroy');

	Route::get('/admin/file-unduhan', 'UnduhanController@index')->name('unduhan');
	Route::get('/admin/file-unduhan/create', 'UnduhanController@create')->name('unduhan.create');
	Route::post('/admin/file-unduhan/store', 'UnduhanController@store')->name('unduhan.store');
	Route::get('/admin/file-unduhan/{und}/edit', 'UnduhanController@edit')->name('unduhan.edit');
	Route::patch('/admin/file-unduhan/{und}/update', 'UnduhanController@update')->name('unduhan.update');
	Route::delete('/admin/file-unduhan/{und}/delete', 'UnduhanController@destroy')->name('unduhan.destroy');

	Route::get('/admin/cover-album-photo', 'CoverController@index')->name('cover');
	Route::get('/admin/cover-album-photo/create', 'CoverController@create')->name('cover.create');
	Route::post('/admin/cover-album-photo/store', 'CoverController@store')->name('cover.store');
	Route::get('/admin/cover-album-photo/{cvr}/edit', 'CoverController@edit')->name('cover.edit');
	Route::patch('/admin/cover-album-photo/{cvr}/update', 'CoverController@update')->name('cover.update');
	Route::delete('/admin/cover-album-photo/{cvr}/delete', 'CoverController@destroy')->name('cover.destroy');

	Route::get('/admin/album-photo', 'PhotoController@index')->name('photo');
	Route::get('/admin/album-photo/create', 'PhotoController@create')->name('photo.create');
	Route::post('/admin/album-photo/store', 'PhotoController@store')->name('photo.store');
	Route::get('/admin/album-photo/{pht}/edit', 'PhotoController@edit')->name('photo.edit');
	Route::patch('/admin/album-photo/{pht}/update', 'PhotoController@update')->name('photo.update');
	Route::delete('/admin/album-photo/{pht}/delete', 'PhotoController@destroy')->name('photo.destroy');

	Route::get('/admin/album-video', 'VideoController@index')->name('video');
	Route::get('/admin/album-video/create', 'VideoController@create')->name('video.create');
	Route::post('/admin/album-video/store', 'VideoController@store')->name('video.store');
	Route::get('/admin/album-video/{vdo}/edit', 'VideoController@edit')->name('video.edit');
	Route::patch('/admin/album-video/{vdo}/update', 'VideoController@update')->name('video.update');
	Route::delete('/admin/album-video/{vdo}/delete', 'VideoController@destroy')->name('video.destroy');

	Route::get('/admin/hasil-akreditasi/Add-simak', 'AkreditasiController@addsimak')->name('addsimak');
	Route::get('/admin/hasil-akreditasi/publish', 'AkreditasiController@index')->name('akreditasi');
	Route::get('/admin/hasil-akreditasi/unpublish', 'AkreditasiController@unpublish')->name('unpublishhasilakre');
	Route::post('/admin/hasil-akreditasi/store', 'AkreditasiController@store')->name('akreditasi.store');
	Route::post('/admin/hasil-akreditasi/publish', 'AkreditasiController@publishsimak')->name('publishsimak');
	Route::get('/admin/hasil-akreditasi/{hasil}/edit', 'AkreditasiController@edit')->name('akreditasi.edit');
	Route::get('/admin/hasil-akreditasi/{hasil}/statuspub', 'AkreditasiController@statuspub')->name('statuspub');
	Route::get('/admin/hasil-akreditasi/{hasil}/statusunpub', 'AkreditasiController@statusunpub')->name('statusunpub');
	Route::patch('/admin/hasil-akreditasi/{hasil}/update', 'AkreditasiController@update')->name('akreditasi.update');
	Route::delete('/admin/hasil-akreditasi/{hasil}/delete', 'AkreditasiController@destroy')->name('akreditasi.destroy');

	Route::get('/admin/riset', 'RisetController@index')->name('riset');
	Route::get('/admin/riset/create', 'RisetController@create')->name('riset.create');
	Route::post('/admin/riset/store', 'RisetController@store')->name('riset.store');
	Route::get('/admin/riset/{rst}/edit', 'RisetController@edit')->name('riset.edit');
	Route::patch('/admin/riset/{rst}/update', 'RisetController@update')->name('riset.update');
	Route::delete('/admin/riset/{rst}/delete', 'RisetController@destroy')->name('riset.destroy');

	Route::get('/admin/jurnal', 'JurnalController@index')->name('jurnal');
	Route::get('/admin/jurnal/create', 'JurnalController@create')->name('jurnal.create');
	Route::post('/admin/jurnal/store', 'JurnalController@store')->name('jurnal.store');
	Route::get('/admin/jurnal/{jnl}/edit', 'JurnalController@edit')->name('jurnal.edit');
	Route::patch('/admin/jurnal/{jnl}/update', 'JurnalController@update')->name('jurnal.update');
	Route::delete('/admin/jurnal/{jnl}/delete', 'JurnalController@destroy')->name('jurnal.destroy');

	Route::get('/admin/info-grafis', 'InfoGrafisController@index')->name('igrafis');
	Route::get('/admin/info-grafis/create', 'InfoGrafisController@create')->name('igrafis.create');
	Route::post('/admin/info-grafis/store', 'InfoGrafisController@store')->name('igrafis.store');
	Route::get('/admin/info-grafis/{ifg}/edit', 'InfoGrafisController@edit')->name('igrafis.edit');
	Route::patch('/admin/info-grafis/{ifg}/update', 'InfoGrafisController@update')->name('igrafis.update');
	Route::delete('/admin/info-grafis/{ifg}/delete', 'InfoGrafisController@destroy')->name('igrafis.destroy');

	Route::get('/admin/newsletter', 'NewsletterController@index')->name('nletter');
	Route::get('/admin/newsletter/create', 'NewsletterController@create')->name('nletter.create');
	Route::post('/admin/newsletter/store', 'NewsletterController@store')->name('nletter.store');
	Route::get('/admin/newsletter/{nlt}/edit', 'NewsletterController@edit')->name('nletter.edit');
	Route::patch('/admin/newsletter/{nlt}/update', 'NewsletterController@update')->name('nletter.update');
	Route::delete('/admin/newsletter/{nlt}/delete', 'NewsletterController@destroy')->name('nletter.destroy');

	Route::get('/admin/survey', 'SurveyController@index')->name('survey');
	Route::get('/admin/survey/create', 'SurveyController@create')->name('survey.create');
	Route::post('/admin/survey/store', 'SurveyController@store')->name('survey.store');
	Route::get('/admin/survey/{srv}/edit', 'SurveyController@edit')->name('survey.edit');
	Route::patch('/admin/survey/{srv}/update', 'SurveyController@update')->name('survey.update');
	Route::delete('/admin/survey/{srv}/delete', 'SurveyController@destroy')->name('survey.destroy');

	Route::get('/admin/Kategori-Email',  'KategoriEmailController@index')->name('katemail');
	Route::post('/admin/Kategori-Email/store', 'KategoriEmailController@store')->name('katemail.store');
	Route::get('/admin/Kategori-Email/edit', 'KategoriEmailController@edit')->name('katemail.edit');
	Route::delete('/admin/Kategori-Email/{kte}/delete', 'KategoriEmailController@destroy')->name('katemail.destroy');

	Route::get('/admin/daftar-Email',  'ListEmailController@index')->name('listemail');
	Route::post('/admin/daftar-Email/store', 'ListEmailController@store')->name('listemail.store');
	Route::get('/admin/daftar-Email/edit', 'ListEmailController@edit')->name('listemail.edit');
	Route::delete('/admin/daftar-Email/{lsm}/delete', 'ListEmailController@destroy')->name('listemail.destroy');

	Route::get('/admin/renstra', 'RenstraController@index')->name('renstra');
	Route::post('/admin/renstra/store', 'RenstraController@store')->name('renstra.store');
	Route::post('/admin/renstra/edit', 'RenstraController@edit')->name('renstra.edit');
	Route::delete('/admin/renstra/{rnt}/delete', 'RenstraController@destroy')->name('renstra.destroy');

	Route::get('/clear', function () {
		$exitCode = Artisan::call('cache:clear');
		// return view('/');
	});
});


Route::post('/api/ProsesSKAlihBentuk', 'ApiPortalController@ProsesSKAlihBentuk')->name('api.ProsesSKAlihBentuk');
Route::post('/api/ProsesSKPerubahanNama', 'ApiPortalController@ProsesSKPerubahanNama')->name('api.ProsesSKPerubahanNama');
Route::post('/api/EditKolomHasilAkre', 'ApiPortalController@EditKolomHasilAkre')->name('api.EditKolomHasilAkre');
Route::post('/api/InsertUpdateSK', 'ApiPortalController@InsertUpdateSK')->name('api.InsertUpdateSK');
Route::post('/api/InsertUpdateSKProdiBaru', 'ApiPortalController@InsertUpdateSKProdiBaru')->name('api.InsertUpdateSKProdiBaru');
Route::get('/api/{key}/hasil-akreditasi/prodi-reguler', 'HasilAkreditasiController@prodiReguler')->name('api.prodiReguler');
Route::get('/api/{key}/hasil-akreditasi/prodi-baru', 'HasilAkreditasiController@prodiBaru')->name('api.prodiBaru');
Route::post('/api/UpdateIsShowSK', 'ApiPortalController@UpdateIsShowSK')->name('api.UpdateIsShowSK');

Route::get('secure/document/{filename}', 'SecureFileController@serveDocument')
    ->name('secure.document')
    ->where('filename', '[^\/]+'); // Semua karakter kecuali slash

Route::get('secure/document/{folder}/{filename}', 'SecureFileController@serveDocument')
    ->name('secure.document.folder')
    ->where('folder', '[A-Za-z0-9\-\_]+')
    ->where('filename', '[^\/]+'); // Semua karakter kecuali slash


Route::get('secure/document/{folder}/{subfolder}/{filename}', 'SecureFileController@serveDocument')
    ->name('secure.document.nested')
    ->where('folder', '[A-Za-z0-9\-\_]+')
    ->where('subfolder', '[A-Za-z0-9\-\_]+')
    ->where('filename', '[^\/]+');

// Route untuk redirect specific file
Route::get('/unduhan/Dokumen-Buku-IV-Kualitatif.pdf', function () {
    return redirect()->route('secure.document.folder', [
        'folder' => 'unduhan', 
        'filename' => 'Dokumen-Buku-IV-Kualitatif.pdf'
    ]);
});


// Route untuk redirect specific file
Route::get('/unduhan/Dokumen-06032023-1678039448.pdf', function () {
    return redirect()->route('secure.document.folder', [
        'folder' => 'unduhan',
        'filename' => 'Dokumen-06032023-1678039448.pdf'
    ]);
});

// Route untuk redirect specific file
Route::get('/unduhan/Dokumen-06032023-1678039591.pdf', function () {
    return redirect()->route('secure.document.folder', [
        'folder' => 'unduhan',
        'filename' => 'Dokumen-06032023-1678039591.pdf'
    ]);
});
