@extends('front.master')
@section('title', 'Donate')
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
                            <li class="breadcrumb-item active" aria-current="page">{{ translation('blog') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-area-end -->
<div class="donate-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ translation('make_donate') }}</div>
                        <div class="card-body">
                            <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{ translation('how_much') }} ?</label>
                                            <input type="number" step="any"  id="payment_amount" class="form-control" name="value" value="{{ session('donate_amount') ? session('donate_amount') : '' }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>{{ translation('currency') }}</label>
                                            <input type="text" class="form-control" name="currency" value="{{ allSettings('currency_name') }}" readonly>
                                        </div>
                                        <div class="col-12">
                                            <label class="text-center payment-platform-title">
                                                {{ translation('select_doanate_method') }}
                                            </label>
                                            <div class="payment-button">
                                                <label data-toggle="collapse">
                                                    <input type="hidden" name="payment_platform" value="{{ PAYMENT_PAYPAL }}" readonly>
                                                    <button type="submit"><img class="img-thumbnail" src="{{ asset('uploaded_file/images/payment/paypal.png') }}"></button>
                                                </label>
                                           </div>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('donate.post') }}" method="POST" id="paymentForm">
                            @csrf
                            <div class="payment-button">
                                <input type="hidden" name="payment_platform" value="{{ PAYMENT_STRIPE }}">
                                <input type="hidden" name="donate_amount" id="strip_payment_value" value="{{ session('donate_amount') ? session('donate_amount') : '' }}">
                                <button type="submit"><img class="img-thumbnail" src="{{ asset('uploaded_file/images/payment/stripe.png') }}"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


  <!-- partner-area-start -->
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
<!-- partner-area-end -->

@endsection

@section('post_script')
<script>

    $('#payment_amount').on('keyup', function(){

        var amount = $('#payment_amount').val();
            console.log(amount);
        $('#strip_payment_value').val(amount);
    })



    $('#payment_amount').on('change', function(){
        var amount = $('#payment_amount').val();
            console.log(amount);
        $('#strip_payment_value').val(amount);
    })
</script>
@endsection
