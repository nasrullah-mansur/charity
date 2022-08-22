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

                        <form role="form" method="POST" action="{{route('admin.translation.home.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                     <div class="card-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Menu Section  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_home"
                                                           id="pl_home" value="{{ $tran['pl_home'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_about"
                                                           id="pl_about" value="{{ $tran['pl_about'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_pages"
                                                           id="pl_pages" value="{{ $tran['pl_pages'] }}" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_team"
                                                           id="pl_team" value="{{ $tran['pl_team'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_blog"
                                                           id="pl_blog" value="{{ $tran['pl_blog'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_contact"
                                                           id="pl_contact" value="{{ $tran['pl_contact'] }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Pages section  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_signup"
                                                           id="pl_signup" value="{{ $tran['pl_signup'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_signin"
                                                           id="pl_signin" value="{{ $tran['pl_signin'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_campaign"
                                                           id="pl_campaign" value="{{ $tran['pl_campaign'] }}" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_dashboard"
                                                           id="pl_dashboard" value="{{ $tran['pl_dashboard'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_my_campaign"
                                                           id="pl_my_campaign" value="{{ $tran['pl_my_campaign'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_payment"
                                                           id="pl_payment" value="{{ $tran['pl_payment'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Campaign section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_campaign_title"
                                                           id="pl_campaign_title" value="{{ $tran['pl_campaign_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Campaign section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_campaign_subtitle"
                                                           id="pl_campaign_subtitle"  required>{{ $tran['pl_campaign_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our leades section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_our_leader_title"
                                                           id="pl_our_leader_title" value="{{ $tran['pl_our_leader_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our leaders section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_our_leader_subtitle"
                                                           id="pl_our_leader_subtitle"  required>{{ $tran['pl_our_leader_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Feedback section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_feedback_title"
                                                           id="pl_feedback_title" value="{{ $tran['pl_feedback_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Feedback section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_feedback_subtitle"
                                                           id="pl_feedback_subtitle"  required>{{ $tran['pl_feedback_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">News section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_news_title"
                                                           id="pl_news_title" value="{{ $tran['pl_news_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">News section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_news_subtitle"
                                                           id="pl_news_subtitle"  required>{{ $tran['pl_news_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Partner section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_partner_title"
                                                           id="pl_partner_title" value="{{ $tran['pl_partner_title'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Partner section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="pl_partner_subtitle"
                                                           id="pl_news_subtitle"  required>{{ $tran['pl_news_subtitle'] }}</textarea>
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
                                                    <label for="offer">Menu Section  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_home"
                                                           id="sl_title" value="{{ $tran['sl_home'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_about"
                                                           id="sl_about" value="{{ $tran['sl_about'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_pages"
                                                           id="sl_pages" value="{{ $tran['sl_pages'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_team"
                                                           id="sl_team" value="{{ $tran['sl_team'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_blog"
                                                           id="sl_blog" value="{{ $tran['sl_blog'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_contact"
                                                           id="sl_contact" value="{{ $tran['sl_contact'] }}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Pages section  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_signup"
                                                           id="sl_signup" value="{{ $tran['sl_signup'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_signin"
                                                           id="sl_signin" value="{{ $tran['sl_signin'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_campaign"
                                                           id="sl_campaign" value="{{ $tran['sl_campaign'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"></div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_dashboard"
                                                           id="sl_dashboard" value="{{ $tran['sl_dashboard'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_my_campaign"
                                                           id="sl_my_campaign" value="{{ $tran['sl_my_campaign'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_payment"
                                                           id="sl_payment" value="{{ $tran['sl_payment'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Campaign section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_campaign_title"
                                                           id="sl_campaign_title" value="{{ $tran['sl_campaign_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Campaign section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_campaign_subtitle"
                                                           id="sl_campaign_subtitle">{{ $tran['sl_campaign_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our leades section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_our_leader_title"
                                                           id="sl_our_leader_title" value="{{ $tran['sl_our_leader_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Our leaders section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_our_leader_subtitle"
                                                           id="sl_our_leader_subtitle">{{ $tran['sl_our_leader_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Feedback section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_feedback_title"
                                                           id="sl_feedback_title" value="{{ $tran['sl_feedback_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Feedback section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_feedback_subtitle"
                                                           id="sl_feedback_subtitle">{{ $tran['sl_feedback_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">News section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_news_title"
                                                           id="sl_news_title" value="{{ $tran['sl_news_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">News section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_news_subtitle"
                                                           id="sl_news_subtitle">{{ $tran['sl_news_subtitle'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Partner section title  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_partner_title"
                                                           id="sl_partner_title" value="{{ $tran['sl_partner_title'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Partner section subtitle  <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-9">
                                                    <textarea type="text"  class="form-control" name="sl_partner_subtitle"
                                                           id="sl_news_subtitle">{{ $tran['sl_news_subtitle'] }}</textarea>
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

