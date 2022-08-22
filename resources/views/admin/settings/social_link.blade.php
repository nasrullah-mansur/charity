@extends('admin.layouts.master')

@section('page_title',$menu ? $menu :'settings')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Social link'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.social.link.settings.update')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Facebook</label> </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="facebook"
                                                   id="exampleInputEmail1"
                                                   placeholder="Email"
                                                   value="{{isset($settings)  ? $settings['facebook'] : old('facebook')}}">
                                            <p class="text-danger"> {{$errors->first('facebook')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Twitter</label> </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="twitter"
                                                   id="exampleInputEmail1"
                                                   placeholder="twitter"
                                                   value="{{isset($settings)  ? $settings['twitter'] : old('twitter')}}">
                                            <p class="text-danger"> {{$errors->first('twitter')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Linkedin</label> </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="linkedin"
                                                   id="exampleInputEmail1"
                                                   placeholder="linkedin"
                                                   value="{{isset($settings)  ? $settings['linkedin'] : old('linkedin')}}">
                                            <p class="text-danger"> {{$errors->first('linkedin')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Skype</label> </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="skype"
                                                   id="exampleInputEmail1"
                                                   placeholder="skype"
                                                   value="{{isset($settings)  ? $settings['skype'] : old('skype')}}">
                                            <p class="text-danger"> {{$errors->first('skype')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-info float-left">Submit</button>
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
