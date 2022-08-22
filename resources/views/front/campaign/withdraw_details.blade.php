@extends('front.master')
@section('title',  translation('withdraw'))
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
                    <h2>{{  translation('withdraw') }}</h2>
                  </div>
                </div>
              </div>
              <div class="password-preference">
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('goal') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="goal_amount" value="{{ allSettings('currency').' '.$withdraw->goal_amount }}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('raised') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="raised_amount" value="{{ allSettings('currency').' '.$withdraw->raised_amount }}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('service_charge') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="service_charge" value="{{$withdraw->is_percentage_service_charge ? allSettings('currency').' '.$withdraw->service_charge.'%' : allSettings('currency').' '.$withdraw->service_charge  }}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('total_service_charge') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="total_service_charge" value="{{$withdraw->total_service_charge}}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{  translation('withdraw') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="withdrawal_amount" value="{{$withdraw->withdrawal_amount}}" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('withdraw_method') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="stripe_account" value="{{$withdraw->withdraw_method}}" readonly>
                        <span class="text-danger">{{ $errors->first('stripe_account') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ $withdraw->is_paypal_withdraw ? 'Paypal Account' : 'Stripe Account' }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="stripe_account" value="{{ $withdraw->is_paypal_withdraw ? $withdraw->paypal_account : $withdraw->stripe_account }}" readonly>
                        <span class="text-danger">{{ $errors->first('stripe_account') }}</span>
                      </div>
                    </div>
                  </div>
                  @if($withdraw->stripe_card_number)
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('card_number') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" name="stripe_card_number" value="{{$withdraw->stripe_card_number}}" readonly>
                        <span class="text-danger">{{ $errors->first('stripe_card_number') }}</span>
                      </div>
                    </div>
                  </div>
                  @endif
                  <div class="update-btn">
                    <div class="row">
                      <div class="col-lg-4">
                          <div class="btn-style-1">
                              <a href="{{ route('user.withdraw') }}">{{  translation('back') }}</a>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
