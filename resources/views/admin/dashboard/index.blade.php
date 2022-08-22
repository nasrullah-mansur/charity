@extends('admin.layouts.master')
@section('page_title', isset($pageSettings['page_title'])? $pageSettings['page_title']:'Dashboard')
@section('task', isset($pageSettings['task'])? $pageSettings['task']: '' )
@section('content')

    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
            <a style="color: #444" href="{{ route('admin.donations') }}">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-wave"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Donation</span>
                        <span class="info-box-number">
                  {{isset($info['donation']) ? number_format($info['donation'],2).allSettings('currency') : 0.00 }}
                  <small></small>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            </a>

            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
            <a style="color: #444" href="{{ route('admin.donations') }}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cart-arrow-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Donation <small>(This month)</small></span>
                        <span class="info-box-number">
                            {{isset($info['donation_this_month']) ?  number_format($info['donation_this_month'],2).allSettings('currency') : 0.00 }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
            <a style="color: #444" href="{{ route('admin.campaign.approval') }}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fab fa-shopify"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Approval Campaing</span>
                        <span class="info-box-number">
                            {{isset($info['approval_campaign']) ? $info['approval_campaign'] : 0}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
                <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6 col-md-3">
            <a style="color: #444" href="{{ route('admin.campaign.running') }}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-white bg-dark elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Running Campaign</span>
                        <span class="info-box-number">
                            {{ isset($info['total_active_campaign']) ? $info['total_active_campaign'] : 0}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
                <!-- /.info-box -->
            </div>
        <!-- /.row -->

        <div class="card w-100">
            <div class="card-header border-transparent">
                <h3 class="card-title">Latest Campaign</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 ">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                        <tr>
                            <th> Sl </th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($info['latest_campaign'][0] ))
                            @foreach($info['latest_campaign']  as $campaign)
                                <tr>
                                    <th>
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>
                                        <a href="{{route('admin.campaign.show', $campaign->slug)}}"><img src="{{ $campaign->image }}" width="80" height="60px" alt=""></a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.campaign.show', $campaign->slug)}}">{{ Str::words($campaign->pl_title, 10)}}</a>
                                    </td>
                                    <td>{{ $campaign->address }}</td>

                                    <td>
                                        @if($campaign->status == CAMPAIGN_PENDIGN)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($campaign->status == CAMPAIGN_RUNNING)
                                            <span class="badge badge-info">Running</span>

                                        @elseif($campaign->status == CAMPAIGN_COMPLETED)
                                            <span class="badge badge-success">Completed</span>
                                        @endif

                                    </td>
                                    <td>{{\Carbon\Carbon::parse($campaign->created_at)->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a href="{{route('admin.campaign.approval')}}" class="btn btn-sm btn-secondary float-right">Under Approval Campaign</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div><!--/. container-fluid -->
@endsection
