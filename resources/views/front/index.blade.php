@extends('front.master')
@section('title' , allSettings('title') ? allSettings('title') : 'Home')
@section('content')
  <!-- banner-area-start -->
  @if (isset($info['sliders'][0]))
  <section class="banner-area">
    <div class="banner-active">

        @foreach ( $info['sliders'] as $slider )
      <div class="single-banner" style="background-image: url({{  $slider->image }});">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="banner-content">
                <h1>{{  $slider[lang().'_title'] }}</h1>
                <p>{{  $slider[lang().'_subtitle'] }}</p>
              </div>
            </div>
          </div>
        <div class="banner-btn">
          <div class="row">
            <div class="col-lg-12">
              <div class="btn-style-1">
                <a href="{{ $slider->isCampaignActive ? route('donate', $slider->isCampaignActive->slug ) : 'javascript:void(0)' }}">{{ translation('donate_now') }}</a>
              </div>
              <div class="doner-btn">
                <a href="{{ route('become.doner', 'donar') }}">{{ translation('become_doner') }}</a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

  </section>
  @endif

  <!-- banner-area-end -->
  <!-- campaign-area-start -->
  <div class="campaign-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="campaign-title">
            <div class="area-title">
                <h2>{{ translation('campaign_title') }}</h2>
                <p>{{ translation('campaign_subtitle') }}</p>
            </div>
          </div>
        </div>
        @foreach ( $info['campaign'] as  $campaign )
        <div class="col-lg-4 col-md-6 col-12">
          <div class="single-campaign">
            <div class="campaign-img">
             <a href="{{ route('campaign.details', $campaign->slug ) }}"><img src="{{  $campaign->image }}" alt=""></a>
            </div>
            <div class="campain-content">
              <div class="campaign-heading">
                <h4>{{ Str::length($campaign[lang().'_title']) > 23 ? Str::substr($campaign[lang().'_title'], 0, 23).'...' : $campaign[lang().'_title'] }}</h4>
                <span>{{ raisedAmount($campaign->goal_amount, $campaign->raised_amount) }}%</span>
              </div>
              <div class="meta-wrap">
                <div class="campaign-meta">
                  <i class="fas fa-signal"></i>
                  <span>{{ translation('goal') }} : <span>{{ allSettings('currency'). $campaign->goal_amount }}</span></span>
                </div>
                <div class="campaign-meta-2">
                  <i class="fas fa-dollar-sign"></i>
                  <span>Raised : <span>{{ allSettings('currency'). $campaign->raised_amount }}</span></span>
                </div>
              </div>
              <p>{!! Str::words($campaign[lang().'_details'], 16, '...') !!}</p>
              <div class="btn-style-1">
                <a href="{{ route('campaign.details', $campaign->slug ) }}">{{ translation('view_more') }}</a>
              </div>
              <div class="donate-btn">
                <a href="{{ route('donate',$campaign->slug ) }}">{{ translation('donate_now') }}</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    {{-- {{ $info['campaign']->links() }} --}}
    </div>
  </div>
  <!-- campaign-area-end -->
  <!-- assistence-area-start -->
@if ($info['charity'])

  <section class="assistence-bottom"  style="background-image: url({{ $info['charity']->image }});">
    <div class="container">
      <div class="row">
        <div class="offset-lg-4 col-lg-8">
          <div class="assistance-list">
            <ul>
              <li class="single-list">
                <span>01</span>
                <div class="list-content">
                  <h4>{{ $info['charity'][lang().'_title_01'] }}</h4>
                  <p>{{ $info['charity'][lang().'_subtitle_01'] }}</p>
                </div>
              </li>
              <li class="single-list">
                <span>02</span>
                <div class="list-content">
                    <h4>{{ $info['charity'][lang().'_title_02'] }}</h4>
                    <p>{{ $info['charity'][lang().'_subtitle_02'] }}</p>
                </div>
              </li>
              <li class="single-list">
                <span>03</span>
                <div class="list-content">
                    <h4>{{ $info['charity'][lang().'_title_03'] }}</h4>
                    <p>{{ $info['charity'][lang().'_subtitle_03'] }}</p>
                </div>
              </li>
              <li class="single-list">
                <span>04</span>
                <div class="list-content">
                    <h4>{{ $info['charity'][lang().'_title_04'] }}</h4>
                    <p>{{ $info['charity'][lang().'_subtitle_04'] }}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endif
  <!-- assistence-area-end -->
  <!-- team-area-start -->
  @if(isset($info['team'][0]))
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
                    <img src="{{  $team->image }}" alt="images" />
                </div>
                </div>
                <div class="team-details">
                <h4>{{  $team->name }}</h4>
                <span>{{  $team[lang().'_designation'] }}</span>
                </div>
            </div>
            @endforeach

      </div>
    </div>
  </div>
  @endif
  <!-- team-area-end -->
  <!-- help-area-start -->
  @if(isset( $info['help'] ) && !empty( $info['help'] ))
  <section class="help-area"  style="background-image: url({{  $info['help']->background_image }});">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="help-title">
            <div class="area-title">
              <h2>{{ $info['help'][lang().'_title'] }}</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-help">
            <i class="{{ $info['help']->first_section_icon }}"></i>
            <h4 class="counter">{{ $info['help']['first_section_counter'] }}</h4><span>{{ $info['help'][lang().'_first_section_unit'] }}</span>
            <p>{{ $info['help'][lang().'_first_section_title'] }}</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-help">
            <i class="{{ $info['help']->second_section_icon }}"></i>
            <h4 class="counter">{{ $info['help']['second_section_counter'] }}</h4><span>{{ $info['help'][lang().'_second_section_unit'] }}</span>
            <p>{{ $info['help'][lang().'_second_section_title'] }}</p>
          </div>
        </div>
        <div class="col-lg-6"></div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-help">
            <i class="{{ $info['help']->third_section_icon }}"></i>
            <h4 class="counter">{{ $info['help']['third_section_counter'] }}</h4><span>{{ $info['help'][lang().'_third_section_unit'] }}</span>
            <p>{{ $info['help'][lang().'_third_section_title'] }}</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="single-help">
            <i class="{{ $info['help']->fourth_section_icon }}"></i>
            <h4 class="counter">{{ $info['help']['fourth_section_counter'] }}</h4><span>{{ $info['help'][lang().'_fourth_section_unit'] }}</span>
            <p>{{ $info['help'][lang().'_first_section_title'] }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- help-area-end -->
  <!-- testimonial-area-start -->
  @if(isset($info['feedback'][0] ))
  <section class="testimonial-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="team-title">
            <div class="area-title">
                <h2>{{ translation('feedback_title') }}</h2>
                <p>{{ translation('feedback_subtitle') }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="testimonial-inner">
        <div class="testimonial-active row">
            @foreach ($info['feedback']  as $feedback)

          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <div class="testimonial-img">
                  <img src="{{$feedback->image}}" alt="images" />
                </div>
              </div>
              <div class="col-lg-8">
                <div class="testimonial-content">
                  <h4>{{$feedback->name}}</h4>
                  <span>{{$feedback->location}}</span>
                  <i class="fas fa-quote-right"></i>
                  <p>{{$feedback[lang().'_feedback']}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </section>
  @endif
  <!-- testimonial-area-end -->
  <!-- blog-area-start -->
  @if (isset($info['news'][0]))
  <section class="blog-area">
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
              <p>{!! Str::words($first_news[lang().'_description_pre_image'],30, '...') !!}</p>
              <div class="read-btn">
                <a href="{{route('blog.details',$first_news->slug) }}">Read More<i class="fas fa-arrow-right"></i></a>
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
           <div class="col-lg-12 col-md-6">
            @foreach ($info['news'] as $sec_news)

            @if ($loop->iteration == 1)
                @continue
            @endif

                <div class="single-blog-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog-img">
                                <a href="{{route('blog.details',$sec_news->slug) }}"> <img src="{{ $sec_news->primary_image }}" alt="images" /> </a>
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
                                <a href="{{route('blog.details',$sec_news->slug) }}"><h4>{{ Str::words($sec_news[lang().'_title'],5, '...')  }}</h4></a>
                                <p>{!! Str::words($sec_news[lang().'_description_pre_image'],10, '...') !!}</p>
                                <div class="read-btn">
                                  <a href="{{route('blog.details',$sec_news->slug) }}">{{ translation('read_more') }}<i class="fas fa-arrow-right"></i></a>
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
  </section>
  @endif
  <!-- blog-area-end -->
  <!-- partner-area-start -->
  @if(isset ($info['partners'][0]))
  <section class="partner-area">
    <div class="container">
      <div class="row">
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
  </section>
  @endif
  <!-- partner-area-end -->
  @endsection
