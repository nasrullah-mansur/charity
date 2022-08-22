@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Category')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Tag'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.tag.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Name
                                                <span class="text-danger">*</span><small>(in {{ primaryLang() }})</small> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="pl_name"
                                                id="exampleInputEmail1"
                                                value="{{old('sl_name')}}">
                                            <span class="text-danger">{{$errors->first('pl_name')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Name
                                                <span class="text-danger">*</span><small>(in {{ secondaryLang() }})</small> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="sl_name"
                                                id="exampleInputEmail1"
                                                value="{{ old('sl_name')}}">
                                            <span class="text-danger">{{$errors->first('sl_name')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Active status
                                            <span class="text-danger">*</span></label>
                                    </div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_ACTIVE}}" checked="">
                                            <label class="form-check-label">Active</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                   value="{{STATUS_INACTIVE}}">
                                            <label class="form-check-label">inActive</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                                <div class=" card-footer text-left">
                                    <button type="submit" class="btn btn-info">Submit</button>
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



@section('post_script')

    <script>
        function showImage(src, target) {
            var fr = new FileReader();
            fr.onload = function () {
                target.src = fr.result;
            }
            fr.readAsDataURL(src.files[0]);
        }

        function putImage(src, target) {
            let imagesrc = src.getAttribute('id')
            var src = document.getElementById(imagesrc);
            var target = document.getElementById(target);
            target.style.width = '120px';
            target.style.height = '80px';
            showImage(src, target);
        }
    </script>

@endsection



