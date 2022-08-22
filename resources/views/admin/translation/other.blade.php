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
                                                    <label for="offer">Donation <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_donate" value="{{ $tran['pl_donate'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_donation" value="{{ $tran['pl_donation'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_make_donate"  value="{{ $tran['pl_make_donate'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_card_number" value="{{ $tran['pl_card_number'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_name" value="{{ $tran['pl_name'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_amount"  value="{{ $tran['pl_amount'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_exp_date" value="{{ $tran['pl_exp_date'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_donars" value="{{ $tran['pl_donars'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_copy"  value="{{ $tran['pl_copy'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_how_much" value="{{ $tran['pl_how_much'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_select_doanate_method" value="{{ $tran['pl_select_doanate_method'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_currency"  value="{{ $tran['pl_currency'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Button
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_action" value="{{ $tran['pl_action'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_upload_document" value="{{ $tran['pl_upload_document'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_upload_campaign_mage"  value="{{ $tran['pl_upload_campaign_mage'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_category" value="{{ $tran['pl_category'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_select_category" value="{{ $tran['pl_select_category'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_seletc_gender"  value="{{ $tran['pl_seletc_gender'] }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_logout" value="{{ $tran['pl_logout'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_subscribe_now" value="{{ $tran['pl_subscribe_now'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_send_message"  value="{{ $tran['pl_send_message'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Others
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_campaign_details" value="{{ $tran['pl_campaign_details'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_back" value="{{ $tran['pl_back'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_donate_now"  value="{{ $tran['pl_donate_now'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_become_doner" value="{{ $tran['pl_become_doner'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_view_more" value="{{ $tran['pl_view_more'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_read_more"  value="{{ $tran['pl_read_more'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_quick_link" value="{{ $tran['pl_quick_link'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_contact_info" value="{{ $tran['pl_contact_info'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_right_reserved"  value="{{ $tran['pl_right_reserved'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_total_collection" value="{{ $tran['pl_total_collection'] }}" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="pl_collection_this_week" value="{{ $tran['pl_collection_this_week'] }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Required Field
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="pl_required_field" value="{{ $tran['pl_required_field'] }}" required>
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
                                                    <label for="offer">Donation <span class="text-danger">*</span>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_donate" value="{{ $tran['sl_donate'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_donation" value="{{ $tran['sl_donation'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_make_donate"  value="{{ $tran['sl_make_donate'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_card_number" value="{{ $tran['sl_card_number'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_name" value="{{ $tran['sl_name'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_amount"  value="{{ $tran['sl_amount'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_exp_date" value="{{ $tran['sl_exp_date'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_donars" value="{{ $tran['sl_donars'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_copy"  value="{{ $tran['sl_copy'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_how_much" value="{{ $tran['sl_how_much'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_select_doanate_method" value="{{ $tran['sl_select_doanate_method'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_currency"  value="{{ $tran['sl_currency'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Button
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_action" value="{{ $tran['sl_action'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_upload_document" value="{{ $tran['sl_upload_document'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_upload_campaign_mage"  value="{{ $tran['sl_upload_campaign_mage'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_category" value="{{ $tran['sl_category'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_select_category" value="{{ $tran['sl_select_category'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_seletc_gender"  value="{{ $tran['sl_seletc_gender'] }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_logout" value="{{ $tran['sl_logout'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_subscribe_now" value="{{ $tran['sl_subscribe_now'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_send_message"  value="{{ $tran['sl_send_message'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Others
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_campaign_details" value="{{ $tran['sl_campaign_details'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_back" value="{{ $tran['sl_back'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_donate_now"  value="{{ $tran['sl_donate_now'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_become_doner" value="{{ $tran['sl_become_doner'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_view_more" value="{{ $tran['sl_view_more'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_read_more"  value="{{ $tran['sl_read_more'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_quick_link" value="{{ $tran['sl_quick_link'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_contact_info" value="{{ $tran['sl_contact_info'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_right_reserved"  value="{{ $tran['sl_right_reserved'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_total_collection" value="{{ $tran['sl_total_collection'] }}">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text"  class="form-control" name="sl_collection_this_week" value="{{ $tran['sl_collection_this_week'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-3"> Required Field
                                                </div>
                                                <div class="col-9">
                                                    <input type="text"  class="form-control" name="sl_required_field" value="{{ $tran['sl_required_field'] }}">
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
