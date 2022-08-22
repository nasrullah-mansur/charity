@extends('front.master')
@section('title', translation('signup'))
@section('content')
  <!-- banner-area-start -->
  <section class="contact-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-banner-content">
            <h2>{{ translation('signup') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ translation('pages') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('signup') }}</li>
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
              <img src="{{ asset(allsettings('signup_image')) }}" alt="images" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="main-form">
              <div class="form-title">
                <h3>{{ translation('welcome_title') }}</h3>
                <p>{{ translation('welcome_subtitle') }}</p>
              </div>
              <form action="{{ route('sign.up.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="single-form mb-30">
                  <p>{{ translation('first_name') }}</p>
                  <input type="text" name="first_name" value="{{ old('first_name') }}"/>
                  <span class="text-danger">{{$errors->first('first_name') }}</span>

                </div>
                <div class="single-form mb-30">
                    <p>{{ translation('last_name') }}</p>
                    <input type="text"  name="last_name" value="{{ old('last_name') }}"/>
                  <span class="text-danger">{{$errors->first('last_name') }}</span>

                  </div>
                <div class="single-form mb-30">
                  <p>{{ translation('email') }}</p>
                  <input type="email"  name="email" value="{{ old('email') }}"/>
                  <span class="text-danger">{{ $errors->first('email') }}</span>

                </div>
                <div class="single-form mb-30">
                  <p>{{ translation('password') }}</p>
                  <input type="password"  name="password" value="{{ old('password') }}"/>
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
                <div class="single-form mb-10">
                  <p>{{ translation('repeat_password') }}</p>
                  <input type="password"  name="password_confirmation" value="{{ old('password_confirmation') }}"/>
                </div>
                <div class="cheakbox-area">
                  <input type="checkbox" name="agree" />
                  <p>{{ translation('read_t_c') }}</p> <br>
                  <span class="text-danger">{{ $errors->first('agree') }}</span>
                </div>
                <input type="hidden" name="donar" value="{{ $donar }}">
                <div class="creat-btn">
                  <button type="submit">{{ translation('create_account') }}</button>
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
