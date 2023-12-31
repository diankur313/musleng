<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Models\User;
use App\Models\event;
use App\Models\activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Excel;
use Session;
use Carbon\Carbon;
use PDF;
use App\Models\camera;
use App\Models\attendance;

class Verificator extends Controller
{
    public function home()
    {
        return view('scanner.scanner');
    }

    public function change_camera()
    {
        $val = camera::where('id_user', Auth::user()->id)->orderBy('id', 'desc')->value('num_of_camera');
        return $val;
    }

    public function change_camera_post(Request $req)
    {
        $activated = $req->active_camera;
        $camera_length = $req->camera_length;

        $cek = camera::where('id_user', Auth::user()->id)->orderBy('id', 'desc')->value('num_of_camera');

        if ($activated == null) {
            camera::insert(['id_user' => Auth::user()->id, 'num_of_camera' => '0']);
        } else if ($camera_length - ($cek + 1) == 0) {
            camera::insert(['id_user' => Auth::user()->id, 'num_of_camera' => '0']);
        } else if ($cek == 3) {
            camera::insert(['id_user' => Auth::user()->id, 'num_of_camera' => '0']);
        } else {
            $val = camera::where('id_user', Auth::user()->id)->orderBy('id', 'desc')->value('num_of_camera');
            camera::insert(['id_user' => Auth::user()->id, 'num_of_camera' => ($val + 1)]);
        }
        return back();
    }

    public function input_scan($id)
    {
        // dd(explode('|', $id)[0], explode('|', $id)[1]);
        $main = explode('|', $id);

        //Active session
        $time = date('Y-m-d H:i:s');
        $session = event::where(function ($q) use ($time) {
            $q->where([
                ['session_start', '<', $time], ['session_end', '>', $time]
            ]);
        })->where('status', '1')->first();

        if (empty($session)) {
            $dt = event::where('uuid', $main[0])->first('nama_event');
            return response()->json(['message' => 'Your session has expired'], 401);
        }

        //Validate user
        if (!user::where('uuid', $main[1])->exists()) {
            return response()->json(['message' => "Your QR not found in database"], 402);
        }

        if (empty(attendance::where('id_event', $main[0])->where('id_user', $main[1])->first())) {
            attendance::create(['id_event' => $main[0], 'id_user' => $main[1], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
        return response()->json(user::where('uuid', $main[1])->first());
    }

    public function check_scan()
    {
        $val = attendance::leftJoin('event', 'attendance.id_event', '=', 'event.uuid')
            ->where('event.status', '1')
            ->count('attendance.id_user');
        $active = event::where('status', 1)->value('nama_event');
        return response()->json([$val, $active]);
    }
}
