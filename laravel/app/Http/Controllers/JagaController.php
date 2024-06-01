<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class JagaController extends Controller
{

public function index()
    {
    	// mengambil data dari table
    	$tb_jaga = DB::table('tb_jaga')->get();
 
    	// mengirim data ke view
    	return view('jaga',['tb_jaga' => $tb_jaga]);
 
    }
	public function tambah(Request $request)
    {
    	DB::table('tb_jaga')->insert([
			'Kd_dokter' => $request->Kd_dokter,
			'hari' => $request->hari,
			'Jam_mulai' => $request->Jam_mulai,
			'Jam_selesai' => $request->Jam_selesai,

		]);
		// alihkan halaman ke halaman dokter
		return redirect('/jaga');
 
    }
	public function hapus(Request $request)
    {
		$Kd_dokter=$request->Kd_dokter;
		DB::table('tb_jaga')->where('Kd_dokter',$Kd_dokter)->delete();

		// alihkan halaman ke halaman dokter
		return redirect('/jaga');
}
public function edit(Request $request)
    {	
    	DB::table('tb_jaga')->where('Kd_dokter',$request->Kd_dokter)->update([
            
			'hari' => $request->hari,
            'Jam_mulai' => $request->Jam_mulai,
			'Jam_selesai' => $request->Jam_selesai,

		]);
		// alihkan halaman ke halaman dokter
		return redirect('/jaga');
 
    }
}
