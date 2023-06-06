<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class PegawaiController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('pegawai')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index1',['pegawai' => $pegawai]);
 
    }

    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pegawai')->insert([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pegawai');
    }

    public function edit(string $id)
    {
        $pegawai = DB::table('pegawai')->where('id_pegawai',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit',['pegawai' => $pegawai]);
    }

    public function update(Request $request)
{
	// update data pegawai
	DB::table('pegawai')->where('id_pegawai',$request->id)->update([
		'nama' => $request->nama,
		'jabatan' => $request->jabatan,
		'jenis_kelamin' => $request->jenis_kelamin
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/pegawai');
}

public function destroy(string $id)
{
    DB::table('pegawai')->where('id_pegawai',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/pegawai');
}
}