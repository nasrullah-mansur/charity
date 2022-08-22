@extends('front.master')
@section('title', translation('withdraw'))
@section('content')
<section class="about-banner-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="about-banner-content">
          <h2>{{ translation('withdraw') }}</h2>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">{{ translation('dashboard') }}</a></li>
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
        <div class="password-right-bar">
          <div class="password-table">
            <div class="table-heading">
              <div class="row">
                <div class="col-lg-12">
                  <h2>{{ translation('withdraw') }}</h2>
                </div>
              </div>
            </div>
            <div class="password-preference">
              <form action="{{ route('user.paypal.withdraw.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('goal') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="goal_amount" value="{{ allSettings('currency').' '.$campaign->goal_amount }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('raised') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="raised_amount" value="{{ allSettings('currency').' '.$campaign->raised_amount }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('service_charge') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="service_charge" value="{{$campaign->is_percentage_service_charge ? allSettings('currency').' '.$campaign->service_charge.'%' : allSettings('currency').' '.$campaign->service_charge  }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('total_service_charge') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="total_service_charge" value="{{allSettings('currency').' '.number_format(totalServiceCharge($campaign->id),2)}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('withdraw') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="withdrawal_amount" value="{{allSettings('currency').' '.number_format(withdrawalAmount($campaign->id), 2)}}" readonly>
                    </div>
                  </div>
                </div>
                <div class="password-form">
                  <div class="row">
                    <div class="col-lg-4">
                      <p>{{ translation('paypal_account') }}</p>
                    </div>
                    <div class="col-lg-8">
                      <input type="text" name="paypal_account">
                      <span class="text-danger">{{ $errors->first('paypal_account') }}</span>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="value" value="{{ $campaign->withdrawal_amount }}">
                <input type="hidden" name="campaign_id" value="{{ $campaign->campaign_id }}">
                <div class="update-btn">
                  <div class="row">
                    <div class="col-lg-4">
                      <button type="submit">{{ translation('withdraw') }}</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection