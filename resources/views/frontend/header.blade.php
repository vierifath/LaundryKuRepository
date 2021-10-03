{{-- Header --}}
        <div class="bg-cover">
        <img src="{{asset('frontend/img/header/header.jpg')}}" alt="" />
    </div>
    <!-- end bg-cover -->
    <!-- begin container -->
    <div class="container">
        <h3><br></h3>
        <h3><br></h3>
        <h3>Lacak Status Laundry Kamu Disini...</h3>
        <div class="input-group m-b-20">
            <input type="text" class="form-control input-lg" id="search_status" placeholder="Contoh : TR0392928" />
            <span class="input-group-btn">
                <button type="submit" class="btn btn-lg" id="search-btn"><i class="fa fa-search"></i></button>
            </span>
        </div>

        <a href="{{url('/harga')}}" target="_blank" class="btn-block btn btn-success btn-lg">Lihat Daftar Harga !</a>
       
        
    
        
        @include('frontend.modal')

        <h3><br></h3>
        <h3><br></h3>
        <h3><br></h3>
    </div>

{{-- End Header --}}