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

                    <form role="form" method="POST" action="{{route('admin.translation.profile.update')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                   <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Profile Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_profile" value="{{ $tran['pl_profile'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_gender" value="{{ $tran['pl_gender'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_address"value="{{ $tran['pl_address'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_country" value="{{ $tran['pl_country'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_member_since" value="{{ $tran['pl_member_since'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_status"value="{{ $tran['pl_status'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_contributed" value="{{ $tran['pl_contributed'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_deactive_account" value="{{ $tran['pl_deactive_account'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_change_password"value="{{ $tran['pl_change_password'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">My Campaign <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_running_campaign" value="{{ $tran['pl_running_campaign'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_pending_campaign" value="{{ $tran['pl_pending_campaign'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_backed_campaign"value="{{ $tran['pl_backed_campaign'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_campaign_method" value="{{ $tran['pl_campaign_method'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_after_goal_achieve" value="{{ $tran['pl_after_goal_achieve'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_after_end_date"value="{{ $tran['pl_after_end_date'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_start_campaign" value="{{ $tran['pl_start_campaign'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_active_campaign" value="{{ $tran['pl_active_campaign'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_campaign_info" value="{{ $tran['pl_campaign_info'] }}" required>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">My Campaign Header<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_title" value="{{ $tran['pl_title'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_details" value="{{ $tran['pl_details'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_goal"value="{{ $tran['pl_goal'] }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_raised" value="{{ $tran['pl_raised'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_document" value="{{ $tran['pl_document'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_image" value="{{ $tran['pl_image'] }}" required>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_start_date" value="{{ $tran['pl_start_date'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_end_date" value="{{ $tran['pl_end_date'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_video" value="{{ $tran['pl_video'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_edit_view" value="{{ $tran['pl_edit_view'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_featured_image" value="{{ $tran['pl_featured_image'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_submit" value="{{ $tran['pl_submit'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Withdraw <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_service_charge" value="{{ $tran['pl_service_charge'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_total_service_charge" value="{{ $tran['pl_total_service_charge'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_withdraw_method"value="{{ $tran['pl_withdraw_method'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_paypal_account" value="{{ $tran['pl_paypal_account'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_stripe_account" value="{{ $tran['pl_stripe_account'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_select"value="{{ $tran['pl_select'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Change password <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_old_password" value="{{ $tran['pl_old_password'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_new_password" value="{{ $tran['pl_new_password'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_update"value="{{ $tran['pl_update'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Status <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_active" value="{{ $tran['pl_active'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_deactive" value="{{ $tran['pl_deactive'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_suspend"value="{{ $tran['pl_suspend'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="offer">Gender <span class="text-danger">*</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="pl_male" value="{{ $tran['pl_male'] }}" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="pl_female" value="{{ $tran['pl_female'] }}" required>
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="pl_other"value="{{ $tran['pl_other'] }}" required>
                                            </div>
                                        </div>
                                   </div>
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Profile Header <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_profile" value="{{ $tran['sl_profile'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_gender" value="{{ $tran['sl_gender'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_address"value="{{ $tran['sl_address'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_country" value="{{ $tran['sl_country'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_member_since" value="{{ $tran['sl_member_since'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_status"value="{{ $tran['sl_status'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_contributed" value="{{ $tran['sl_contributed'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_deactive_account" value="{{ $tran['sl_deactive_account'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_change_password"value="{{ $tran['sl_change_password'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">My Campaign <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_running_campaign" value="{{ $tran['sl_running_campaign'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_pending_campaign" value="{{ $tran['sl_pending_campaign'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_backed_campaign"value="{{ $tran['sl_backed_campaign'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_campaign_method" value="{{ $tran['sl_campaign_method'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_after_goal_achieve" value="{{ $tran['sl_after_goal_achieve'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_after_end_date"value="{{ $tran['sl_after_end_date'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_start_campaign" value="{{ $tran['sl_start_campaign'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_active_campaign" value="{{ $tran['sl_active_campaign'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_campaign_info" value="{{ $tran['sl_campaign_info'] }}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">My Campaign Header<span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_title" value="{{ $tran['sl_title'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_details" value="{{ $tran['sl_details'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_goal"value="{{ $tran['sl_goal'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_raised" value="{{ $tran['sl_raised'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_document" value="{{ $tran['sl_document'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_image" value="{{ $tran['sl_image'] }}">
                                                </div>
                                                {{-- <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_campaign_method" value="{{ $tran['sl_campaign_method'] }}">
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_start_date" value="{{ $tran['sl_start_date'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_end_date" value="{{ $tran['sl_end_date'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_video" value="{{ $tran['sl_video'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>

                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_edit_view" value="{{ $tran['sl_edit_view'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_featured_image" value="{{ $tran['sl_featured_image'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_submit" value="{{ $tran['sl_submit'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Withdraw <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_service_charge" value="{{ $tran['sl_service_charge'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_total_service_charge" value="{{ $tran['sl_total_service_charge'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_withdraw_method"value="{{ $tran['sl_withdraw_method'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_paypal_account" value="{{ $tran['sl_paypal_account'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_stripe_account" value="{{ $tran['sl_stripe_account'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_select"value="{{ $tran['sl_select'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Change password <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_old_password" value="{{ $tran['sl_old_password'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_new_password" value="{{ $tran['sl_new_password'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_update"value="{{ $tran['sl_update'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="offer">Status <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_active" value="{{ $tran['sl_active'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_deactive" value="{{ $tran['sl_deactive'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_suspend"value="{{ $tran['sl_suspend'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="offer">Gender <span class="text-danger">*</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="sl_male" value="{{ $tran['sl_male'] }}">
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="sl_female" value="{{ $tran['sl_female'] }}">
                                            </div>
                                            <div class="col-3">
                                                <input type="text"  class="form-control" name="sl_other"value="{{ $tran['sl_other'] }}" >
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
