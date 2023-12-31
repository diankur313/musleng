@extends('layouts.app_master')

@section('content')
<form action="{!! url ('change-camera-post') !!}" method="post" autocomplete="off">
    {{csrf_field()}}
    <div class="card">
        <div class="content">
            <div class="row">
                <div class="col-xs-5">
                    <div class="icon-big icon-info warning text-center">
                        <i class="ti-user"></i>
                    </div>
                </div>
                <div class="col-xs-7">
                    <div class="numbers" id="attendance">
                        <p>Attendance</p>
                        <p style="font-size: 30px" id="scanned">0</p>
                    </div>
                </div>
            </div>
            <div class="footer">
                <hr />
                <div class="stats" id="this_session"></div>
            </div>
        </div>
    </div>
    <!-- <div class="row justify-content-center align-items-center">
        <video id="scanner" class="qr_code"></video>
        <input type="hidden" name="camera_length" id="camera_length">
        <input type="hidden" name="active_camera" id="active_camera">
    </div> -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <video id="scanner" class="qr_code">
                    <input type="hidden" name="camera_length" id="camera_length">
                    <input type="hidden" name="active_camera" id="active_camera">
                    <!-- Add video source or other content here -->
                </video>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-md btn-block btn-success">Activate / Change Camera</button>
        </div>
    </div>
</form>
@endsection

@section('script')
<script src="plugin/instascan-master/src/instascan.min.js"></script>
<script src="{{asset('js/scanner/scanner.js')}}" type="text/javascript"></script>
@endsection