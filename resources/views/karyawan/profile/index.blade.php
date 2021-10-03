@extends('layouts.backend')
@section('title','Profile')
@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="col text-center">
                    <div class="m-t-30"> <img src="{{asset('backend/images/profile/user-uploads/user-01.jpg')}}" class="rounded" width="230" />
                        <h4 class="card-title m-t-10">{{$user->name}}
                        </h4>
                        <h6 class="card-subtitle">Karyawan</h6>
                    </div>
                </div>
            </div>
            <div>
                <hr> </div>
            <div class="card-body"> <small class="text-muted">Email address </small>
                <h6>{{$user->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                <h6>{{$user->no_telp}}</h6> <small class="text-muted p-t-30 db">Address</small>
                <h6>{{$user->alamat}}</h6>
      
                <br/>
                <a href="{{url('profile-karyawan/edit', auth::user()->id)}}" class="btn btn-primary mt-2">Edit</a>
                
                {{-- <a href="" id="reset_password" data-id="{{$user->id}}" class="btn btn-warning mt-2">Reset Password</a>
                 --}}

                 <a href="{{url('profile-karyawan/edit', auth::user()->id)}}" class="btn btn-primary mt-2">Edit</a>
                
            </div>
        </div>
    </div>
    
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Nav tabs -->
           
    
            
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).on('click','#reset_password', function () {
            var id = $(this).attr('data-id');
            $.get(' {{Url("reset-password")}}', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){
                location.reload();
            });
        });
    </script>
@endsection