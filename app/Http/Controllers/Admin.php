<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\listenQR;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as Input;
use App\Models\event;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\activity;
use Maatwebsite\Excel\Facades\Excel;
use Notification;
use App\Notifications\InvitationMail;

class Admin extends Controller
{
    public function home()
    {
        return view('Admin.dashboard');
    }

    public function users()
    {
        $user = DB::table('user')->get();
        $bidang = DB::table('user')->groupBy('bidang')->get();
        $level = user::groupBy('bidang')->get();
        return view("Admin.component_user", compact('user', 'bidang', 'level'));
    }

    public function post_user(Request $request)
    {
        $validator = $this->validate($request, ['file' => 'mimes:xls,xlsx']);
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();
            if (!empty($data) && $data->count()) {
                foreach ($data as $key => $user) {

                    $insert[] = ['email' => trim($user->email), 'id_anggota' => trim($user->id_anggota), 'nama' => ucwords(strtolower($user->nama)), 'jenis_kelamin' => $user->jenis_kelamin, 'kategori' => $user->kategori,  'nama_angkatan' => $user->nama_angkatan, 'bidang' => $user->bidang, 'level' => $user->level, 'password' => bcrypt($user->password), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
                }
                if (!empty($insert)) {
                    DB::table('user')->insert($insert);
                }
            }
        } else {
            $user = new \App\Models\User;
            $user->uuid = Str::random(32);
            $user->nama = $request->nama;
            $user->jenis_kelamin = $request->jekel;
            $user->id_anggota = $request->id_anggota;
            $user->kategori = $request->kategori;
            $user->nama_angkatan = $request->nama_angk;
            $user->level = $request->level;
            $user->bidang = $request->bidang;
            $user->password = bcrypt($request->password);
            $user->save();
            return back();
        }

        return back();
    }

    public function hapus_user($id)
    {
        DB::table('user')->where('id', $id)->delete();
        return back();
    }

    public function edit_user(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $user->nama = $request->nama;
        $user->jenis_kelamin = $request->jekel;
        $user->id_anggota = $request->id_anggota;
        $user->kategori = $request->kategori;
        $user->nama_angkatan = $request->nama_angk;
        $user->level = $request->level;
        $user->bidang = $request->bidang;
        $user->password = bcrypt($request->password);
        $user->update();
        return back();
    }

    public function bulk_delete()
    {
        DB::table('user')->whereNotIn('level', ['Admin'])->delete();
        DB::table('user')->where('level', null)->delete();
        return back();
    }

    public function index_user()
    {
        DB::statement('set @rownum=0');
        $user = DB::table('user')
            ->select([DB::raw('@rownum  := @rownum  + 1 AS rownum'), 'id', 'id_anggota', 'nama', 'level', 'bidang', 'email'])
            ->get();
        return DataTables::of($user)
            ->addColumn('Aksi', function ($user) {
                return '<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detil' . $user->id . '" style="color: #ffffff;">Detil</button>&nbsp;<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit' . $user->id . '" style="color: #ffffff;">Edit</button>&nbsp;<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#personal_' . $user->id . '" style="color: #ffffff;">Invite</button>&nbsp;<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus' . $user->id . '" style="color: #ffffff;">Hapus</button>&nbsp;</center>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }
    public function email_personal(Request $request, $id)
    {
        $password = Str::random('12');
        $user = [
            user::where('id',$id)->update(['password' => bcrypt($password)]),
            'master' => user::where('id', $id)->first(),
            'password' => $password
        ];
        $dev = [
            user::where('email', 'diankurniawan29@gmail.com')->update(['password' => bcrypt($password)]),
            'master' => user::where('email', 'diankurniawan29@gmail.com')->first(),
            'password' => $password
        ];

        if (env('APP_SYSTEM') == 'development') {
            Notification::send($dev, new InvitationMail($dev));
        } else {
            Notification::send($user, new InvitationMail($user));
        }
    }

    public function email_bulk()
    {
        dd('huba');
    }

    public function event()
    {
        $event = event::get();
        $quorum = user::groupBy('bidang')->get();
        return view('Admin.component_event', compact('event', 'quorum'));
    }

    public function summary()
    {
        $user = user::get();
        return view('Admin.summary_component', compact('user'));
    }

    public function post_event(Request $request)
    {

        $cek = event::count();
        if (empty($cek)) {
            $inc = 1;
        } else {
            $inc = $cek + 1;
        }
        if ($inc == '1') {
            $pre = 'st';
        } else if ($inc == '2') {
            $pre = 'nd';
        } else if ($inc == '3') {
            $pre = 'rd';
        } else {
            $pre = 'th';
        }

        $dt = [
            'nama_event' => $inc . $pre . ' Session',
            'uuid' => Str::uuid(),
            'session_start' => null,
            'session_end' => null
        ];

        event::create($dt);

        return back();
    }

    public function detail_event(Request $request, $id)
    {
        $judul = event::where('id_event', $id)->value('nama_event');
        $user = user::get();
        $cek_status = event::where('id_event', $id)->get();
        $verified_you = activity::where('id_event', $id)->where('verifikator_kedatangan', Auth::user()->nama)
            ->count();
        return view('Admin.tabel_verifikasi', compact('judul', 'user', 'cek_status', 'id', 'verified_you'));
    }

    public function ubah_event(Request $request, $id)
    {
        $edit = event::findOrFail($id);
        $edit->nama_event = $request->nama_event;
        $edit->status = $request->status;
        $edit->durasi_izin = $request->durasi;
        $edit->komponen_quorum = implode(' ', $request->quorum);
        $edit->update();

        return back();
    }

    public function hapus_event(Request $request, $id)
    {
        DB::table('event')->where('id', $id)->delete();
        return back();
    }

    public function konfirmasi_kehadiran($id)
    {
        $validasi = user::where('id_anggota', $id)->value('id');
        $id_event = event::where('status', 'Aktif')->value('id_event');
        $double = activity::where('id_event', $id_event)->where('id', $validasi)->count();
        $peserta = user::where('id_anggota', $id)->value('level');

        $alumni = user::where('id_anggota', $id)->value('bidang');

        if ($double === 1) {
        } else if ($validasi === null || $validasi === '') {
            return Response()->json(['ID tidak terdaftar'], 404);
        } else if ($isi_vaksin == 0) {
            return Response()->json(['Belum mengisi form vaksin'], 404);
        } else if (($assessment > 15) && (($alumni !== 'BPP') || ($alumni !== 'Alumni'))) {
            return Response()->json(['High Risk !!'], 404);
        } else if ((($assessment === null) && ($alumni !== 'Alumni')) || (($assessment === null) && ($alumni !== 'BPP'))) {
            return response()->json(['Belum mengisi assessment'], 404);
        } else if (($peserta == 'Peserta') || ($peserta === null)) {
            $cek_user = user::where('id_anggota', $id)->value('id');
            $reg = new \App\activity;
            $reg->id = $cek_user;
            $reg->id_event = DB::table('event')->where('status', 'Aktif')->value('id_event');
            $reg->verifikator_kedatangan = Auth::user()->nama;
            $reg->waktu_hadir = Carbon::now();
            $reg->save();
        }
    }

    public function index_user_verifikasi_manual()
    {
        $verifikasi = DB::table('user')->leftJoin('activity', 'user.id', '=', 'activity.id')
            ->select(['user.id', 'user.id_anggota', 'user.nama', 'user.kategori', 'user.bidang'])
            ->whereNull('activity.id')
            ->get();
        return DataTables::of($verifikasi)
            ->addColumn('Aksi', function ($verifikasi) {
                return '<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#verif' . $verifikasi->id . '" style="color: #ffffff;">Verifikasi</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function konfirmasi_manual($id)
    {

        $reg = new \App\Models\activity;
        $reg->id = $id;
        $reg->id_event = DB::table('event')->where('status', 'Aktif')->value('id_event');
        $reg->verifikator_kedatangan = Auth::user()->nama;
        $reg->waktu_hadir = Carbon::now();
        $reg->save();
    }

    public function index_user_verifikasi_izin($id)
    {

        $verifikasi = DB::table('user')->leftJoin('activity', 'user.id', '=', 'activity.id')
            ->select(['user.id', 'user.id_anggota', 'user.nama', 'user.bidang'])
            ->whereNotNull('activity.id')
            ->where('id_event', $id)
            ->groupBy('activity.id')
            ->get();
        return DataTables::of($verifikasi)
            ->addColumn('Aksi', function ($verifikasi) {
                return '<center><button type="button" class="btn btn-warning btn-bg" data-toggle="modal" data-target="#izin_keluar' . $verifikasi->id . '" style="color: #ffffff;" title="Izin Keluar"><i class="fa fa-sign-out" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-bg" data-toggle="modal" data-target="#izin_masuk' . $verifikasi->id . '" style="color: #ffffff;" title="Izin Masuk"><i class="fa fa-sign-in" aria-hidden="true"></i></button>&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-success btn-bg" onclick="detil_izin' . $verifikasi->id . '()" style="color: #ffffff;" title="Detail Izin"><i class="fa fa-eye" aria-hidden="true"></i></button></center>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function izin_keluar(Request $request)
    {
        $waktu_dateng = activity::where('id', $request->id_anggota)->where('id_event', $request->sesi)
            ->value('waktu_hadir');
        $verif_dateng = activity::where('id', $request->id_anggota)->where('id_event', $request->sesi)
            ->value('verifikator_kedatangan');

        $keluar = new \App\Models\activity;
        $keluar->id = $request->id_anggota;
        $keluar->id_event = $request->sesi;
        $keluar->verifikator_kedatangan = $verif_dateng;
        $keluar->waktu_hadir = $waktu_dateng;
        $keluar->verifikator_izin_keluar = Auth::user()->nama;
        $keluar->waktu_keluar = Carbon::now();
        $keluar->keterangan = $request->alasan;
        $keluar->save();
    }

    public function izin_masuk(Request $request)
    {

        $masuk = DB::table('activity')->where('id', $request->id_anggota_masuk)
            ->where('id_event', $request->sesi_masuk)
            ->whereNotNull('waktu_keluar')
            ->whereNull('waktu_masuk')
            ->update(['waktu_masuk' => Carbon::now()]);

        $durasi_keluar1 = activity::where('id', $request->id_anggota_masuk)
            ->where('id_event', $request->sesi_masuk)
            ->orderBy('id_activity', 'desc')
            ->value('waktu_keluar');
        $durasi_keluar2 = activity::where('id', $request->id_anggota_masuk)
            ->where('id_event', $request->sesi_masuk)
            ->orderBy('id_activity', 'desc')
            ->value('waktu_masuk');

        $waktu_keluar = Carbon::createFromFormat('Y-m-d H:s:i', $durasi_keluar1);
        $waktu_masuk = Carbon::createFromFormat('Y-m-d H:s:i', $durasi_keluar2);
        $total_durasi_keluar = $waktu_masuk->diffInSeconds($waktu_keluar);

        $masuk = DB::table('activity')->where('id', $request->id_anggota_masuk)
            ->where('id_event', $request->sesi_masuk)
            ->whereNotNull('waktu_masuk')
            ->whereNull('verifikator_izin_masuk')
            ->update(['verifikator_izin_masuk' => Auth::user()->nama, 'total_durasi_izin_sesi' => $total_durasi_keluar]);

        $total_seluruh_durasi = DB::table('activity')->where('id', $request->id_anggota_masuk)
            ->sum('total_durasi_izin_sesi');

        $masuk = DB::table('activity')->where('id', $request->id_anggota_masuk)
            ->where('id_event', $request->sesi_masuk)
            ->update(['total_durasi_seluruh' => $total_seluruh_durasi]);
    }

    public function detail_izin($id)
    {
        $activity = activity::with('activity_event', 'activity_user')->where('id', $id)->get();
        $nama = user::where('id', $id)->value('nama');
        $id_anggota = user::where('id', $id)->value('id_anggota');
        return view('admin.detail_user_izin', compact('activity', 'nama', 'id_anggota'));
    }

    public function index_hadir_full()
    {
        $verifikasi = DB::table('activity')->leftJoin('user', 'user.id', '=', 'activity.id')
            ->select(['user.id', 'user.nama', 'user.kategori', 'user.nama_angkatan', 'user.bidang', 'user.id_anggota'])
            ->whereNotNull('activity.id')
            ->groupBy('activity.id')
            ->get();
        return DataTables::of($verifikasi)
            ->addColumn('Detail', function ($verifikasi) {
                return '<center><button type="button" class="btn btn-success btn-bg" onclick="detil_izin_summary' . $verifikasi->id . '()" style="color: #ffffff;" title="Detail Izin">Detail</button></center>';
            })
            ->rawColumns(['Detail'])
            ->make(true);
    }

    public function kehadiran_peserta()
    {
        $jumlah = activity::whereNull('waktu_keluar')->whereHas('activity_event', function ($q) {
            $q->where('status', 'Aktif');
        })->count('id');
        $dari = user::count('id');
        $hasil_kehadiran = "" . $jumlah . "/" . $dari . "";
        return Response()->json($hasil_kehadiran);
    }

    public function kehadiran_bidang()
    {
        $id_event = event::where('status', 'Aktif')->value('id_event');
        $bidang_hadir = DB::table('activity')->join('user', 'activity.id', '=', 'user.id')
            ->where('activity.id_event', $id_event)
            ->whereNotIn('user.bidang', ['Panitia Pelaksana'])
            ->groupBy('user.bidang')
            ->get();
        $jumlah = count($bidang_hadir);
        $get_bidang = DB::table('user')->whereNotIn('bidang', ['Panitia Pelaksana'])
            ->groupBy('bidang')
            ->get();
        $dari = count($get_bidang);

        $kehadiran_bidang = "" . $jumlah . "/" . $dari . "";

        return Response()->json($kehadiran_bidang);
    }

    public function kamu_verif()
    {
        $id_event = event::where('status', 'Aktif')->value('id_event');
        $by_you = activity::where('id_event', $id_event)->where('verifikator_kedatangan', Auth::user()->nama)
            ->count();
        return Response()->json($by_you);
    }

    public function update_session($id)
    {
        $cek = event::where('id', $id)->value('status');
        if ($cek == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        event::where('id', $id)->update(['status' => $status, 'session_start' => Carbon::now(), 'session_end' => Carbon::now()->addMinutes(30)]);

        if (event::where('id', $id)->value('status') == 1) {
            event::whereNotIn('id', [$id])->update(['status' => 0, 'session_start' => null, 'session_end' => null]);
        }

        $all = event::get();
        return view('Admin.attribute.event_row', compact('all'));
    }

    public function try()
    {
        // ping::(new listenqrscanned());
        // Broadcast::listenqrscanned();
        Broadcast(new listenQR());
    }
}
