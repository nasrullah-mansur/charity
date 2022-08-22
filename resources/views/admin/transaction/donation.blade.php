@extends('admin.layouts.master')
@section('post_header')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('page_title', isset($menu) ? $menu :'Donation')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{isset($page_title) ? $page_title : 'Donation list'}}</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="table">
                <thead>
                <tr>
                    <th>
                        SL
                    </th>
                    <th>
                        Campaign
                    </th>
                    <th>
                        Campaign Title
                    </th>
                    <th>
                        Donar
                    </th>

                    <th>
                       Amount ({{ allSettings('currency') }})
                    </th>
                    <th>
                        Donate time
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
                searchable: false,
                orderable: false,

                ajax: "{{ route('admin.donations') }}",
                order: [5, 'desc'],
                autoWidth: false,
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable:false,
                        searchable:false
                    },
                    {
                        data: 'campaign_image',
                        name: 'campaign_image',
                    },
                    {
                        data: 'campaign_id',
                        name: 'campaign_id',
                    },
                    {
                        data: 'user_id',
                        name: 'user_id',
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                    },

                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                ]
            });

            $(document).on('click', '.delete', function () {

                return confirm("Are You Sure To Delete This!");

            });

        });
    </script>
@endsection
