@extends('layouts.auth')
@section('title','Feedback Form')
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="{{asset('backend/images/pages/reset-password.png')}}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Pengisian Feedback</h4>
                            </div>
                        </div>
                        <p class="px-2">Selamat Datang, Silakan mengisi feedback layanan laundry.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form action="/feedback/add" method="POST">
									@csrf
									
									{{-- <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="" name="IDFeedback" class="form-control" id="IDFeedback" placeholder="ID Feedback" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
                                        </div>
                                        <label for="IDFeedback">ID Feedback</label>
									</fieldset> --}}

                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="" name="NoInvoice" class="form-control" id="NoInvoice" placeholder="No. Invoice" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
                                        </div>
                                        <label for="invoice">No. Invoice</label>
									</fieldset>
									

									<fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="" name="Nama" class="form-control" id="Nama" placeholder="Nama Customer" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
                                        </div>
                                        <label for="Nama">Nama Customer</label>
									</fieldset>



									{{-- <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="" name="Rating" class="form-control" id="Rating" placeholder="Rating" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
                                        </div>
                                        <label for="Rating">Rating</label>
									</fieldset> --}}

									<fieldset class="form-label-group form-group position-relative has-icon-left">

					
										<select name="Rating" class="form-control custom-select" id="Rating" placeholder="Rating" >
											<option placeholder="Rating" selected>Berikan Rating !</option>
											<option value="Sangat Memuaskan">Sangat Memuaskan</option>
											<option value="Memuaskkan">Memuaskkan</option>
											<option value="Normal">Normal</option>
											<option value="Buruk">Buruk</option>
											<option value="Sangat Buruk">Sangat Buruk</option>
											
										  </select>

										  <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
										</div>
										
		
                                      
                                        <label for="Rating">Rating</label>
									</fieldset>

								
      
									
									<fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="" name="Ulasan" class="form-control" id="Ulasan" placeholder="Ulasan" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-edit"></i>
                                        </div>
                                        <label for="ulasan">Ulasan</label>
									</fieldset>
									
								
                                    <button type="submit" class="btn btn-primary float-right btn-inline btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider">
								<div><br></div>
                                <div class="divider-text">Terima kasih telah memberikan feedback</div>
                            </div>
                            <p style="font-size:10px"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



{{-- @section('title','Masuk')
@section('content')
<section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="{{asset('backend/images/pages/login.png')}}" alt="branding logo">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Masuk</h4>
                            </div>
                        </div>
                        <p class="px-2">Selamat Datang, Masuk Menggunakan Akun Kamu.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-Mail" value="{{ old('email') }}" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="email">E-Mail</label>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="Password" required>
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="user-password">Password</label>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary float-right btn-inline btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider">
                                <div class="divider-text"><a href="/">Laundry - Ku</a></div>
                            </div>
                            <p style="font-size:10px">Jika ada kendala, silakan hubungi Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}