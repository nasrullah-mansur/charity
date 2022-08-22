@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Settings')
@section('task', isset($task) ? $task: 'update' )
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'SEO Settings'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.seo.settings.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Meta Title
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" class="form-control" name="title"
                                               id="exampleInputEmail1"
                                               value="{{isset($settings['title']) ? $settings['title'] : ''}}">
                                        <span class="text-danger">{{$errors->first('title')}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Meta Description
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" class="form-control" name="meta_description"
                                               id="exampleInputEmail1"
                                               value="{{isset($settings['meta_description']) ? $settings['meta_description']: ''}}">
                                        <span class="text-danger">{{$errors->first('meta_description')}}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Meta Keywords
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                        <textarea class="textarea" placeholder="Place some text here" name="meta_keywords"
                                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{isset($settings['meta_keywords']) ? $settings['meta_keywords'] : ''}}</textarea>
                                        <span class="text-danger">{{$errors->first('meta_keywords')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Meta Author
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                        <input type="text" class="form-control" name="meta_author"
                                               id="exampleInputEmail1"
                                               value="{{isset($settings['meta_author']) ? $settings['meta_author'] : ''}}">
                                        <span class="text-danger">{{$errors->first('meta_author')}}</span>
                                    </div>
                                </div>
                            </div>

                                <div class=" card-footer text-center">
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



