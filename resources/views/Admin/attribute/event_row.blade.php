@foreach($all as $a)
<div class="card-header">
    <h4>{{$a->nama_event}}</h4>
</div>
<div class="card-body">
    <div class="row">
        <a class="btn btn-md btn-info" href="event-id={{$a->id}}" target="_blank"><b>Registrasi</b></a>
        &nbsp;
        <button type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#edit_event{{$a->id}}"><b>
                <p style="color: #ffffff;">Edit Event</p>
            </b></button>
        &nbsp;
        <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#delete_event{{$a->id}}"><b>Hapus Event</b></button>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-users fa-2x" aria-hidden="true" title="Jumlah kehadiran peserta">&nbsp;0/...</i>
        </div>
        <div class="col-md-4">
            <i class="fa fa-sign-out fa-2x" aria-hidden="true" title="Jumlah peserta izin keluar">&nbsp;3 Orang</i>
        </div>
        <div class="col-md-4">
            @if($a->status == 1)
            <label class="switch"><input type="checkbox" class="form-control status" checked data-id="{{$a->id}}"><span class="slider round category_swtc" title="Turn on / off"></span></label>
            @else
            <label class="switch"><input type="checkbox" class="form-control status" data-id="{{$a->id}}"><span class="slider round category_swtc" title="Turn on / off"></span></label>
            @endif
        </div>
    </div>
</div>
@endforeach