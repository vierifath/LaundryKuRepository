@extends('layouts.backend')
@section('title','Admin - Feedback')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Daftar Ulasan Customer
            </h4>
            <div class="table-responsive m-t-0">
                <table id="myTable" class="table display table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Invoice</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Ulasan</th>
                        </tr>
                    </thead>
                    <tbody id="refresh_body">
                        <?php $no=1; ?>
                        @foreach($feedback as $f)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{ $f->NoInvoice }}</td>
                            <td>{{ $f->Nama }}</td>
                            <td>{{ $f->Rating }}</td>
                            <td>{{ $f->Ulasan }}</td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
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