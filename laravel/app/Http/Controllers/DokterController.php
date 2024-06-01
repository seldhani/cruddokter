<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DokterController extends Controller
{

public function index()
    {
    	// mengambil data dari table
    	$tb_dokter = DB::table('tb_dokter')->get();
 
    	// mengirim data ke view
    	return view('dokter',['tb_dokter' => $tb_dokter]);
 
    }
    public function tambah(Request $request)
    {
    	DB::table('tb_dokter')->insert([
			'Kd_dokter' => $request->Kd_dokter,
			'Nama_dokter' => $request->Nama_dokter,
			'Kd_spesialis' => $request->Kd_spesialis,
			'telepon' => $request->telepon,
			'sex' => $request->sex,

		]);
		// alihkan halaman ke halaman dokter
		return redirect('/dokter');
 
    }
    public function hapus(Request $request)
    {
		$Kd_dokter=$request->Kd_dokter;
		DB::table('tb_dokter')->where('Kd_dokter',$Kd_dokter)->delete();

		// alihkan halaman ke halaman dokter
		return redirect('/dokter');
}
public function edit(Request $request)
    {	
    	DB::table('tb_dokter')->where('Kd_dokter',$request->Kd_dokter)->update([
            
			'Nama_dokter' => $request->Nama_dokter,
            'Kd_spesialis' => $request->Kd_spesialis,
			'telepon' => $request->telepon,
			'sex' => $request->sex,

		]);
		// alihkan halaman ke halaman dokter
		return redirect('/dokter');
 
    }
}