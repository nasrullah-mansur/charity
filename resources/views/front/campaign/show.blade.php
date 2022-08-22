@extends('front.master')
@section('title', translation('campaign_info') )
@section('post_head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section('content')

  <!-- banner-area-start -->
  <section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('my_campaign') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{ translation('campaign_info') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- campaign-area-end -->
  <div class="main-campaign-area">
    <div class="container">
      <div class="row">
        @include('front.profile.menu')
        <div class="col-lg-9 col-md-12">
          <div class="right-sidebar">
            <div class="sidebar-title">
              <h3>{{ translation('campaign_info') }}</h3>
            </div>
       <form action="{{ route('user.campaign.update') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="catagory-select">
              <div class="row">
                <div class="col-lg-4 col-md-12">
                  <div class="catagory-text">
                    <p>{{ translation('category') }}</p>
                  </div>
                </div>
                <div class="col-lg-8 col-md-12">
                  <div class="select-bar">
                    <select class="select wide" name="category_id">
                        @if( isset($campaign->category))
                      <option value="{{ $campaign->category_id }}">{{ $campaign->category[lang().'_name'] }}</option>
                      @else
                      <option value="{{ null }}">{{ translation('category_not_exists') }}</option>
                      @endif

                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('title') }}  <span class="text-danger">*</span> <small>({{ allSettings('pl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ $campaign->pl_title }}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('title') }} <small>({{ allSettings('sl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ $campaign->sl_title }}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('details') }} <span class="text-danger">*</span> <small>({{ allSettings('pl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                   {!! $campaign->pl_details !!}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('details') }}  <small>({{ allSettings('sl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {!! $campaign->sl_details !!}
                </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('goal') }}  <span class="text-danger">*</span></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ $campaign->goal_amount }}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('start_date') }} </p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ Carbon\Carbon::parse($campaign->start_date)->format('d M, Y') }}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <p>{{ translation('end_date') }} <span class="text-danger">*</span></p>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        {{ Carbon\Carbon::parse($campaign->end_date)->format('d M, Y') }}
                    </div>
                </div>
            </div>
            <div class="campaign-method">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('campaign_method') }} </p>
                  </div>
                  <div class="col-lg-8">
                    <div class="single-cheak">
                      <input type="radio" id="male" name="end_with_goal_achieve" value="{{ true }}" {{ $campaign->end_with_goal_achieve ? 'checked' : '' }}/>
                      <label for="male">{{ translation('after_goal_achieve') }}</label>
                    </div>
                    <div class="single-cheak">
                      <input type="radio" id="female" name="end_with_goal_achieve" value="{{ false }}" {{ $campaign->end_with_goal_achieve ? '' : 'checked' }}/>
                      <label for="female">{{ translation('after_end_date') }}</label>
                    </div>
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('video') }} </p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ $campaign->video_url }}
                  </div>
                </div>
            </div>
            <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('address') }}  <span class="text-danger">*</span></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    {{ $campaign->address }}
                  </div>
                </div>
            </div>
            <div class="catagory-file">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('featured_image') }} </p>
                  </div>
                  <div class="col-lg-6 col-md-8">
                    <div class="main-input">
                      <img src="{{ $campaign->image }}" alt="images">
                    </div>
                  </div>
                </div>
            </div>
            <div class="catagory-file">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('document') }}</p>
                  </div>
                  <div class="col-lg-6 col-md-8">
                    <div class="main-input">
                      <img src="{{ $campaign->document }}" alt="images">
                    </div>
                  </div>
                </div>
            </div>
            <div class="submit-button">
                <div class="row">
                  <div class="col-lg-6">
                    <a type="button" href="{{ route('user.campaigns') }}">{{ translation('back') }}</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- campaign-area-end -->
@endsection
@section('post_script')
<script src="{{asset('assets/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })


     // show selected image
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
            target.style.width = '120px';
            target.style.height = '80px';
            showImage(src, target);
        }

</script>
@endsection
