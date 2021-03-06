<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\customer;
use App\transaksi;
use App\harga;
use Auth;
use Rupiah;
use DB;
use Alert;

use Carbon\carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $user ;
    function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->user = \Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adm()
    {
        if (Auth::user()->auth === "Admin") {
            $adm = User::where('auth','Admin')->get();
            return view('modul_admin.pengguna.admin', compact('adm'));
        } else {
            return redirect('home');
        }
    }

    public function kry()
    {
       if (Auth::user()->auth === "Admin") {
            $kry = User::where('auth','Karyawan')->get();
            return view('modul_admin.pengguna.kry', compact('kry'));
       } else {
            return redirect('home');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->auth === "Admin") {
            return view('modul_admin.pengguna.addadm');
        } else {
            return redirect('home');
        }   
    }

    public function addkry()
    {
        if (Auth::user()->auth === "Admin") {
            return view('modul_admin.pengguna.addkry');
        } else {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->auth === "Admin") {

            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->withErrors(['errors' => 'Email Sudah Terdaftar !!']);
            } elseif (User::where('nama_cabang', $request->nama_cabang)->exists()) {
                return redirect()->back()->withErrors(['errors' => 'Nama Cabang Sudah Terdaftar !!']);
            } 

            $adduser = New User();
            $adduser->name = $request->name;
            $adduser->email = $request->email;
            $adduser->status = 'Aktif';
            $adduser->nama_cabang = $request->nama_cabang;
            $adduser->alamat = $request->alamat;
            $adduser->alamat_cabang = $request->alamat_cabang;
            $adduser->no_telp = $request->no_telp;
            $adduser->auth = $request->auth;
            $adduser->password = bcrypt('123456');
            $adduser->save();            

            
            if ($adduser->auth == "Admin") {
                alert()->success('Admin Berhasil Dibuat');
                return redirect('adm');
            } else {
                alert()->success('Tambah Karyawan Berhasil');
                return redirect('kry');
            }
            
        } else {
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->auth === "Admin") {
            $edit = User::find($id);
            if ($edit->auth == "Admin") {
                return view('modul_admin.pengguna.editadm', compact('edit'));
            } else {
                return view('modul_admin.pengguna.editkry', compact('edit'));
            }
            
        } else {
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->auth === "Admin") {
            $adduser = User::find($id);
            $adduser->name = $request->name;
            $adduser->email = $request->email;
            $adduser->status = $request->status;
            $adduser->nama_cabang = $request->nama_cabang;
            $adduser->alamat = $request->alamat;
            $adduser->alamat_cabang = $request->alamat_cabang;
            $adduser->no_telp = $request->no_telp;
            $adduser->auth = $request->auth;
            $adduser->save();

            if ($adduser->auth == "Admin") {
                alert()->success('Update Data Berhasil');
                return redirect('adm');
            } else {
                alert()->success('Update Data Berhasil');
                return redirect('kry');
            }
            
        } else {
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->auth == "Admin") {
            $del = User::find($id);
            $del->delete();

            if ($del->auth == "Admin") {
                return redirect('adm');
            } else {
                return redirect('kry');
            }
            
        } else {
            return redirect('home');
        }
    }

// Modul Customer
    public function customer()
    {
        if (Auth::user()->auth == "Admin") {
            $customer = customer::all();
            return view('modul_admin.customer.index', compact('customer'));
        } else {
            return redirect('home');
        }
    }

    // DISABLED
    public function addcustomer()
    {
        if (Auth::user()->auth == "Admin") {
            return view('modul_admin.customer.create');
        } else {
            return redirect('home');
        }
    }

    // DISABLED
    public function storecustomer(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            $addplg = New customer();
            $addplg->nama = $request->nama;
            $addplg->alamat = $request->alamat;
            $addplg->kelamin = $request->kelamin;
            $addplg->no_telp = $request->no_telp;
            $addplg->save();

            alert()->success('Tambah Customer Berhasil');
            return redirect('customer');
        } else {
            return redirect('home');
        }
    }

    public function editcustomer($id_customer)
    {
       if (Auth::user()->auth == "Admin") {
            $edit = customer::find($id_customer);
            return view('modul_admin.customer.edit', compact('edit'));
       } else {
           return redirect('home');
       }
    }

    public function updatecustomer(Request $request,$id_customer)
    {
        if (Auth::user()->auth == "Admin") {
            $addplg =  customer::find($id_customer);
            $addplg->nama = $request->nama;
            $addplg->alamat = $request->alamat;
            $addplg->kelamin = $request->kelamin;
            $addplg->no_telp = $request->no_telp;
            $addplg->save();

            alert()->success('Update Data Berhasil');
            return redirect('customer');
        } else {
            return redirect('home');
        }
    }

    // DISABLED
    public function deletecustomer($id_customer)
    {
        if (Auth::user()->auth == "Admin") {
            $del = customer::find($id_customer);
            $del->delete();
                return redirect('customer');
        } else {
            return redirect('home');
        }
    }

// Modul Data Laundri
    public function datatransaksi()
    {
        if (Auth::user()->auth == "Admin") {
            $transaksi = transaksi::selectRaw('transaksis.id,transaksis.id_customer,transaksis.tgl_transaksi,transaksis.customer,transaksis.status_order,transaksis.status_payment,transaksis.harga_akhir,transaksis.id_jenis,transaksis.kg,transaksis.hari,transaksis.harga,a.jenis')
            ->leftJoin('hargas as a' , 'a.id' , '=' ,'transaksis.id_jenis')
            ->orderBy('id','DESC')->get();

            $filter = User::select('id','name')->where('auth','Karyawan')->get();
            return view('modul_admin.laundri.transaksi', compact('transaksi','filter'));
        } else {
            return redirect('home');
        }
    }

    // Tambah dan Data Harga
    public function dataharga()
    {
       if (Auth::user()->auth == "Admin") {
            $harga = harga::selectRaw('hargas.*,a.nama_cabang')
            ->leftJoin('users as a','a.id','=','hargas.id_cabang')
            ->orderBy('id','DESC')->get(); // Ambil data harga
            $karyawan = User::where('auth','Karyawan')->first(); // Cek Apakah sudah ada karyawan atau belum 
            $getcabang = User::where('auth','Karyawan')->where('status','Aktif')->get();
            return view('modul_admin.laundri.harga', compact('harga','karyawan','getcabang'));
       } else {
           return redirect('home');
       }
    }

    // Proses Simpan Harga
    public function hargastore(Request $request)
    {
        if (Auth::user()->auth == "Admin") {
            
            $addharga = new harga();
            $addharga->id_cabang = $request->id_cabang;
            $addharga->jenis = $request->jenis;
            $addharga->kg = 1000; // satuan gram
            $addharga->harga = $request->harga;
            $addharga->hari = $request->hari;
            $addharga->status = 1; //aktif
            $addharga->save();

            alert()->success('Tambah Data Harga Berhasil');
            return redirect('data-harga');
        } else {
            return redirect('home');
        }
    }

    public function hargaedit(Request $request)
    {
       if (Auth::user()->auth == "Admin") {
        $editharga = harga::find($request->id_harga);
        $editharga->update([
            'jenis' => $request->jenis,
            'kg'    => $request->kg,
            'harga' => $request->harga,
            'hari' => $request->hari,
            'status' => $request->status,
        ]);
        return $editharga;
       } else {
           return redirect('/home');
       }
       
    }

// Laporan

    // Invoice
    public function invoice( Request $request,$id)
    {
        if (Auth::user()->auth == "Admin") {
            $invoice = transaksi::selectRaw('transaksis.id,transaksis.id_customer,transaksis.tgl_transaksi,transaksis.customer,transaksis.status_order,transaksis.status_payment,transaksis.id_jenis,transaksis.harga_akhir,transaksis.kg,transaksis.hari,transaksis.harga,transaksis.disc,a.jenis')
            ->leftJoin('hargas as a' , 'a.id' , '=' ,'transaksis.id_jenis')
            ->where('transaksis.id', $request->id)
            ->orderBy('id','DESC')->get();

            $data = transaksi::selectRaw('transaksis.id,transaksis.id_customer,transaksis.id_karyawan,transaksis.tgl_transaksi,transaksis.customer,transaksis.status_order,transaksis.status_payment,transaksis.id_jenis,transaksis.harga_akhir,transaksis.kg,transaksis.tgl_ambil,transaksis.invoice,transaksis.disc,a.nama,a.alamat,a.no_telp,a.kelamin,b.name,b.nama_cabang,b.alamat_cabang,b.no_telp as no_telpc')
            ->leftJoin('customers as a' , 'a.id_customer' , '=' ,'transaksis.id_customer')
            ->leftJoin('users as b' , 'b.id' , '=' ,'transaksis.id_karyawan')
            ->where('transaksis.id', $request->id)
            ->orderBy('id','DESC')->first();

            return view('modul_admin.laporan.invoice', compact('invoice','data'));
        } else {
            return redirect('/home');
        }
    }

    // Notifikasi 
    public function notif(Request $request)
    {
        $notif = transaksi::find($request->id);
        if (auth::user()->auth == "Admin") {
            $notif->update([
                'notif_admin' => 1
            ]);
        } else {
            $notif->update([
                'notif' => 1
            ]);
        }
        

        return $notif;
        
    }

    // Hitung Jumlah Transaksi Keseluruhan
    public function jmlTransaksi(Request $request)
    {
        $jml = customer::select(DB::raw('t.id_customer,t.nama,t.alamat,t.kelamin,t.no_telp,a.kg'))
        ->from(DB::raw('(SELECT * from customers order by created_at DESC) t'))
        ->leftJoin('transaksis as a' ,'a.id_customer' , '=' , 't.id_customer')
        ->groupBy('t.id_customer')
        ->get();

        return view('modul_admin.customer.jmltransaksi', compact('jml'));
    }

    // Data Finance Cabang
    public function finance(Request $request)
    {
        if (auth::user()->auth == "Admin") {
            $all = transaksi::sum('harga_akhir');
            $bulan = transaksi::where('bulan', Carbon::now()->month)->sum('harga_akhir');
            $tahun = transaksi::where('tahun', Carbon::now()->year)->sum('harga_akhir');

            $bln = transaksi::where('bulan', Carbon::now()->month)->get();
            $thn = transaksi::where('tahun', Carbon::now()->year)->get();
            $al = transaksi::all();

            $kg = transaksi::sum('kg');
            $transaksi = transaksi::get();
            $user = transaksi::select('id_customer')->groupBy('id_customer')->get();
            return view('modul_admin.finance.cabang', compact('all','bulan','tahun','kg','transaksi','user','bln','al','thn'));
        }
    }

    public function feedback()
    {
        if (auth::check()) {
            if (auth::user()->auth === "Admin"){
                
            $feedback = DB::table('feedback')->get();
 

            return view('feedbackform',['feedback' => $feedback]);
            }

            else
                return view('errors.404');
            
        }
        
       
    }








    // Filter Transaksi
    public function filtertransaksi(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->auth == "Admin") {
                $transaksi = transaksi::selectRaw('transaksis.id,transaksis.id_customer,transaksis.id_karyawan,transaksis.tgl_transaksi,transaksis.customer,transaksis.status_order,transaksis.harga_akhir,transaksis.status_payment,transaksis.id_jenis,transaksis.kg,transaksis.hari,transaksis.harga,a.jenis')
                ->leftJoin('hargas as a' , 'a.id' , '=' ,'transaksis.id_jenis')
                ->where('transaksis.id_karyawan', $request->id_karyawan)
                ->get();

                $return = "";
                $no=1;
                foreach($transaksi as $item) {
                    $return .="<tr>
                                    <td>".$no."</td>
                                    <td>".$item->tgl_transaksi."</td>
                                    <td>".$item->customer."</td>
                                    <td>".$item->status_order."</td>
                                    <td>".$item->status_payment."</td>
                                    <td>".$item->jenis."</td>";
                                    $return .="
                                    <input type='hidden' value='".$item->kg * $item->harga."'>
                                    <td>".Rupiah::getRupiah($item->kg * $item->harga)."</td>
                                    ";
                                    if ($item->status_order == "Diambil"){
                                        $return .="<td><a href='{{url('invoice-customer', $item->id)}}' class='btn btn-sm btn-success style='color:white'>Invoice</a>
                                        <a class='btn btn-sm btn-info' style='color:white'>Detail</a></td>";
                                    }                                   
                                elseif($item->status_order == "Selesai")
                                  {
                                    $return .="<td> <a href='{{url('invoice-customer', $item->id)}}' class='btn btn-sm btn-success' style='color:white'>Invoice</a>
                                    <a class='btn btn-sm btn-info' style='color:white'>Detail</a></td>";
                                  }
                                elseif($item->status_order == "Proses")
                                  {
                                    $return .="<td> <a href='{{url('invoice-customer', $item->id)}}' class='btn btn-sm btn-success' style='color:white'>Invoice</a>
                                    <a class='btn btn-sm btn-info' style='color:white'>Detail</a></td>";
                                  }
                    $return .= "</td>
                    </tr>";
                    $no++;
                    }
                    return $return;
            }
        }
    }
}
