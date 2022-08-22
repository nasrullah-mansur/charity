@extends('front.master')
@section('title',  translation('change_password'))
@section('content')
<section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('change_password') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">{{ translation('profile') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('change_password') }}</li>
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
                    <h2>{{ translation('change_password') }}</h2>
                  </div>
                </div>
              </div>
              <div class="password-preference">
                <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('old_password') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="password" name="old_password" placeholder="********">
                      </div>
                    </div>
                  </div>
                  <span class="text-danger">{{$errors->first('old_password')}}</span>

                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('new_password') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="password" name="password"  placeholder="********">
                      </div>
                    </div>
                  </div>
                  <span class="text-danger">{{$errors->first('password')}}</span>

                  <div class="password-form">
                    <div class="row">
                      <div class="col-lg-4">
                        <p>{{ translation('repeat_password') }}</p>
                      </div>
                      <div class="col-lg-8">
                        <input type="password" name="password_confirmation" placeholder="********">
                      </div>
                    </div>
                  </div>
                  <div class="update-btn">
                    <div class="row">
                      <div class="col-lg-4">
                        <button type="submit">{{ translation('update') }}</button>
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
