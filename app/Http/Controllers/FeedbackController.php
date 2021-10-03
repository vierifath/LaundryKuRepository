<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\customer;

 
class FeedbackController extends Controller
{

    private $user ;
    function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->user = \Auth::user();
    }
        public function create()
        {
            if(Auth::check()){
            if (Auth::user()->auth === "Customer"){
            return view('feedbackcreate');
            } else {
                return redirect('/home');
            } 
        }  
        }

        public function add(Request $r)
        {
            DB::table('feedback')->insert([
                'NoInvoice' => $r->NoInvoice,
                'Nama' => $r->Nama,
                'Rating' => $r->Rating,
                'Ulasan' => $r->Ulasan
            ]);
            return redirect('/home');
        }       
}