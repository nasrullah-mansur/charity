@extends('front.master')
@section('title',  translation('withdraw'))
@section('content')
<!-- banner-area-start -->
<section class="about-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-banner-content">
          <h2>{{ translation('withdraw') }}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ translation('withdraw') }}</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner-area-end -->
<!-- dashboard-area-end -->
<div class="dashboard-area">
  <div class="container">
    <div class="row">
      @include('front.profile.menu')
      <div class="col-lg-9">
        <div class="my-campaign-right-bar ">
          <div class="my-campaign-table">
            <h2>{{ translation('pending_campaign') }}</h2>
            <div class="table-responsive">
              <table class="table">
                <tr class="heading">
                  <th>{{ translation('image') }}</th>
                  <th>{{ translation('title') }}</th>
                  <th>{{ translation('goal') }}</th>
                  <th>{{ translation('raised') }}</th>
                  <th>{{ translation('service_charge') }}</th>
                  <th>{{  translation('withdraw') }}</th>
                   <th>{{ translation('status') }}</th>
                   <th>{{ translation('action') }}</th>
                </tr>
                @if(isset($withdraws[0]))
                @foreach ($withdraws as $withdraw )
                <tr>
                  <td class="table-img"><img src="{{$withdraw->campaign ? $withdraw->campaign->image : ''}}" alt="images" /></td>
                  <td><a href="{{ $withdraw->campaign ? route('campaign.details',$withdraw->campaign->slug) : 'javascript:void(0)' }}">{{$withdraw->campaign ? (strlen($withdraw->campaign[lang().'_title']) > 10 ? substr($withdraw->campaign[lang().'_title'], 0,10).'..' : $withdraw->campaign[lang().'_title']) : '' }}</a></td>
                  <td>{{ allSettings('currency').$withdraw->goal_amount }}</td>
                  <td>{{ allSettings('currency').$withdraw->raised_amount }}</td>
                  <td>{{ allSettings('currency').$withdraw->total_service_charge }}</td>
                  <td>{{ allSettings('currency').$withdraw->withdrawal_amount }}</td>
                  <td>
                      @if($withdraw->status == WITHDRAW_REQUEST)
                      <p class="text-warning">{{ translation('withdraw_pending') }}</p>
                      @elseif ($withdraw->status == WITHDRAW_SUCCESS)
                      <p class="text-info">{{ translation('withdraw_success') }}</p>
                      @endif
                  </td>
                  <td><a href="{{ route('user.withdraw.details', encrypt($withdraw->id)) }}"><i class="far fa-eye-slash text-info"></i></a></td>
                </tr>
                @endforeach
                @endif

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- dashboard-area-end -->
@endsection
