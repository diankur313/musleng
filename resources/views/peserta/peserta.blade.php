@extends('layouts.app_peserta')

@section('content')
<style type="text/css">
    body.swal2-shown>[aria-hidden="true"] {
        transition: 0.1s filter;
        filter: blur(10px);
    }
</style>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Home
                </a>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand">Assalamu'alaykum {{Auth::user()->nama}}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        @if (!empty($qr))
        <div class="row judul">
            <h4>{{ucfirst($session->nama_event)}}</h4>
        </div>
        <div class="row qr_code">
            {{$qr}}
        </div>
        <div class="row countdown" id="countdown"></div>
        @else
        <div class="row countdown">
            <h4>There's no session available</h4>
        </div>
        @endif
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright pull-right">
                Made with <i class="fa fa-heart heart"></i> + <i class="fa fa-coffee coffee"></i>
            </div>
        </div>
    </footer>
</div>
</div>
@endsection

@section('script')
<script src="{{'js/peserta/index.js'}}" type="text/javascript"></script>
@endsection