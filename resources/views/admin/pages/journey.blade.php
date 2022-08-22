@extends('admin.layouts.master')
@section('page_title', isset($page_title) ? $page_title:'Journey')
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

                        <form role="form" method="POST" action="{{route('admin.page.our.journey.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">{{ translation('first_stage').' Title' }}
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_first_stage_title" value="{{$journey->pl_first_stage_title}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">{{ translation('first_stage').' Subitle' }} <span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_first_stage_subtitle" required>{{$journey->pl_first_stage_subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">{{ translation('second_stage').' Title' }}
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_second_stage_title" value="{{$journey->pl_second_stage_title}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">{{ translation('second_stage').' Subitle' }} <span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_second_stage_subtitle" required>{{$journey->pl_second_stage_subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">{{ translation('third_stage').' Title' }}
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_third_stage_title" value="{{$journey->pl_third_stage_title}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">{{ translation('third_stage').' Subitle' }} <span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_third_stage_subtitle" required>{{$journey->pl_third_stage_subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">{{ translation('fourth_stage').' Title' }}
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_fourth_stage_title" value="{{$journey->pl_fourth_stage_title}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">{{ translation('fourth_stage').' Subitle' }} <span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_fourth_stage_subtitle" required>{{$journey->pl_fourth_stage_subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">{{ translation('fifth_stage').' Title' }}
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_fifth_stage_title" value="{{$journey->pl_fifth_stage_title}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">{{ translation('fifth_stage').' Subitle' }} <span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_fifth_stage_subtitle" required>{{$journey->pl_fifth_stage_subtitle}}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">

                                        <div class="card-body">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3"><label for="offer">{{ translation('first_stage').' Title' }}
                                                           <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text"  class="form-control" name="sl_first_stage_title" value="{{$journey->sl_first_stage_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="offer">{{ translation('first_stage').' Subitle' }} <span class="text-danger">*</span>
                                                     </div>
                                                     <div class="col-9">
                                                        <textarea type="text"  class="form-control" name="sl_first_stage_subtitle">{{$journey->sl_first_stage_subtitle}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3"><label for="offer">{{ translation('second_stage').' Title' }}
                                                           <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text"  class="form-control" name="sl_second_stage_title" value="{{$journey->sl_second_stage_title}}" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="offer">{{ translation('second_stage').' Subitle' }} <span class="text-danger">*</span>
                                                     </div>
                                                     <div class="col-9">
                                                        <textarea type="text"  class="form-control" name="sl_second_stage_subtitle">{{$journey->sl_second_stage_subtitle}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3"><label for="offer">{{ translation('third_stage').' Title' }}
                                                           <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text"  class="form-control" name="slthirdt_stage_title" value="{{$journey->sl_third_stage_title}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="offer">{{ translation('third_stage').' Subitle' }} <span class="text-danger">*</span>
                                                     </div>
                                                     <div class="col-9">
                                                        <textarea type="text"  class="form-control" name="sl_third_stage_subtitle">{{$journey->sl_third_stage_subtitle}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3"><label for="offer">{{ translation('fourth_stage').' Title' }}
                                                           <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text"  class="form-control" name="sl_fourth_stage_title" value="{{$journey->sl_fourth_stage_title}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="offer">{{ translation('fourth_stage').' Subitle' }} <span class="text-danger">*</span>
                                                     </div>
                                                     <div class="col-9">
                                                        <textarea type="text"  class="form-control" name="sl_fourth_stage_subtitle">{{$journey->sl_fourth_stage_subtitle}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3"><label for="offer">{{ translation('fifth_stage').' Title' }}
                                                           <span class="text-danger">*</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text"  class="form-control" name="sl_fifth_stage_title" value="{{$journey->sl_fifth_stage_title}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="offer">{{ translation('fifth_stage').' Subitle' }} <span class="text-danger">*</span>
                                                     </div>
                                                     <div class="col-9">
                                                        <textarea type="text"  class="form-control" name="sl_fifth_stage_subtitle">{{$journey->sl_fifth_stage_subtitle}}</textarea>
                                                    </div>
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
                                        <div class="col-3"><label for="exampleInputEmail1">{{ translation('first_stage').' Image' }}<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="first_stage_image">Choose
                                                        file</label>
                                                    <input type="file" id="first_stage_image" name="first_stage_image" onchange="putImage(this, 'targetfirst_stage_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('first_stage_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetfirst_stage_image" src="{{ $journey->first_stage_image }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">{{ translation('second_stage').' Image' }}<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="second_stage_image">Choose
                                                        file</label>
                                                    <input type="file" id="second_stage_image" name="second_stage_image" onchange="putImage(this, 'targetsecond_stage_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('second_stage_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetsecond_stage_image" src="{{ $journey->second_stage_image }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">{{ translation('third_stage').' Image' }}<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="third_stage_image">Choose
                                                        file</label>
                                                    <input type="file" id="third_stage_image" name="third_stage_image" onchange="putImage(this, 'targetthird_stage_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('third_stage_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetthird_stage_image" src="{{ $journey->third_stage_image }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">{{ translation('fourth_stage').' Image' }}<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="fourth_stage_image">Choose
                                                        file</label>
                                                    <input type="file" id="fourth_stage_image" name="fourth_stage_image" onchange="putImage(this, 'targetfourth_stage_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('fourth_stage_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetfourth_stage_image" src="{{ $journey->fourth_stage_image }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">{{ translation('fifth_stage').' Image' }}<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="fifth_stage_image">Choose
                                                        file</label>
                                                    <input type="file" id="fifth_stage_image" name="fifth_stage_image" onchange="putImage(this, 'targetfifth_stage_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('fifth_stage_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="targetfifth_stage_image" src="{{ $journey->fifth_stage_image }}" width="120" height="80" />

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
