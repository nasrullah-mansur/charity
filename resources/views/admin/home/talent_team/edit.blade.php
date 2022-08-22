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
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Team Member'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.talent.team.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Name
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="name"
                                                id="exampleInputEmail1"
                                                value="{{isset($team) ? $team->name : ''}}">
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Designation
                                                <span class="text-danger">*</span> <small>(in {{ allSettings('pl') }})</small></label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="pl_designation"
                                                id="exampleInputEmail1"
                                                value="{{isset($team) ? $team->pl_designation : '' }}">
                                            <span class="text-danger">{{$errors->first('pl_designation')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Designation
                                                <span class="text-danger">*</span> <small>(in {{ allSettings('sl') }})</small></label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="sl_designation"
                                                id="exampleInputEmail1"
                                                value="{{isset($team) ? $team->sl_designation : '' }}">
                                            <span class="text-danger">{{$errors->first('sl_designation')}}</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Image
                                                <span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="col-6">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">Choose
                                                    file</label>
                                                <input type="file" id="image" name="image"
                                                       onchange="putImage(this, 'target2')"/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">

                                        <img id="target2" @if (isset($team))  src="{{ $team->image}}" width="120" height="80"  @endif >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                value="{{STATUS_ACTIVE}}" {{ isset($team) && $team->active_status ? 'checked' : '' }}>
                                            <label class="form-check-label">Active</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="active_status"
                                                   value="{{STATUS_INACTIVE}}" {{ isset($team) && $team->active_status ? '' : 'checked' }}>
                                            <label class="form-check-label">InActive</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                                <input type="hidden" name="edit_id" value="{{ isset($team) ? $team->id : null}}">
                                <div class=" card-footer text-left">
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



