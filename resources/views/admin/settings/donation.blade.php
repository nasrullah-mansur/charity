@extends('admin.layouts.master')

@section('page_title',$menu ? $menu :'settings')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Donation'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.donation.settings.update')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Serevice Charge</label> </div>
                                        <div class="col-9">
                                            <input type="number" step="any" class="form-control" name="service_charge"
                                                   id="exampleInputEmail1"
                                                   value="{{$serviceCharge->value}}" required>
                                            <p class="text-danger"> {{$errors->first('service_charge')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Service charge Method
                                            <span class="text-danger">*</span> </label>
                                    </div>
                                        <div class="col-9">
                                            <input class="form-check-input" type="radio" name="is_percentage"
                                                value="{{STATUS_ACTIVE}}" {{ $serviceCharge->is_percentage ? 'checked' : '' }}>
                                            <label class="form-check-label">Percentage</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="is_percentage"
                                                   value="{{STATUS_INACTIVE}}"  {{ $serviceCharge->is_percentage ? '' : 'checked' }}>
                                            <label class="form-check-label">Amount</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Donation slots</label> </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value1"
                                                   id="exampleInputEmail1" value="{{$slots->value1}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value2"
                                                   id="exampleInputEmail1" value="{{$slots->value2}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value3"
                                                   id="exampleInputEmail1" value="{{$slots->value3}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value4"
                                                   id="exampleInputEmail1" value="{{$slots->value4}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value5"
                                                   id="exampleInputEmail1" value="{{$slots->value5}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value6"
                                                   id="exampleInputEmail1" value="{{$slots->value6}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value7"
                                                   id="exampleInputEmail1" value="{{$slots->value7}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value8"
                                                   id="exampleInputEmail1" value="{{$slots->value8}}" required>
                                        </div>
                                        <div class="col-3">
                                            <input type="number" step="any" class="form-control" name="value9"
                                                   id="exampleInputEmail1" value="{{$slots->value9}}" required>
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
