@extends('admin.layouts.master')

@section('page_title',$menu ? $menu :'Settings')

@section('post_header')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Coupon'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.contact.us.settings.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Email
                                                <span
                                                    class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="email"
                                                   id="exampleInputEmail1"
                                                   placeholder="Email"
                                                   value="{{isset($contact)  ? $contact->email : old('email')}}">
                                            <p class="text-danger"> {{$errors->first('email')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Phone
                                                <span
                                                    class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="phone"
                                                   id="exampleInputEmail1"
                                                   placeholder="Phone"
                                                   value="{{isset($contact)  ? $contact->phone : old('phone')}}">
                                            <p class="text-danger"> {{$errors->first('phone')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Address <small>({{ allSettings('pl') }})</small>
                                                <span
                                                    class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="pl_address"
                                                   id="exampleInputEmail1"
                                                   placeholder="Address"
                                                   value="{{isset($contact)  ? $contact->pl_address : old('pl_address')}}">
                                            <p class="text-danger"> {{$errors->first('pl_address')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Address <small>({{ allSettings('sl') }})</small>
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="sl_address"
                                                   id="exampleInputEmail1"
                                                   placeholder="Address"
                                                   value="{{isset($contact)  ? $contact->sl_address : old('sl_address')}}">
                                            <p class="text-danger"> {{$errors->first('sl_address')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-info float-left">Submit</button>
                                </div>


                            </div>
                        </form>
                        <!-- /.card -->


                    </div>

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
@endsection
