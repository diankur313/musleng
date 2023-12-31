<?php

namespace App\Http\Controllers;
use App\Models\event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

class Peserta extends Controller
{
    public function index()
    {
        $time = date('Y-m-d H:i:s');
        $session = event::where(function ($q) use ($time) {
            $q->where([
                ['session_start', '<', $time], ['session_end', '>', $time]
            ]);
        })->where('status','1')->first();
        // dd($session);

        if (!empty($session)) {
            $qr = QrCode::Size(220)->generate($session->uuid  . '|' . Auth::user()->uuid);
        } else {
            $qr = null;
        }
        return view('peserta.peserta', compact('qr', 'session'));
    }

    public function countdown()
    {
        $time = date('Y-m-d H:i:s');
        $session = event::where(function ($q) use ($time) {
            $q->where([
                ['session_start', '<', $time], ['session_end', '>', $time]
            ]);
        })->first();

        return $session;
    }
}