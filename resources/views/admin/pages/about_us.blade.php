@extends('admin.layouts.master')
@section('page_title', isset($page_title) ? $page_title:'About')
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
                                       aria-controls="home" aria-selected="true">{{ allSettings('pl') ? allSettings('pl') : PRIMARY_LANGUAGE }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.page.about_us.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title   <span class="text-danger">*</span>                                  </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_title"
                                                           id="pl_title"
                                                           value="{{isset($about)  ? $about->pl_title : old('pl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">About Us <span class="text-danger">*</span>
                                                 </div>

                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here" name="pl_about_us"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $about->pl_about_us }}</textarea>
                                                    <span class="text-danger">{{$errors->first('pl_about_us')}}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title   <span class="text-danger">*</span>                                  </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_title"
                                                           id="sl_title"
                                                           value="{{isset($about)  ? $about->sl_title : old('sl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">About Us <span class="text-danger">*</span>
                                                 </div>

                                                <div class="col-9">
                                                    <textarea class="textarea" placeholder="Place some text here" name="sl_about_us"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $about->sl_about_us }}</textarea>
                                                    <span class="text-danger">{{$errors->first('sl_about_us')}}</span>
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
                                        <div class="col-3"><label for="exampleInputEmail1">Image<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="image">Choose
                                                        file</label>
                                                    <input type="file" id="image" name="image" onchange="putImage(this, 'targetoffer1')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetoffer1" src="{{ $about->image }}" width="120" height="80" />

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

