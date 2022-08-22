@extends('front.master')
@section('title', translation('forget_password'))
@section('content')
  <!-- banner-area-start -->
  <section class="contact-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-banner-content">
            <h2>{{ translation('forget_password') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ translation('pages') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('forget_password') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- sign-up-area-start -->
  <section class="sign-up-form">
    <div class="container">
      <div class="form-inner">
        <div class="row">
          <div class="col-lg-6">
            <div class="sign-up-img">
              <img src="{{ asset(allsettings('signin_image')) }}" alt="images" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="main-form">
              <div class="form-title">
                <h3>{{ translation('welcome_title') }}</h3>
                <p>{{ translation('welcome_subtitle') }}</p>
              </div>
              <form action="{{ route('forget.password.check') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="single-form mb-30">
                    <p>{{ translation('email') }}</p>
                    <input type="email"  name="email" value="{{ old('email') }}"/>
                    <span class="text-danger">{{ $errors->first('email') }}</span>

                </div>
                <div class="creat-btn">
                  <button type="submit">{{ translation('submit') }}</button>
                </div>
                <div class="last-text mb-3">
                  <p>{{ translation('havent_account') }} ? <a href="{{ route('sign.up') }}">{{ translation('signup') }}</a></p>
                </div>
                <div class="last-text">
                    <p>{{ translation('have_account') }} ? <a href="{{ route('sign.in') }}">{{ translation('signin') }}</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- sign-up-area-end -->
@endsection
