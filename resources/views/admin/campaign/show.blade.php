@extends('admin.layouts.master')
@section('page_title', isset($menu) ? $menu:'Campaign')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($page_title) ? $page_title:'Under Approval'}}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="{{route('admin.campaign.approved')}}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Title <small>(in {{ allSettings('pl') }})</small>
                                        </label>
                                        </div>
                                        <div class="col-8">
                                           {{ $campaign->pl_title }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Title <small>(in {{ allSettings('sl') }})</small></label>
                                        </div>
                                        <div class="col-8">  {{ $campaign->sl_title }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Details <small>(in {{ allSettings('pl') }})</small>
                                        </label>
                                        </div>
                                        <div class="col-8">
                                           {!! $campaign->pl_details !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Details <small>(in {{ allSettings('sl') }})</small></label>
                                        </div>
                                        <div class="col-8">  {!! $campaign->sl_details !!}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Goal Amount</label>
                                        </div>
                                        <div class="col-8">
                                           {{ allSettings('currency').$campaign->goal_amount }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Raised Amount</label>
                                        </div>
                                        <div class="col-8">
                                           {{ allSettings('currency').' '.$campaign->raised_amount }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Video</label>
                                        </div>
                                        <div class="col-8">
                                           {{ $campaign->video_url }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Address</label>
                                        </div>
                                        <div class="col-8">
                                           {{ $campaign->address }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Start Date</label>
                                        </div>
                                        <div class="col-8">
                                           {{ Carbon\Carbon::parse($campaign->start_date)->format('d M, Y')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">End Date</label>
                                        </div>
                                        <div class="col-8">
                                           {{ Carbon\Carbon::parse($campaign->end_date)->format('d M, Y')}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Image</label>
                                        </div>
                                        <div class="col-8">
                                          <img src="{{ $campaign->image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3"><label for="exampleInputEmail1">Document</label>
                                        </div>
                                        <div class="col-8">
                                          <img src="{{ $campaign->document }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Campaign End Method</div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="end_with_goal_achieve"
                                                value="{{STATUS_ACTIVE}}" {{  $campaign->end_with_goal_achieve ? 'checked' : '' }}>
                                            <label class="form-check-label">End after goal acheive</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="end_with_goal_achieve"
                                                   value="{{STATUS_INACTIVE}}" {{  $campaign->end_with_goal_achieve ? '' : 'checked' }}>
                                            <label class="form-check-label">End after end date</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3">Approved</div>
                                        <div class="col-8">
                                            <input class="form-check-input" type="radio" name="is_approved"
                                                value="{{STATUS_ACTIVE}}" {{  $campaign->is_approved ? 'checked' : '' }}>
                                            <label class="form-check-label">Yes</label>
                                            <span class="ml-4">
                                            <input class="form-check-input" type="radio" name="is_approved"
                                                   value="{{STATUS_INACTIVE}}" {{  $campaign->is_approved ? '' : 'checked' }}>
                                            <label class="form-check-label">No</label>
                                            </span>
                                         </div>
                                    </div>
                                </div>

                                <input type="hidden" name="edit_id" value="{{ $campaign->id }}">
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
