@extends('Admin.detail_event')
@section('tabel-verifikasi')
    <table id="tabel-verifikasi" class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%; border: 3px;">
    <thead>
      <tr>
        <th><center>ID</center></th>
        <th><center>Nama</center></th>
        <th><center>Kategori</center></th>
        <th><center>Bidang</center></th>
        <th><center>Aksi</center></th>
      </tr>
    </thead>
    </table>
@endsection

@section('tabel-izin')
    <table id="tabel-izin" class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%; border: 3px;">
    <thead>
      <tr>
        <th><center>ID</center></th>
        <th><center>Nama</center></th>
        <th><center>Bidang</center></th>
        <th><center>Aksi</center></th>
      </tr>
    </thead>
    </table>
@endsection

@section('modal-konfirmasi')
@foreach($user as $e)
<div class="modal" id="verif{{$e->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                        <div class="modal-header">
                            <center> <h4 class="modal-title">Konfirmasi </h4> </center>
                        </div>
                            <div class="modal-body">
                               <form>
                                   {{csrf_field()}}
                                    <div class="modal-body">
                                        <b>{{$e->nama}}</b> Sudah hadir? ?
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" id="ya{{$e->id}}" class="btn btn-success" >Ya</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Belum</button>
                                        </div>

                               </form>
                            </div>
            </div>
    </div>
</div>
@endforeach
@endsection

@section('modal-izin-keluar')
@foreach($user as $f)
<div class="modal" id="izin_keluar{{$f->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                        <div class="modal-header">
                            <center> <h4 class="modal-title">Izin Keluar </h4> </center>
                        </div>
                            <div class="modal-body">
                               <form>
                                    <div class="modal-body">
                                        <label>Alasan Izin</label>
                                        <textarea class="form-control" id="alasan_keluar{{$f->id}}" name="alasan" rows="3" required></textarea>
                                        <input type="hidden" name="id_anggota" value="{{$f->id}}">
                                        <input type="hidden" name="sesi" value="{{$id}}">
                                    </div>
                                        <div class="modal-footer">
                                            <button type="submit"  class="btn btn-success" >Konfirmasi</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        </div>

                               </form>
                            </div>
            </div>
    </div>
</div>
@endforeach
@endsection

@section('modal-izin-masuk')
@foreach($user as $g)
<div class="modal" id="izin_masuk{{$g->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                        <div class="modal-header">
                            <center> <h4 class="modal-title">Izin Masuk </h4> </center>
                        </div>
                            <div class="modal-body">
                               <form>
                                    <div class="modal-body">
                                        <b>{{$g->nama}}</b> Konfirmasi Izin Masuk?
                                        <input type="hidden" name="id_anggota_masuk" value="{{$g->id}}">
                                        <input type="hidden" name="sesi_masuk" value="{{$id}}">
                                    </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="masuk{{$e->id}}" class="btn btn-success" >Konfirmasi</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        </div>

                               </form>
                            </div>
            </div>
    </div>
</div>
@endforeach
@endsection

