<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>@yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{asset('frontend/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/plugins/animate/animate.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/style.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/forum/theme/default.css')}}" id="theme" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('frontend/plugins/pace/pace.min.js')}}"></script>
    
    <!-- ================== END BASE JS ================== -->
    <style type="text/css">
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{url('/')}}" class="navbar-brand">
                    <span class="navbar-logo"></span>
                    <span class="brand-text">
                        Laundry - Ku
                    </span>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- begin #header-navbar -->
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                    <li> <a href="{{url('/')}}">Selamat datang, {{auth::user()->name}}</a> </li>
                    <li> <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Keluar
                    </a> </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @else
                    <li><a href="{{route('login')}}">Masuk</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{route('register')}}">Daftar</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
            <!-- end #header-navbar -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #header -->
    
    <!-- begin search-banner -->
    <div class="search-banner has-bg">
       @yield('header')
    </div>
    <!-- end search-banner -->
    
    {{-- <!-- begin content -->
    <div class="content">
        <!-- begin container -->
        @yield('content')
        <!-- end container -->
    </div> --}}
    <!-- end content -->
    
    <!-- begin #footer -->
    
    <div id="footer" class="footer mb-0">
        <!-- begin container -->
        <div class="container-fluid mb-0">
            <!-- begin row -->
            <div class="row">
                <!-- begin col-4 -->
                <div class="col-xl-4 col-lg-4 col-12">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4>Tentang Laundry-Ku</h4>
                        <p>Outlet LaundryKu</p>
                        <p>
                            Alamat :<br>Jl. Matahari (Komplek Pasar Baru) Kecamatan Majenang, Kabupaten Cilacap, Jawa Tengah.</p> 
                        <p><br></p>
                            <h4>Operasional</h4>
                        <p>Libur Setiap Hari Jum’at</p>
                        <p>Jam 08:00 sd 21:00</p>
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-xl-4 col-lg-4 col-12">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4>Ketentuan</h4>
                       <p class="text-justify">
                           1) Pekerjaan di lakukan sesuai jam kerja, yaitu dari pukul 08.00 – 21.00 WIB. Diluar jam itu pekerjaan laundry tidak dilakukan.
                        </p>    
                        <p class="text-justify">2) Pakaian berpotensi luntur, susut, atau berkerut wajib dimasukkan kelayanan satuan.</p>
                        <p class="text-justify">3) Kami tidak bertanggung jawab atas terjadinya resiko kelunturan, susut, dan berkerut karena sifat serat bahan dalam layanan laundry kiloan.</p>
                        <p class="text-justify">4) Setiap pakaian yang masuk wajib di hitung di depan pelanggan.</p>
                        <p class="text-justify">5) Barang yang tidak diambil selama 1 bulan jika hilang / rusak bukan tanggung jawab kami.</p>
                        
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-4 -->
                <!-- begin col-4 -->
                <div class="col-xl-4 col-lg-4 col-12">
                    <!-- begin section-container -->
                    <div class="section-container">
                        <h4>Hubungi Kami</h4>
                        <p>Customer Service 1</p> 
                        <p>WhatsApp: 087878-373777</p> 
                        <p>Telpon: 0280-7429-999</p> 

                        <p><br></p>
                        <p>Customer Service 2</p> 
                        <p>WhatsApp: 087999-665657</p> 
                        <p>Telpon: 0280-8730-562</p> 
                           
                           
                            
                    </div>
                    <!-- end section-container -->
                </div>
                <!-- end col-4 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end #footer -->
    <!-- begin #footer-copyright -->
    <div class="footer-copyright">
        <div class="container-fluid">
            &copy; 2020 Build With <i class="fa fa-heart" style="color:red"></i> - <a href="#" target="_blank" style="text-decoration:none">Kelompok B05 MPPL</a>
        </div>
    </div>
    <!-- end #footer-copyright -->	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('frontend/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/plugins/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('frontend/js/forum/apps.min.js')}}"></script>
    <script src="{{asset('frontend/js/swal/sweetalert2.all.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>    
	    $(document).ready(function() {
	        App.init();
	    });
    </script>
    @yield('scripts')
</body>
</html>


{{-- .footer1 {
    position: absolute;
    bottom: 0;
    width: 100%;
    background-color: #333;
    color:#fff;
  } --}}