@extends('front.master')
@section('title', translation('create_camp') )
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
            <h2>{{ translation('start_campaign') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">{{ translation('profile') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"> {{ translation('start_campaign') }}</li>
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
            <form action="{{ route('user.campaing.store') }}" method="post" enctype="multipart/form-data">
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
                      <option value="">{{ translation('select_category') }}</option>
                      @if(isset($categories[0]))
                        @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category[lang().'_name'] }}</option>
                        @endforeach
                      @endif
                    </select>
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
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
                    <input type="text" name="pl_title" placeholder="Title" />
                    <span class="text-danger">{{ $errors->first('pl_title') }}</span>
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('title') }} <small>({{ allSettings('sl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <input type="text" name="sl_title" placeholder="Title" />
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('details') }} <span class="text-danger">*</span> <small>({{ allSettings('pl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <textarea class="textarea" placeholder="Place some text here"
                    name="pl_details"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('en_description_previous_quotation')}}</textarea>
                    <span class="text-danger">{{ $errors->first('pl_details') }}</span>
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('details') }}  <small>({{ allSettings('sl') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <textarea class="textarea" placeholder="Place some text here"
                    name="sl_details"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('en_description_previous_quotation')}}</textarea>
                    </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('goal') }}  <span class="text-danger">*</span><small>({{ allSettings('currency_name') }})</small></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <input type="number" name="goal_amount" placeholder="Amount" />
                    <span class="text-danger">{{ $errors->first('goal_amount') }}</span>
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('start_date') }} </p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <input type="date" name="start_date"  placeholder="Date" />
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('end_date') }} <span class="text-danger">*</span></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <input type="date" name="end_date"  placeholder="Date" />
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
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
                      <input type="radio" id="male" name="end_with_goal_achieve" value="{{ true }}" />
                      <label for="male"> {{ translation('after_goal_achieve') }}</label>
                    </div>
                    <div class="single-cheak">
                      <input type="radio" id="female" name="end_with_goal_achieve" value="{{ false }}" checked/>
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
                    <input type="url" name="video_url" placeholder="Place video URL" />
                  </div>
                </div>
              </div>
              <div class="single-catagory-2">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('address') }}  <span class="text-danger">*</span></p>
                  </div>
                  <div class="col-lg-8 col-md-12">
                    <input type="text" name="address" placeholder="Address" />
                    <span class="text-danger">{{ $errors->first('address') }}</span>
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
                      <input type="file" class="custom-file-input"  id="fileuplode1" name="image" onchange="putImage(this, 'upload_campaign_mage')"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    @if($errors->first('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @else
                        <span>{{ translation('upload_campaign_mage') }}</span>
                    @endif
                    </div>

                  </div>
                  <div class="col-lg-2 col-md-4">
                    <img id="upload_campaign_mage"/>
                </div>
                </div>
              </div>
              <div class="catagory-file">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <p>{{ translation('document') }} </p>
                  </div>
                  <div class="col-lg-6 col-md-8">
                    <div class="main-input">
                      <input type="file"  class="custom-file-input" id="fileuplode2" name="document" onchange="putImage(this, 'document_image')"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <span>{{ translation('upload_document') }}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-4">
                    <img id="document_image"/>
                    </div>
                </div>
              </div>
              <div class="submit-button">
                <div class="row">
                  <div class="col-lg-6">
                    <button type="submit">{{ translation('submit')  }}  </button>
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
    });


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
