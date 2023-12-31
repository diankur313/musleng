@extends('Admin.users')

@section('tabel-user')
<table id="tabel-user" class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%;">
    <thead>
        <tr>
            <th>
                <center>No</center>
            </th>
            <th>
                <center>ID</center>
            </th>
            <th>
                <center>Nama</center>
            </th>
            <th>
                <center>level</center>
            </th>
            <th>
                <center>Bidang</center>
            </th>
            <th>
                <center>Email</center>
            </th>
            <th>
                <center>Aksi</center>
            </th>
        </tr>
    </thead>
</table>
@endsection

@section('modal-add-user')
<div class="modal" id="adduser" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{!! url ('post-user') !!}" method="post" autocomplete="off" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="radio" id="manual" checked="checked"> <b>Input Manual</b>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="nama" id="name" class="form-control" required style="border: 1px solid black;">
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin*</label>
                            <select name="jekel" class="form-control" id="gender" required style="border:1px solid black;">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>ID Anggota*</label>
                            <input type="text" name="id_anggota" id="id_ang" class="form-control" required style="border: 1px solid black;">
                        </div>

                        <div class="col-md-6">
                            <label>Kategori*</label>
                            <select name="kategori" class="form-control" id="kate" onChange="gori();" required style="border:1px solid black;">
                                <option value="">Pilih Kategori</option>
                                <option value="Anggota Yisc">Anggota Yisc</option>
                                <option value="Undangan">Non Anggota Yisc (Undangan)</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Nama Angkatan*</label>
                            <input type="text" name="nama_angk" id="nama_angk" class="form-control" required disabled style="border: 1px solid black;">
                        </div>
                        <div class="col-md-6">
                            <label>Level</label>
                            <select name="level" class="form-control" id="lev" disabled style="border:1px solid black;">
                                <option value="">Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Verifikator">Verifikator</option>
                                <option value="Sekretaris">Sekretaris</option>
                                <option value="Peserta">Peserta</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Bidang</label>
                            <select name="bidang" class="form-control" id="bid" disabled style="border:1px solid black;">
                                <option value="">Pilih Bidang</option>
                                <option value="4 Angkatan Terakhir">4 Angkatan Terakhir</option>
                                <option value="Pengurus Bidang">Pengurus Bidang</option>
                                <option value="PH">PH</option>
                                <option value="MDO">MDO</option>
                                <option value="BPP">BPP</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" style="border: 1px solid black;">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="radio" id="import"> <b>Import Data</b>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="file" id="masuk" required disabled class="form-control" style="border: 1px solid black;">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" id="simpan">Simpan</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('modal-edit-user')
@foreach($user as $e)
<div class="modal" id="edit{{$e->id}}" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{!! url ('edit-user='.$e->id.'') !!}" method="post" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="nama" value="{{$e->nama}}" class="form-control" required style="border: 1px solid black;">
                        </div>
                        <div class="col-md-6">
                            <label>Jenis Kelamin*</label>
                            <select name="jekel" class="form-control" required style="border:1px solid black;">
                                <option value="">Pilih Gender</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>ID Anggota*</label>
                            <input type="text" name="id_anggota" value="{{$e->id_anggota}}" required class="form-control" required style="border: 1px solid black;">
                        </div>

                        <div class="col-md-6">
                            <label>Kategori*</label>
                            <select name="kategori" class="form-control" required required style="border:1px solid black;">
                                <option value="">Pilih Kategori</option>
                                <option value="Anggota Yisc">Anggota Yisc</option>
                                <option value="Undangan">Non Anggota Yisc (Undangan)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Nama Angkatan*</label>
                            <input type="text" name="nama_angk" value="{{$e->nama_angkatan}}" class="form-control" required style="border: 1px solid black;">
                        </div>
                        <div class="col-md-6">
                            <label>Level</label>
                            <select name="level" class="form-control" style="border:1px solid black;">
                                <option value="">Pilih Level</option>
                                <option value="Admin">Admin</option>
                                <option value="Verifikator">Verifikator</option>
                                <option value="Sekretaris">Sekretaris</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Bidang</label>
                            <select name="bidang" class="form-control" style="border:1px solid black;">
                                <option value="">Pilih Bidang</option>
                                @foreach($bidang as $b)
                                <option value="{{$b->bidang}}">{{$b->bidang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" style="border: 1px solid black;">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" id="simpan">Simpan</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach
@endsection

@section('modal-hapus')
@foreach($user as $a)
<div class="modal" id="hapus{{$a->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">Hapus User </h4>
                </center>
            </div>
            <div class="modal-body">
                <form action="{{url('admin-hapus-user='.$a->id.'')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        Anda Yakin Ingin Menghapus <b>{{$a->nama}}</b> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('modal-detil')
@foreach($user as $c)
<div class="modal" id="detil{{$c->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">Detil User</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <table class="table table-bordered table-hover dataTable no-footer">
                        <tr>
                            <th style="width: 23%;">ID</th>
                            <th>
                                <center>{{$c->id_anggota}}</center>
                            </th>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>
                                <center>{{$c->nama}}</center>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <center>{{$c->jenis_kelamin}}</center>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Angkatan</td>
                            <td>
                                <center>{{$c->nama_angkatan}}</center>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <center>{{$c->kategori}}</center>
                            </td>
                        </tr>
                        <tr>
                            <td>Bidang</td>
                            <td>
                                <center>{{$c->bidang}}</center>
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <center>{{$c->level}}</center>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Tutup</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('modal-hapus-bulk')
<div class="modal" id="bulk-delete" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('del-bulk')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>
                        <h6>Aksi ini akan menghapus <b>semua user</b> kecuali admin</h6>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('email-bulk')
<div class="modal" id="email-bulk" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Multiple Mail Invitation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <p>
                    <h6>This action will send bulk mail invitation</h6>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="email-bulk" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('personal-mail')
@foreach($user as $val)
<div class="modal" id="personal_{{$val->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Single Mail Invitation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <p>
                    <h6>This action will send mail to {{$val->nama}}</h6>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="personal-mail={{$val->id}}" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection