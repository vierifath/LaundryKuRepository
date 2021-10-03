<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use Auth;

class FrontController extends Controller
{

    private $user ;
    function __construct(Request $request)
    {
        // $this->middleware('guest');
        $this->user = \Auth::user();
    }

    public function index(){
        if(Auth::check()){
            if (Auth::user()->auth === "Admin") {
                return view('frontend.index');
            }else if (Auth::user()->auth === "Karyawan") {
                return view('frontend.index');
            }else if (Auth::user()->auth === "Customer") {
                return view('frontend.index');
            }
        }
        else {
            return view('frontend.index');
        }
    }

    //search
    public function search(Request $request)
    {
        $search = transaksi::where('invoice', $request->search_status);
        if ($search->count() == 0) {
            $return = 0;
         }else{
            $return = $search->first();
         }
         return $return;
    }
}
