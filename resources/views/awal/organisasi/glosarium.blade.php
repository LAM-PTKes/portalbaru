@extends('awal.template.app')
@section('title', 'Glosarium Akreditasi - LAM-PTKes')
@section('content')

    <div class="section-empty">
        <div class="container content">
            <div class="row">
                <div class="col-md-12 col-center text-center">
		<iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe" src="https://heyzine.com/flip-book/036ab3a677.html" style="border: 1px solid lightgray; width: 100%; height: 600px;"></iframe>
        <p style="text-align: center; font-weight: bold; font-style: italic;"><a href="{{ route('secure.document.folder', ['folder' => 'unduhan', 'filename' => 'Dokumen-14082021-1628905226.pdf']) }}">Silahkan Unduh Glosarium Akreditasi (Klik Disini!)</a></p>
         <hr class="space m" />
                    


                </div>
            </div>
        </div>
    </div>

@endsection