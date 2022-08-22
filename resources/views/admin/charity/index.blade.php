@extends('admin.layouts.master')
@section('page_title', isset($page_title) ? $page_title:'Charity Features')
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
                                       aria-controls="home" aria-selected="true">{{allSettings('pl') ? allSettings('pl') : PRIMARY_LANGUAGE}}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.charity.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 01  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="pl_title_01"
                                                           id="pl_title_01"
                                                           value="{{isset($charity)  ? $charity->pl_title_01 : old('pl_title_01')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title_01')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Subtitle 01 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_subtitle_01"
                                                           id="pl_subtitle_01" >{{isset($charity)  ? $charity->pl_subtitle_01 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('pl_subtitle_01')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 02  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="pl_title_02"
                                                           id="pl_title_02"
                                                           value="{{isset($charity)  ? $charity->pl_title_02 : old('pl_title_02')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title_02')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Subtitle 02 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_subtitle_02"
                                                           id="pl_subtitle_02" >{{isset($charity)  ? $charity->pl_subtitle_02 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('pl_subtitle_02')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="pl_title_03">Title 03  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="pl_title_03"
                                                           id="pl_title_03"
                                                           value="{{isset($charity)  ? $charity->pl_title_03 : old('pl_title_03')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title_03')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="pl_subtitle_03">Subtitle 03 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_subtitle_03"
                                                           id="pl_subtitle_03" >{{isset($charity)  ? $charity->pl_subtitle_03 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('pl_subtitle_03')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 04  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="pl_title_04"
                                                           id="pl_title_04"
                                                           value="{{isset($charity)  ? $charity->pl_title_04 : old('pl_title_04')}}">
                                                    <p class="text-danger"> {{$errors->first('pl_title_04')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Sub Title 04 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_subtitle_04"
                                                           id="pl_subtitle_04" >{{isset($charity)  ? $charity->pl_subtitle_04 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('pl_subtitle_04')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 01  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="sl_title_01"
                                                           id="sl_title_01"
                                                           value="{{isset($charity)  ? $charity->sl_title_01 : old('sl_title_01')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title_01')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Subtitle 01 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_subtitle_01"
                                                           id="sl_subtitle_01" >{{isset($charity)  ? $charity->sl_subtitle_01 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('sl_subtitle_01')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 02  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="sl_title_02"
                                                           id="sl_title_02"
                                                           value="{{isset($charity)  ? $charity->sl_title_02 : old('sl_title_02')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title_02')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Subtitle 02 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_subtitle_02"
                                                           id="sl_subtitle_02" >{{isset($charity)  ? $charity->sl_subtitle_02 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('sl_subtitle_02')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="sl_title_03">Title 03  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="sl_title_03"
                                                           id="sl_title_03"
                                                           value="{{isset($charity)  ? $charity->sl_title_03 : old('sl_title_03')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title_03')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="sl_subtitle_03">Subtitle 03 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_subtitle_03"
                                                           id="sl_subtitle_03" >{{isset($charity)  ? $charity->pl_subtitle_03 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('sl_subtitle_03')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Title 04  <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <input type="text"  class="form-control" name="sl_title_04"
                                                           id="sl_title_04"
                                                           value="{{isset($charity)  ? $charity->sl_title_04 : old('sl_title_04')}}">
                                                    <p class="text-danger"> {{$errors->first('sl_title_04')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Sub Title 04 <span class="text-danger">*</span>                                  </div>
                                                <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_subtitle_04"
                                                           id="sl_subtitle_04" >{{isset($charity)  ? $charity->sl_subtitle_04 : '' }}</textarea>
                                                    <p class="text-danger"> {{$errors->first('sl_subtitle_04')}}</p>
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
                                            <img id="targetoffer1" @if (isset($charity) && $charity->image)
                                                src="{{ $charity->image }}"
                                                width="120" height="80" @endif />

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"> </div>
                                            <div class="col-6">
                                                <input class="form-check-input" type="radio" name="active_status"
                                                    value="{{STATUS_ACTIVE}}" {{ isset($charity) && $charity->active_status ? 'checked' : ''  }} />
                                                <label class="form-check-label">Active</label>
                                                <span class="ml-4">
                                                <input class="form-check-input" type="radio" name="active_status"
                                                    value="{{STATUS_INACTIVE}}"  {{ isset($charity) && $charity->active_status ? '' : 'checked'  }} />
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

