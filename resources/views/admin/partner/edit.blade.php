@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Home')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Partner'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.partner.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Site url
                                        </label>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="link"
                                                id="exampleInputEmail1"
                                                value="{{$partner->link}}">
                                            <span class="text-danger">{{$errors->first('link')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Image
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-6">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">Choose
                                                    file</label>
                                                <input type="file" id="image" name="image"
                                                       onchange="putImage(this, 'target2')"/>
                                            </div>
                                        </div>
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    </div>
                                    <div class="form-group col-md-2">

                                        <img id="target2" @if (isset($partner))  src="{{ $partner->image}}" width="120" height="80"  @endif >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Active Status
                                            <span class="text-danger">*</span> </label>
                                    </div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_ACTIVE}}" checked="">
                                            <label class="form-check-label">Active</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                   value="{{STATUS_INACTIVE}}">
                                            <label class="form-check-label">Inactive</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_id" value="{{ $partner->id }}">
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



