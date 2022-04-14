<?php

namespace App\Http\Controllers;

use App\siswa;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Dashboardcontroller extends Controller
{




    public function dashboard(Request $request)
    {
        $Jsiswa     = \App\siswa::all()->count();

        $Lsiswa     = \App\siswa::where('jenis_kelamin', '=', 'L')->count();

        $Psiswa     = \App\siswa::where('jenis_kelamin', '=', 'P')->count();



        $siswalaki          =
            $Lsiswa;
        $siswiperempuan     =
            $Psiswa;
        $totalsiswa         =
            $Jsiswa;

        return view('dashboard.index', [
            'totalsiswa'        => $totalsiswa,
            'siswalaki'         => $siswalaki,
            'siswiperempuan'     => $siswiperempuan,


        ]);
    }
}
