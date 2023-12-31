@extends('layouts.app_view')

@section('content')
<form action="{!! url ('change-camera-post') !!}" method="post" autocomplete="off">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="icon-big icon-info warning text-center">
                                <i class="ti-linux"></i>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="numbers" id="attendance">
                                <p>Total Peserta</p>
                                <p style="font-size: 30px" id="scanned">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="icon-big icon-info warning text-center">
                                <i class="ti-layout-grid3-alt"></i>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="numbers" id="attendance">
                                <p>Perwakilan Bidang</p>
                                <p style="font-size: 30px" id="scanned">0/3</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="icon-big icon-info warning text-center">
                                <i class="ti-skype"></i>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="numbers" id="attendance">
                                <p>Sesi Ke:</p>
                                <p style="font-size: 30px">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats" id="this_session"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <div class="row">
                <canvas id="myChart" style="background-color:white;"></canvas>
            </div>
        </div>
    </div>
</form>
@vite('resources/assets/js.app.js')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        Echo.channel('cahaya-channel')
            .listen('CahayaEvent', (e) => {
                alert('berhasil ngelisten');
            });
    });
</script>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/sekre/dashboard.js')}}" type="text/javascript"></script>
@endsection