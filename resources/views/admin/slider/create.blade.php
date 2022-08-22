@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'slider')
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
                                       aria-controls="home" aria-selected="true">{{allSettings('sl') ? allSettings('sl') : PRIMARY_LANGUAGE}}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.slider.store')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title   <span class="text-danger">*</span>                                  </div>
                                                <div class="col-6">
                                                    <input type="text"  class="form-control" name="pl_title"
                                                           id="pl_title"
                                                           value="{{isset($slider)  ? $slider->pl_title : old('pl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Sub Title  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-6">
                                                    <input type="text"  class="form-control" name="pl_subtitle"
                                                           id="pl_subtitle"
                                                           value="{{isset($slider)  ? $slider->pl_subtitle : old('pl_subtitle')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_subtitle')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title                                    </div>
                                                <div class="col-6">
                                                    <input type="text"  class="form-control" name="sl_title"
                                                           id="sl_title"
                                                           value="{{isset($slider)  ? $slider->sl_title : old('sl_title')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Sub Title                                    </div>
                                                <div class="col-6">
                                                    <input type="text"  class="form-control" name="sl_subtitle"
                                                           id="sl_subtitle"
                                                           value="{{isset($slider)  ? $slider->sl_subtitle : old('sl_subtitle')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_subtitle')}}</p>
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
                                        <div class="col-3"><label for="exampleInputEmail1">Background Banner<span class="text-danger">*</span>
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
                                            <img id="targetoffer1" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="offer">Campaign  </div>
                                        <div class="col-6">
                                            <select type="text"  class="form-control" name="campaign_id">
                                            <option value="{{ null }}">Select Campaign</option>
                                            @if (isset($campaigns[0]))
                                            @foreach ($campaigns as $campaign )
                                            <option value="{{  $campaign->id }}">{{ strlen($campaign->pl_title) > 32 ?  substr($campaign->pl_title, 0, 32).'..' : $campaign->pl_title}}</option>
                                            @endforeach
                                            @endif
                                            </select>
                                               <p class="text-danger"> {{$errors->first('campaign_id')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_ACTIVE}}" checked="">
                                            <label class="form-check-label">Active</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_INACTIVE}}">
                                            <label class="form-check-label">InActive</label>
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

