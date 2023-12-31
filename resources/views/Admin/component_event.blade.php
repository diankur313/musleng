@extends('Admin.event')

@section('modal-tambah-event')
<div class="modal" id="addevent" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">Tambah Event</h4>
                </center>
            </div>
            <div class="modal-body">
                <form action="{{url('post-event')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Event</label>
                                <input type="text" name="nama_event" class="form-control" style="border: 1px solid black;" required>
                            </div>
                            <div class="col-md-6">
                                <label>Status</label>
                                <select name="status" class="form-control" style="border:1px solid black;" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal-edit-event')
@foreach($event as $b)
<div class="modal" id="edit_event{{$b->id}}" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title">Ubah Event</h4>
                </center>
            </div>
            <div class="modal-body">
                <form action="{{url('post-ubah-event='.$b->id.'')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Event</label>
                                <input type="text" name="nama_event" value="{{$b->nama_event}}" class="form-control" style="border: 1px solid black;" required>
                            </div>
                            <div class="col-md-6">
                                <label>Status</label>
                                <select name="status" class="form-control" style="border:1px solid black;" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label>Komponen Quorum</label>
                                <select class="js-example-basic-multiple" name="quorum[]" multiple="multiple" required>
                                    @foreach($quorum as $q)
                                    <option value="{{$q->bidang}}">{{$q->bidang}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('modal-delete-event')
@foreach($event as $a)
<div class="modal" id="delete_event{{$a->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('hapus-event='.$a->id.'')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>
                        <h4>Yakin ingin menghapus event ?</h4>
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
@endforeach
@endsection