@extends('admin.layouts.master')
@section('page_title', isset($page_title) ? $page_title:'')
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

                        <form role="form" method="POST" action="{{route('admin.page.help.area.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Help Area Tittle
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="pl_title" value="{{$help->pl_title}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">First section icon
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="first_section_icon" value="{{$help->first_section_icon}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">First Section Counter No.
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" step="any"  class="form-control" name="first_section_counter" value="{{$help->first_section_counter}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">First Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_first_section_title" required>{{$help->pl_first_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Second section icon
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="second_section_icon" value="{{$help->second_section_icon}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Second Section Counter No.
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" step="any"  class="form-control" name="second_section_counter" value="{{$help->second_section_counter}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Second Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_second_section_title" required>{{$help->pl_second_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Third section icon
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="third_section_icon" value="{{$help->third_section_icon}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Third Section Counter No.
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" step="any"  class="form-control" name="third_section_counter" value="{{$help->third_section_counter}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Third Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_third_section_title" required>{{$help->pl_third_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Fourth section icon
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="fourth_section_icon" value="{{$help->fourth_section_icon}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Fourth Section Counter No.
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="number" step="any"  class="form-control" name="fourth_section_counter" value="{{$help->fourth_section_counter}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Fourth Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="pl_fourth_section_title" required>{{$help->pl_fourth_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                     </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"><label for="offer">Help Area Tittle
                                                       <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-8">
                                                    <input type="text" class="form-control" name="sl_title" value="{{$help->sl_title}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">First Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_first_section_title">{{$help->sl_first_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Second Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_second_section_title">{{$help->sl_second_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Third Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_third_section_title">{{$help->sl_third_section_title}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Fourth Section Subtitle<span class="text-danger">*</span>
                                                 </div>
                                                 <div class="col-8">
                                                    <textarea type="text"  class="form-control" name="sl_fourth_section_title">{{$help->sl_fourth_section_title}}</textarea>
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
                                        <div class="col-3"><label for="exampleInputEmail1">Background Image<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="background_image">Choose
                                                        file</label>
                                                    <input type="file" id="background_image" name="background_image" onchange="putImage(this, 'target_background_image')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('background_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="target_background_image" src="{{ $help->background_image }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="offer">Active Status<span class="text-danger">*</span>
                                         </div>
                                         <div class="col-8">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_ACTIVE}}" {{ isset($help) && $help->active_status ? 'checked' : '' }}>
                                            <label class="form-check-label">Active</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                   value="{{STATUS_INACTIVE}}" {{ isset($help) && $help->active_status ? '' : 'checked' }}>
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
