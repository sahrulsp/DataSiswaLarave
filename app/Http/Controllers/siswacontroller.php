<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PDF;

class siswacontroller extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\siswa::where('nama_lengkap', 'LIKE', '%', $request->cari, '%')->get();
        } else {
            $data_siswa = \App\siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    // awal creatae
    public function create(Request $request)
    {


        // masuk ke tabel user
        $user = new \App\User;
        $user->role = 'staff';
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('ayun');
        $user->remember_token = str_random(60);
        $user->save();

        // masuk ke tabel siswa
        $request->request->add(['user_id' => $user->id]);
        $staffs = \App\staff::create($request->all());
        return Redirect('/staff')->with('sukses', 'Data Berhasil DiInput');
    }
    // tutup create



    // awal edit
    public function edit($id)
    {
        $siswa = \App\siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }

        return Redirect('/siswa')->with('sukses', 'Data Berhasil DiUpdate');
    }

    // tutup edit


    // awal delete
    public function delete($id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data Berhasil DiHapus');
    }

    public function profile($id)
    {

        $siswa = \App\siswa::find($id);
        $matapelajaran = \App\Mapel::all();
        return view('siswa.profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        $siswa = \App\siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $idsiswa . '/profile')->with('error', 'Data Mata Pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/' . $idsiswa . '/profile')->with('sukses', 'Data berhasil di input');
    }

    public function exportPdf()
    {
        $siswa = \App\siswa::all();
        $pdf = PDF::loadview('export.siswapdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    // tutup delete

}
