@extends('front.master')
@section('title' , translation('contact'))
@section('content')

  <!-- banner-area-start -->
  <section class="contact-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact-banner-content">
            <h2>{{ translation('contact') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('contact') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- contact-area-end -->
  <section class="contact-form">
    <div class="container">
      <div class="form-inner">
        <form method="post" action="{{ route('contact.us.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="single-form">
                <p>{{ translation('first_name') }}</p>
                <input name="first_name" type="text" />
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
              </div>
              <div class="single-form">
                <p>{{ translation('email') }}</p>
                <input name="email" type="text"  />
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="single-form">
                <p>{{ translation('last_name') }}</p>
                <input name="last_name" type="text"  />
                <span class="text-danger">{{ $errors->first('last_name') }}</span>
              </div>
              <div class="single-form">
                <p>{{ translation('phone') }}</p>
                <input name="phone" type="text"  />
              </div>
            </div>
            <div class="col-lg-12">
              <div class="message-box">
                <p>{{ translation('message') }}</p>
                <textarea name="message" id="" cols="30" rows="10" ></textarea>
                <span class="text-danger">{{ $errors->first('message') }}</span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="send-btn">
                <button type="submit">{{ translation('send_message') }}</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- contact-area-end -->
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
@endsection
