<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class HargaController extends Controller
{
    public function index()
    {

    	$harga = DB::table('hargas')->get();
 
    	
    	return view('hargalist',['harga' => $harga]);
 
    }
}