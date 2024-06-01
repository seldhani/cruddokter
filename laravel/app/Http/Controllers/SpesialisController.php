<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class SpesialisController extends Controller
{

public function index()
    {
    	// mengambil data dari table
    	$tb_spesialis = DB::table('tb_spesialis')->get();
 
    	// mengirim data ke view
    	return view('spesialis',['tb_spesialis' => $tb_spesialis]);
 
    }
	public function tambah(Request $request)
    {
    	DB::table('tb_spesialis')->insert([
			'Kd_spesialis' => $request->Kd_spesialis,
			'spesialis' => $request->spesialis,
		]);
		// alihkan halaman ke halaman dokter
		return redirect('/spesialis');
 
    }
	public function hapus(Request $request)
    {
		$Kd_spesialis=$request->Kd_spesialis;
		DB::table('tb_spesialis')->where('Kd_spesialis',$Kd_spesialis)->delete();

		// alihkan halaman ke halaman dokter
		return redirect('/spesialis');
}
public function edit(Request $request)
    {	
    	DB::table('tb_spesialis')->where('Kd_spesialis',$request->Kd_spesialis)->update([
            
			'spesialis' => $request->spesialis,
           
		]);
		// alihkan halaman ke halaman dokter
		return redirect('/spesialis');
 
    }
}
