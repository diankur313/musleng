<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="sekretaris/bootstrap/css/bootstrap.min.css" />
</head>
<body>
	<center><p><h3>Kehadiran Bidang</h3></p></center>
	<table class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%; border: 3px;">
    <thead>
            <tr>
                <th><center>Nomor</center></th>
                <th><center>Nama</center></th>
                <th><center>Perwakilan Bidang</center></th>
            </tr>
    </thead>
    <tbody>
        @foreach($bidang_hadir as $hadir)
            <tr><td><center>{{$no++}}</center></td>
                <td><center>{{$hadir->nama}}</center></td>
                <td><center>{{$hadir->bidang}}</center></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>