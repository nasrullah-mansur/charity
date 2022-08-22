@extends('front.master')
@section('title', translation('profile'))
@section('content')
<!-- banner-area-start -->
<section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('profile') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('profile') }}</li>
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

                <div class="password-preference">
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="table-heading">
                        <h2 class="form-title">{{ translation('profile') }}</h2>
                        <div class="profile-top-image">
                            <img id="profile" src="{{ $user->image ? $user->image : Avatar::create($user->first_name.' '.$user->last_name)->toBase64() }}" alt="images" name="image" />
                            <label for="fileuplode" class="file-uplode-btn"><i class="fas fa-camera"></i></label>
                            <input type="file" id="fileuplode" name="image" onchange="putImage(this, 'profile')">
                        </div>
                    </div>
                    <div class="password-form">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>{{ translation('first_name') }} <span class="text-danger">*</span></p>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="first_name" value="{{ $user->first_name }}">
                        </div>
                      </div>
                    </div>
                    <span class="text-danger">{{$errors->first('first_name')}}</span>

                    <div class="password-form">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>{{ translation('last_name') }} <span class="text-danger">*</span></p>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="last_name" value="{{ $user->last_name }}">
                        </div>
                      </div>
                    </div>
                    <span class="text-danger">{{$errors->first('last_name')}}</span>

                    <div class="password-form">
                        <div class="row">
                          <div class="col-lg-4">
                            <p>{{ translation('email') }} <span class="text-danger">*</span></p>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" name="email" value="{{ $user->email }}">
                          </div>
                        </div>
                      </div>
                      <span class="text-danger">{{$errors->first('email')}}</span>

                    <div class="password-form">
                      <div class="row">
                        <div class="col-lg-4">
                          <p>{{ translation('gender') }} <span class="text-danger">*</span></p>
                        </div>
                        <div class="col-lg-8">
                            <?php
                            $genders = gender();
                        ?>
                        <select name="gender" class="select wide" name="gender">
                            @if ($user->gender)
                            <option value="{{ $user->gender }}" selected>{{ gender($user->gender ) }}</option>
                            @else
                            <option value="{{ null }}">{{ translation('seletc_gender') }}</option>
                            @endif
                            @foreach ($genders as  $key => $value)
                                @if($user->gender == $key)
                                    @continue
                                @endif
                            <option value="{{  $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>

                    </div>
                    <div class="password-form">
                        <div class="row">
                          <div class="col-lg-4">
                            <p>{{ translation('phone') }} <span class="text-danger">*</span></p>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" name="phone" value="{{ $user->phone }}">
                          </div>
                        </div>
                      </div>
                      <span class="text-danger">{{$errors->first('phone')}}</span>
                      <div class="password-form">
                        <div class="row">
                          <div class="col-lg-4">
                            <p>{{ translation('address') }} <span class="text-danger">*</span></p>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" name="address" value="{{ $user->address }}">
                          </div>
                        </div>
                      </div>
                      <span class="text-danger">{{$errors->first('address')}}</span>
                      <div class="password-form">
                        <div class="row">
                          <div class="col-lg-4">
                            <p>{{ translation('country') }} <span class="text-danger">*</span></p>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" name="country" value="{{ $user->country }}">
                          </div>
                        </div>
                      </div>
                      <span class="text-danger">{{$errors->first('country')}}</span>
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
  <!-- dashboard-area-end -->
@endsection

@section('post_script')
<script>

    function showImage(src, target) {
            var fr = new FileReader();
            fr.onload = function () {
                target.src = fr.result;
            }
            fr.readAsDataURL(src.files[0]);
        }

        function putImage(src, target) {
            let imagesrc = src.getAttribute('id')
            var src = document.getElementById(imagesrc);
            var target = document.getElementById(target);
            showImage(src, target);
        }
</script>
@endsection
