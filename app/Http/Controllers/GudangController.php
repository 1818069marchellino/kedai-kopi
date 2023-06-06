<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class GudangController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$gudang = DB::table('gudang')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index2',['gudang' => $gudang]);
 
    }

    public function create()
    {
        return view('tambah1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('gudang')->insert([
            'lokasi_gudang' => $request->lokasi_gudang,
            'nama_gudang' => $request->nama_gudang
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/gudang');
    }

    public function edit(string $id)
    {
        $gudang = DB::table('gudang')->where('id_gudang',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit1',['gudang' => $gudang]);
    }

    public function update(Request $request)
{
	// update data pegawai
	DB::table('gudang')->where('id_gudang',$request->id)->update([
		'lokasi_gudang' => $request->lokasi_gudang,
            'nama_gudang' => $request->nama_gudang
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/gudang');
}

public function destroy(string $id)
{
    DB::table('gudang')->where('id_gudang',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/gudang');
}
}