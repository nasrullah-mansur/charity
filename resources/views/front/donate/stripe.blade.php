@extends('front.master')
@section('title',translation('donation'))
@section('content')
<!-- banner-area-start -->
<section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('blog_page_title') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('donation') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
<div class="stripe-payment-area">
    <div class="container">
        <div class="stripe-form">
            <form action="{{route('stripe.payment.store')}}" method="POST"
                      class="multisteps-form__form" style="height: 596px;">
                    @csrf

                    <div class="multisteps-form__panel js-active" data-animation="scaleIn">
                        <div class="multisteps-form__content">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="check-out-form">
                                        <h3 class="checkout-title">{{ translation('donation') }}</h3>
                                        <div class="form-group">
                                            <label for="cardhumber">{{ translation('card_number') }}</label>
                                            <input type="text" class="form-control" id="cardhumber"
                                                   name="card_no" placeholder="4242424242424242">
                                            <span class="text-danger">{{$errors->first('card_no')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="authorname">{{ translation('name') }}</label>
                                            <input type="text" class="form-control" id="authorname"
                                                   name="holderName" placeholder="James Anderson">
                                            <span class="text-danger">{{$errors->first('holderName')}}</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="authorname">{{ translation('amount') }}</label>
                                                    <input type="text" class="form-control" id="authorname"
                                                           name="donate_amount" value="{{ session('donate_amount') }}" required>
                                                    <span class="text-danger">{{$errors->first('donate_amount')}}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="authorname">{{ translation('currency') }}</label>
                                                    <input type="text" class="form-control" name="currency_name" id="authorname"
                                                           name="currency_name" value="{{ allSettings('currency_name') }}" readonly>
                                                    <span class="text-danger">{{$errors->first('currency_name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>{{ translation('exp_date') }}</label>
                                                            <select class="form-control " name="exp_month">
                                                                <option value="1">01</option>
                                                                <option value="2">02</option>
                                                                <option value="3">03</option>
                                                                <option value="4">04</option>
                                                                <option value="5">05</option>
                                                                <option value="6">06</option>
                                                                <option value="7">07</option>
                                                                <option value="8">08</option>
                                                                <option value="9">09</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                            <span class="text-danger">{{$errors->first('exp_month')}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Expired Year</label>
                                                            <select class="form-control " name="exp_year" >
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                            </select>
                                                            <span class="text-danger">{{$errors->first('exp_year')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>CCV</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="ccv" name="ccv" placeholder="055"/>
                                                </div>
                                                <span class="text-danger">{{$errors->first('ccv')}}</span>
                                            </div>
                                        </div>
                                        <button class="btn" type="submit" >{{ translation('donate_now') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="check-out-form text-center">
                                        <img src="{{asset('uploaded_file/images/payment/card-image.png')}}"
                                             alt="card iamge">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@if(isset ($info['partners'][0]))
<div class="about-partner-area">
    <div class="container">
    <div class="row partner-bg">
        <div class="col-lg-12">
        <div class="partner-title">
            <div class="area-title">
                <h2>{{ translation('partner_title') }}</h2>
                <p>{{ translation('partner_subtitle') }}</p>
            </div>
        </div>
        </div>
        <div class="col-lg-12">
            <div class="partner-active">
                @foreach ( $info['partners'] as $partner )
                <div class="single-partner">
                 <a href="{{ $partner->link ? $partner->link: 'javascript::void(0)' }}">
                      <img src="{{ $partner->image }}" alt="images" />
                  </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
@endif
@endsection
