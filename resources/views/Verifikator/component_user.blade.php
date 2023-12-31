@extends('Verifikator.users')

@section('tabel-user')
<table id="tabel-user" class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%;">
    <thead>
      <tr>
        <th><center>No</center></th>
        <th><center>ID</center></th>
        <th><center>Nama</center></th>
        <th><center>Kategori</center></th>
        <th><center>Angkatan</center></th>
        <th><center>Bidang</center></th>
        <th><center>Aksi</center></th>
      </tr>
    </thead>
</table>
@endsection

@section('modal-detil')
@foreach($user as $c)
    <div class="modal" id="detil{{$c->id}}" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                        <div class="modal-header">
                            <center> <h4 class="modal-title">Detil User</h4> </center>
                        </div>
                            <div class="modal-body">
                                    <div class="modal-body">
                                        <table class="table table-bordered table-hover dataTable no-footer">
                                            <tr>
                                                <th style="width: 23%;">ID</th>
                                                <th><center>{{$c->id_anggota}}</center></th>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><center>{{$c->nama}}</center></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td><center>{{$c->jenis_kelamin}}</center></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Angkatan</td>
                                                <td><center>{{$c->nama_angkatan}}</center></td>
                                             </tr>
                                              <tr>
                                                <td>Kategori</td>
                                                <td><center>{{$c->kategori}}</center></td>
                                              </tr>
                                              <tr>
                                                <td>Bidang</td>
                                                <td><center>{{$c->bidang}}</center></td>
                                              </tr>
                                              <tr>
                                                <td>Level</td>
                                                <td><center>{{$c->level}}</center></td>
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