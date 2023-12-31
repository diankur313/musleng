<!DOCTYPE html>
<html>
<head>
	<link href="default/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
	<title></title>
</head>
<body>

	<p><h4>Nama: {{$nama}}</h4></p>
	<p><h4>ID: {{$id_anggota}}</h4></p>
<table class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%; border: 3px;">
    <thead>
            <tr>
                <th><center>Sesi</center></th>
                <th><center>Hadir Awal Sesi</center></th>
                <th><center>Izin Keluar</center></th>
                <th><center>Izin Masuk</center></th>
                <th><center>Verifikator Keluar</center></th>
                <th><center>Verifikator Masuk</center></th>
                <th><center>Durasi Izin Keluar</center></th>
                <th><center>Keterangan</center></th>
            </tr>
    </thead>
    <tbody>
        @foreach($activity as $act)
            <tr>
                <td><center>{{$act->activity_event->nama_event}}</center></td>
                <td><center>{{$act->waktu_hadir}}</center></td>
                <td><center>{{$act->waktu_keluar}}</center></td>
                <td><center>{{$act->waktu_masuk}}</center></td>
                <td><center>{{$act->verifikator_izin_keluar}}</center></td>
                <td><center>{{$act->waktu_masuk}}</center></td>
                @if ($act->waktu_masuk === null)
                	<td><center>{{$act->total_durasi_izin_sesi}}</center></td>
                @else
                	<td><center>{{gmdate('H:i:s',$act->total_durasi_izin_sesi)}}</center></td>
                @endif
                <td><center>{{$act->keterangan}}</center></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>