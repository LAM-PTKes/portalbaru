@extends('layouts.app')
@section('title')
    Error Page
@endsection
@section('content')

        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper alt">
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
            <main id="js-page-content" role="main" class="page-content">
                <div class="h-alt-f d-flex flex-column align-items-center justify-content-center text-center">
                    <h1 class="page-error color-fusion-500">
                        ERROR <span class="text-gradient">404</span>
                        <small class="fw-500">
                            Something <u>went</u> wrong!
                        </small>
                    </h1>
                    <h3 class="fw-500 mb-5">
                        You have experienced a technical error. We apologize.
                    </h3>
                    <h4>
                        We are working hard to correct this issue. Please wait a few moments and try your search again.
                        <br>In the meantime, check out whats new a news on <a href="https://lamptkes.org" target="blank" title="">LAM-PTKes</a>:
                    </h4>
                </div>
            </main>
            <!-- END Page Content -->
            <!-- BEGIN Page Footer -->
            <footer class="page-footer" role="contentinfo">
                <div class="d-flex align-items-center flex-1 text-muted">
                    <marquee>
                    	<span class="hidden-md-down fw-700">2021 © Portal LAM-PTKes by &nbsp;IT LAM-PTKes</span>
                    </marquee>		
                </div>
            </footer>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Wrapper -->
       
@endsection
