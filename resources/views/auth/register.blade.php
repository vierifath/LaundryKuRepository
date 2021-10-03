@extends('layouts.auth')
@section('title','Mendaftar')
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
                                <h4 class="mb-0">Mendaftar</h4>
                            </div>
                        </div>
                        <p class="px-2">Selamat Datang, Daftar Untuk Menggunakan Layanan Laundry.</p>
                        <p class="px-2" style="font-size:10px">Yang bisa mendaftar hanya Customer saja</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form action="{{route('register')}}" method="POST">
                                    @csrf
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="name">Name</label>
                                    </fieldset>

                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="email">E-Mail</label>
                                    </fieldset>


                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input id="alamat" type="text" class="form-control @error('name') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="" autofocus>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="alamt">Alamat</label>
                                    </fieldset>

                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required autocomplete="" autofocus>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="no_telp">No Telp</label>
                                    </fieldset>

                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        {{-- <input id="kelamin" type="text" class="form-control @error('kelamin') is-invalid @enderror" name="kelamin" value="{{ old('kelamin') }}" required autocomplete="" autofocus> --}}
                                        <select name="kelamin" class="form-control custom-select" id="kelamin" >
                                            <option selected>...</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                            
                                          </select>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="kelamin">Jenis Kelamin</label>
                                    </fieldset>


                                  

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="password">Password</label>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="user-password">Confirmation Password</label>
                                    </fieldset>
                                    <button type="submit" class="btn btn-primary float-right btn-inline btn-block">Register</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="divider">
                                <!-- <div class="divider-text">NOTE</div> -->
                            </div>
                            <!-- <p style="font-size:10px">Jika ingin mendaftar silahkan hubungi nomor ini : 0822-4888-5062</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection