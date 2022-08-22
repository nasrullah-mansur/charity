@extends('front.master')
@section('title', translation('about'))
@section('content')

   <!-- banner-area-start -->
   <section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('about_us_title') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('about') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- about-area-start -->
  @if (isset($info['about']))
  <section class="about-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="about-img">
            <img src="{{ $info['about']->image }}" alt="images" />
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="about-content">
            <h3>{{ $info['about'][lang().'_title'] }}</h3>
            <p>{!! $info['about'][lang().'_about_us'] !!}</p>
         </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- about-area-end -->
  <!-- journey-area-start -->
  @if(isset($info['journey']) && !empty( $info['journey']))
  <section class="journey-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="journey-title">
            <div class="area-title">
              <h2>{{ translation('our_journey_title') }}</h2>
              <p>{{ translation('our_journey_subtitle') }}</p>
            </div>
          </div>
        </div>
        <div class="single-journey">
          <h4>{{ translation('first_stage') }}</h4>
          <span>{{ $info['journey'][lang().'_first_stage_title'] }}</span>
          <p>{{ $info['journey'][lang().'_first_stage_subtitle'] }}</p>
          <div class="journey-img">
            <img src="{{ $info['journey']->first_stage_image }}" alt="images" />
          </div>
        </div>
        <div class="single-journey">
          <h4>{{ translation('second_stage') }}</h4>
          <span>{{ $info['journey'][lang().'_second_stage_title'] }}</span>
          <p>{{ $info['journey'][lang().'_second_stage_subtitle'] }}</p>
          <div class="journey-img">
            <img src="{{ $info['journey']->second_stage_image }}" alt="images" />
          </div>
        </div>
        <div class="single-journey">
          <h4>{{ translation('third_stage') }}</h4>
          <span>{{ $info['journey'][lang().'_third_stage_title'] }}</span>
          <p>{{ $info['journey'][lang().'_third_stage_subtitle'] }}</p>
          <div class="journey-img">
            <img src="{{ $info['journey']->third_stage_image }}" alt="images" />
          </div>
        </div>
        <div class="single-journey">
          <h4>{{ translation('fourth_stage') }}</h4>
          <span>{{ $info['journey'][lang().'_fourth_stage_title'] }}</span>
          <p>{{ $info['journey'][lang().'_fourth_stage_subtitle'] }}</p>
          <div class="journey-img">
            <img src="{{ $info['journey']->fourth_stage_image }}" alt="images" />
          </div>
        </div>
        <div class="single-journey">
          <h4>{{ translation('fifth_stage') }}</h4>
          <span>{{ $info['journey'][lang().'_fifth_stage_title'] }}</span>
          <p>{{ $info['journey'][lang().'_fifth_stage_subtitle'] }}</p>
          <div class="journey-img">
            <img src="{{ $info['journey']->fifth_stage_image }}" alt="images" />
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- journey-area-end -->
  <!-- team-area-start -->
  @if (isset($info['team']))
  <div class="team-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="team-title">
            <div class="area-title">
                <h2>{{ translation('our_leader_title') }}</h2>
                <p>{{ translation('our_leader_subtitle') }}</p>
             </div>
          </div>
        </div>
      </div>
      <div class="team-active">
          @foreach ($info['team'] as $team )
        <div class="single-team">
          <div class="team-img-1">
            <div class="main-img">
              <img src="{{ $team->image }}" alt="images" />
            </div>
          </div>
          <div class="team-details">
            <h4>{{ $team->name }}</h4>
            <span>{{  $team[lang().'_designation'] }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endif
  <!-- team-area-end -->
  <div class="big-bg">
    <!-- blog-area-start -->
    @if(isset($info['news'][0]))
    <div class="blog-area">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-title">
                  <div class="area-title">
                      <h2>{{ translation('news_title') }}</h2>
                      <p>{{ translation('news_subtitle') }}</p>
                  </div>
                </div>
              </div>
              @foreach ($info['news'] as $first_news)

              <div class="col-lg-6 col-md-12">
                <div class="single-blog">
                  <div class="blog-img">
                    <a href="{{route('blog.details',$first_news->slug) }}"><img src="{{ $first_news->primary_image }}" alt="images" /></a>
                  </div>
                  <div class="blog-details">
                    <div class="blog-meta">
                      <p>{{  isset($first_news->category) ? Carbon\Carbon::parse($first_news->created_at)->format('d M Y').' - '.$first_news->category[lang().'_name'] : '' }}</p>
                     @if (isset($first_news->author))
                       <span><i class="fas fa-user"></i>{{  $first_news->author->name }}</span>
                      @endif
                    </div>
                    <a href="{{route('blog.details',$first_news->slug) }}"><h4>{{  Str::words($first_news[lang().'_title'],7, '...') }}</h4></a>
                    <p>{!! Str::words($first_news[lang().'_description_pre_image'],20, '...') !!}</p>
                    <div class="read-btn">
                      <a href="{{route('blog.details',$first_news->slug) }}">{{ translation('read_more') }}<i class="fas fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              @if ($loop->iteration <= 1)
                  @break
              @endif
              @endforeach

              <div class="col-lg-6 col-md-12">
                <div class="row">
                  @foreach ($info['news'] as $sec_news)

                      @if ($loop->iteration == 1)
                          @continue
                      @endif

                  <div class="col-lg-12 col-md-6">
                      <div class="single-blog-2 m-0">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="blog-img">
                                      <img src="{{ $sec_news->primary_image }}" alt="images" />
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="blog-details">
                                      <div class="blog-meta">
                                          <p>{{  isset($sec_news->category) ? Carbon\Carbon::parse($sec_news->created_at)->format('d M Y').' - '.$sec_news->category[lang().'_name'] : '' }}</p>

                                          @if (isset($sec_news->author))
                                            <span><i class="fas fa-user"></i>{{  $sec_news->author->name }}</span>
                                           @endif
                                      </div>
                                      <a href="{{route('blog.details',$first_news->slug) }}"><h4>{{ Str::words($sec_news[lang().'_title'],5, '...')  }}</h4></a>
                                      <p>{!! Str::words($sec_news[lang().'_description_pre_image'],10, '...') !!}</p>
                                      <div class="read-btn">
                                        <a href="{{route('blog.details',$first_news->slug) }}">{{ translation('read_more') }}<i class="fas fa-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  @endforeach
                </div>
              </div>

            </div>
          </div>
    </div>
    @endif
    <!-- blog-area-end -->
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
  </div>
@endsection
