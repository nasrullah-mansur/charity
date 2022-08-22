@extends('admin.layouts.master')
@section('post_header')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('page_title', isset($menu) ? $menu :'Transactions')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{isset($menu) ? $menu : 'Transactions'}}</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="table">
                <thead>
                <tr>
                    <th>
                        SL
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Amount
                    </th>

                    <th>
                        Payment Method
                    </th>
                    <th>
                        Payment Type
                    </th>
                    <th>
                        Transaction ID
                    </th>

                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>

            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.modal -->
    <!-- /.End Package Assign Modal -->
@endsection

@section('post_script')

    <!-- DataTables -->
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#table').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                responsive: true,
                searchable:false,
                orderable: false,

                ajax: "{{route('admin.donatios')}}",
                order: [1, 'desc'],
                autoWidth: false,
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable:false,
                        searchable:false
                    },

                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                    {
                        data: 'user_id',
                        name: 'user_id'
                    },

                    {
                        data: 'amount',
                        name: 'amount',
                    },

                    {
                        data: 'payment_method',
                        name: 'payment_method',
                    },

                    {
                        data: 'payment_method_type',
                        name: 'payment_method_type  ',
                    },
                    {
                        data: 'transaction_id',
                        name: 'transaction_id'
                    },
                ],
            });

        });
    </script>
@endsection
