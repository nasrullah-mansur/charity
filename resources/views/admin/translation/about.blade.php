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

                        <form role="form" method="POST" action="{{route('admin.translation.about.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_about_us_title"
                                                           id="pl_about_us_title" value="{{ $tran['pl_about_us_title'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our Journey section title <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_our_journey_title"
                                                           id="pl_our_journey_title" value="{{ $tran['pl_our_journey_title'] }}">
                                                </div>
                                            </div>
                                        </div>  <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our Journey section subtitle <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_our_journey_subtitle"
                                                           id="pl_our_journey_subtitle">{{ $tran['pl_our_journey_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Journey Section stages <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_first_stage"
                                                           id="pl_first_stage" value="{{ $tran['pl_first_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_second_stage"
                                                           id="pl_second_stage" value="{{ $tran['pl_second_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_third_stage"
                                                           id="pl_third_stage" value="{{ $tran['pl_third_stage'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_fourth_stage"
                                                           id="pl_fourth_stage" value="{{ $tran['pl_fourth_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_fifth_stage"
                                                           id="pl_fifth_stage" value="{{ $tran['pl_fifth_stage'] }}">
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
                                                    <label for="offer">Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_about_us_title"
                                                           id="sl_about_us_title" value="{{ $tran['sl_about_us_title'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our Journey section title <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_our_journey_title"
                                                           id="sl_our_journey_title" value="{{ $tran['sl_our_journey_title'] }}">
                                                </div>
                                            </div>
                                        </div>  <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our Journey section subtitle <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_our_journey_subtitle"
                                                           id="sl_our_journey_subtitle">{{ $tran['sl_our_journey_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Journey Section stages <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_first_stage"
                                                           id="sl_first_stage" value="{{ $tran['sl_first_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_second_stage"
                                                           id="sl_second_stage" value="{{ $tran['sl_second_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_third_stage"
                                                           id="sl_third_stage" value="{{ $tran['sl_third_stage'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_fourth_stage"
                                                           id="sl_fourth_stage" value="{{ $tran['sl_fourth_stage'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_fifth_stage"
                                                           id="sl_fifth_stage" value="{{ $tran['sl_fifth_stage'] }}">
                                                </div>
                                            </div>
                                        </div>
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

