<?php

namespace App\Http\Controllers;

use App\Models\Rencana_kerja;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function index()
    {
        $besuk = date('Y-m-d', strtotime('1 days', strtotime(date('Y-m-d'))));
        $rencanakerja = Rencana_kerja::whereDate('waktu_mulai', '=', $besuk)->orderBy('waktu_mulai', 'ASC')->get();

        $i = 0;
        $message = "Jadwal Rencana Kerja - $besuk \n\n";
        foreach ($rencanakerja as $data) {
            $i++;
            $message = $message . $i . ". " . date("H:i", strtotime($data->waktu_mulai)) . " - " . date("H:i", strtotime($data->waktu_selesai)) . "\n     Agenda : " . $data->nama_rencana . "\n     Lokasi : " . $data->lokasi . "\n\n";
        }

        $messages = urlencode($message);

        return Redirect::to("https://api.telegram.org/bot5110918748:AAEnZ_VGkerm36Khp0V4av_omSWIVAcxqJk/sendMessage?chat_id=-752732714&text=$messages");
    }
}
