@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Translation')
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
                                       aria-controls="home" aria-selected="true">{{allSettings('pl') ? allSettings('pl') : PRIMARY_LANGUAGE }}</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile"
                                       aria-selected="false">{{allSettings('sl') ? allSettings('sl') : SECONDARY_LANGUAGE}}</a>
                                </li>
                            </ul>

                        </div>

                        <form role="form" method="POST" action="{{route('admin.translation.signin_signup.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Fillable Section  <span class="text-danger">*</span> <small>(Just Rename)</small>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_first_name"
                                                           id="pl_first_name" value="{{ $tran['pl_first_name'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_last_name"
                                                           id="pl_last_name" value="{{ $tran['pl_last_name'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_email"
                                                           id="pl_email" value="{{ $tran['pl_email'] }}"required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_password"
                                                           id="pl_password" value="{{ $tran['pl_password'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_repeat_password"
                                                           id="pl_repeat_password" value="{{ $tran['pl_repeat_password'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_remember_me"
                                                           id="pl_remember_me" value="{{ $tran['pl_remember_me'] }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_signin"
                                                           id="pl_signin" value="{{ $tran['pl_signin'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_signup"
                                                           id="pl_signup" value="{{ $tran['pl_signup'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_create_account"
                                                           id="pl_create_account" value="{{ $tran['pl_create_account'] }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_have_account"
                                                           id="pl_have_account" value="{{ $tran['pl_have_account'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_havent_account"
                                                           id="pl_havent_account" value="{{ $tran['pl_havent_account'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_forget_password"
                                                           id="pl_forget_password" value="{{ $tran['pl_forget_password'] }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_phone"
                                                           id="pl_phone" value="{{ $tran['pl_phone'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_message"
                                                           id="pl_message" value="{{ $tran['pl_message'] }}"required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_send"
                                                           id="pl_send" value="{{ $tran['pl_send'] }}"required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignUp Condition <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_read_t_c"
                                                           id="pl_read_t_c " value="{{ $tran['pl_read_t_c'] }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignIn SignUp Title<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_welcome_title"
                                                           id="pl_welcome_title " value="{{ $tran['pl_welcome_title'] }}"required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignIn SignUp Subitle<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_welcome_subtitle"
                                                           id="pl_welcome_subtitle" required>{{ $tran['pl_welcome_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Fillable Section  <span class="text-danger">*</span> <small>(Just Rename)</small>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_first_name"
                                                           id="sl_first_name" value="{{ $tran['sl_first_name'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_last_name"
                                                           id="sl_last_name" value="{{ $tran['sl_last_name'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_email"
                                                           id="sl_email" value="{{ $tran['sl_email'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_password"
                                                           id="sl_password" value="{{ $tran['sl_password'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_repeat_password"
                                                           id="sl_repeat_password" value="{{ $tran['sl_repeat_password'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_remember_me"
                                                           id="sl_remember_me" value="{{ $tran['sl_remember_me'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_signin"
                                                           id="sl_signin" value="{{ $tran['sl_signin'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_signup"
                                                           id="sl_signup" value="{{ $tran['sl_signup'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_create_account"
                                                           id="sl_create_account" value="{{ $tran['sl_create_account'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_have_account"
                                                           id="sl_have_account" value="{{ $tran['sl_have_account'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_havent_account"
                                                           id="sl_havent_account" value="{{ $tran['sl_havent_account'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_forget_password"
                                                           id="sl_forget_password" value="{{ $tran['sl_forget_password'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignUp Condition <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_read_t_c"
                                                           id="sl_read_t_c " value="{{ $tran['sl_read_t_c'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_phone"
                                                           id="sl_phone" value="{{ $tran['sl_phone'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_message"
                                                           id="sl_message" value="{{ $tran['sl_message'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_send"
                                                           id="sl_send" value="{{ $tran['sl_send'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignIn SignUp Title<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_welcome_title"
                                                           id="sl_welcome_title " value="{{ $tran['sl_welcome_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">SignIn SignUp Subtitle<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_welcome_subtitle"
                                                           id="sl_welcome_subtitle">{{ $tran['sl_welcome_subtitle'] }}</textarea>
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
                                        <div class="col-3"><label for="exampleInputEmail1">Sign Up Image<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="signup_image">Choose
                                                        file</label>
                                                    <input type="file" id="signup_image" name="signup_image" onchange="putImage(this, 'target1')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('signup_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="target1" src="{{ asset(allSettings('signup_image')) }}" width="120" height="80" />

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Sign In Image<span class="text-danger">*</span>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label class="custom-file-label" for="signin_image">Choose
                                                        file</label>
                                                    <input type="file" id="signin_image" name="signin_image" onchange="putImage(this, 'target12')"/>

                                                </div>
                                            </div>

                                            <p class="text-danger"> {{$errors->first('signin_image')}}</p>

                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="target12" src="{{ asset(allSettings('signin_image')) }}" width="120" height="80" />

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
