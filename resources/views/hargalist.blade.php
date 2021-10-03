@extends('layouts.error')
@section('title','List Harga')
@section('content')


<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"> Daftar Harga Laundry-Ku
            </h1>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table display table-bordered table-striped mt-2">
                    <thead>
                        <tr>
                            <th>No.</th>

                            <th>Jenis</th>
                            <th>Berat (/kg)</th>
                            <th>Harga (Rupiah)</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                        <?php $no=1; ?>
                        @foreach($harga as $h)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $h->jenis }}</td>
                            <td>{{ $h->kg/1000 }}</td>
                            <td>{{ $h->harga }}</td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <a href="{{url('/')}}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
    });
});


</script>
@endsection