@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'News')
@section ('post_header')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">{{PRIMARY_LANGUAGE}}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.blog.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Category
                                                      <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <select class="form-control" name="category_id">
                                                        <option value="{{ null }}">Select Category</option>
                                                        @if (isset($categories[0]))
                                                        @foreach ($categories as $category )

                                                        <option value="{{ $category->id }}">{{ $category->pl_name }}</option>

                                                        @endforeach

                                                        @endif
                                                    </select>
                                                    <p class="text-danger"> {{$errors->first('category_id')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Tag
                                                      <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <select class="select2bs4 form-control" multiple="multiple"  name="tag[]">
                                                        {{-- <option value="{{ null }}" selected>Select Tag</option> --}}
                                                        @if (isset($tags[0]))
                                                        @foreach ($tags as $tag )

                                                        <option value="{{ $tag->id }}">{{ $tag->pl_name }}</option>

                                                        @endforeach

                                                        @endif
                                                    </select>
                                                    <p class="text-danger"> {{$errors->first('tag')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="exampleInputEmail1">Primary Image<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="primary_image">Choose
                                                                file</label>
                                                            <input type="file" id="primary_image" name="primary_image" onchange="putImage(this, 'target_primary_image')"/>

                                                        </div>
                                                    </div>

                                                    <p class="text-danger"> {{$errors->first('primary_image')}}</p>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <img id="target_primary_image" width="120" height="80" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title
                                                      <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_title"
                                                           id="pl_title"
                                                           value="{{isset($slider)  ? $slider->pl_title : old('pl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Description   <span class="text-danger">*</span>
                                                    <small>First Part</small>
                                                </div>
                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                          name="pl_description_pre_image"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('pl_description_pre_image')}}</textarea>

                                                    <p class="text-danger"> {{$errors->first('pl_description_pre_image')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="exampleInputEmail1">Secondary Image<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="secondary_image">Choose
                                                                file</label>
                                                            <input type="file" id="secondary_image" name="secondary_image" onchange="putImage(this, 'target_secondary_image')"/>

                                                        </div>
                                                    </div>

                                                    <p class="text-danger"> {{$errors->first('secondary_image')}}</p>

                                                </div>
                                                <div class="form-group col-md-2">
                                                    <img id="target_secondary_image" width="120" height="80" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Description<span class="text-danger">*</span>
                                                    <small>(Last Part)</small>
                                                </div>
                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                          name="pl_description_post_image"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('pl_description_post_image')}}</textarea>

                                                    <p class="text-danger"> {{$errors->first('pl_description_post_image')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title
                                                      <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_title"
                                                           id="sl_title"
                                                           value="{{isset($slider)  ? $slider->sl_title : old('sl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Description   <span class="text-danger">*</span>
                                                    <small>First Part</small>
                                                </div>
                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                          name="sl_description_pre_image"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('sl_description_pre_image')}}</textarea>

                                                    <p class="text-danger"> {{$errors->first('sl_description_pre_image')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Description<span class="text-danger">*</span>
                                                    <small>(Last Part)</small>
                                                </div>
                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                          name="sl_description_post_image"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('sl_description_post_image')}}</textarea>

                                                    <p class="text-danger"> {{$errors->first('sl_description_post_image')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="offer">Active status<span class="text-danger">*</span>
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

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="offer">Popular news<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="popular"
                                                value="{{STATUS_ACTIVE}}" checked="">
                                            <label class="form-check-label">Yes</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="popular"
                                                value="{{STATUS_INACTIVE}}">
                                            <label class="form-check-label">No</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>

                        <!-- form end -->
                        <!-- /.card -->


                    </div>

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>

@endsection


@section('post_script')

<script src="{{asset('assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>

        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });


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

