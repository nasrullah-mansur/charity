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
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'General Settings'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.general.settings.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Company Name
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="company_name"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['company_name']) ? $settings['company_name'] : ''}}">
                                            <span class="text-danger">{{$errors->first('company_name')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Title
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
                                        <div class="col-3"><label for="exampleInputEmail1">About us <small>(in {{ allSettings('pl') }})</small>
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="pl_about_us"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['pl_about_us']) ? $settings['pl_about_us'] : ''}}">
                                            <span class="text-danger">{{$errors->first('pl_about_us')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">About us <small>(in {{ allSettings('sl') }})</small>
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="sl_about_us"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['sl_about_us']) ? $settings['sl_about_us'] : ''}}">
                                            <span class="text-danger">{{$errors->first('sl_about_us')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Favicon
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-6">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="fav_icon">Choose
                                                    file</label>
                                                <input type="file" id="fav_icon" name="fav_icon"
                                                       onchange="putImage(this, 'target2fav_icon')"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">

                                        <img id="target2fav_icon"  @if ($settings['fav_icon']) src="{{ asset(path_image().$settings['fav_icon'])}}" width="120" height="80"  @endif >

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Logo
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-6">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="logo">Choose
                                                    file</label>
                                                <input type="file" id="logo" name="logo"
                                                       onchange="putImage(this, 'target2')"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">

                                        <img id="target2" @if ($settings['logo']) src="{{ asset(path_image().$settings['logo'])}}" width="120" height="80"  @endif >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Logo
                                                <span class="text-danger">*</span> <small>(Footer)</small></label>
                                        </div>
                                        <div class="col-6">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="footer_logo">Choose
                                                    file</label>
                                                <input type="file" id="footer_logo" name="footer_logo"
                                                       onchange="putImage(this, 'target2footer_logo')"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">

                                        <img id="target2footer_logo"  @if ($settings['footer_logo']) src="{{ asset(path_image().$settings['footer_logo'])}}" width="120" height="80"  @endif >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Primary Language
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="pl"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['pl']) ? $settings['pl'] : ''}}">
                                            <span class="text-danger">{{$errors->first('pl')}}</span>
                                        </div>
                                    </div>
                                </div><div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Secondary Language
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="sl"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['sl']) ? $settings['sl'] : ''}}">
                                            <span class="text-danger">{{$errors->first('sl')}}</span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Currency
                                             <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="currency_name"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['currency_name']) ? $settings['currency_name'] : ''}}">
                                            <span class="text-danger">{{$errors->first('currency_name')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Currency Symbol
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="currency"
                                                id="exampleInputEmail1"
                                                value="{{isset($settings['currency']) ? $settings['currency'] : ''}}">
                                            <span class="text-danger">{{$errors->first('currency')}}</span>
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



