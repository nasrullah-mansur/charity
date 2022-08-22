@extends('front.master')
@section('title' , isset($page_title) ? $page_title : translation('blog'))
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
  <!-- blog-area-end -->
  <section class="main-blog-area">
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
        @if (isset($info['news'][0]))
        <div class="col-lg-8">
          <div class="row">
              @foreach ($info['news'] as $news )
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="single-blog">
                <div class="blog-img">
                  <a href="{{route('blog.details',$news->slug) }}"><img src="{{ $news->primary_image }}" alt="images" /></a>
                </div>
                <div class="blog-details">
                  <div class="blog-meta">
                    <p>{{  isset($news->category) ? Carbon\Carbon::parse($news->created_at)->format('d M Y').' - '.$news->category[lang().'_name'] :  Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</p>
                  </div>
                  <a href="{{route('blog.details',$news->slug) }}"><h4>{{  Str::words($news[lang().'_title'],7, '...') }}</h4></a>
                  <p>{!! Str::words($news[lang().'_description_pre_image'],20, '...') !!}</p>
                  <div class="read-btn">
                    <a href="{{route('blog.details',$news->slug) }}">{{ translation('read_more') }}<i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          {{ $info['news']->links() }}
        </div>
        @endif
        <div class="col-lg-4">
          <div class="searchbar">
            <form action="{{ route('search.blog') }}"  enctype="multipart/form-data">
                {{-- @csrf --}}
              <input type="text" name="text" placeholder="{{ translation('search_keywords') }}" />
              <a type="submit"><i class="fas fa-search"></i></a>
            </form>
          </div>
            @if(isset($info['category'][0]))
            <div class="pet-catagory">
                <p>{{ translation('post_categories') }}</p>
                <ul>
                    @foreach ($info['category'] as $category )
                        <li><a href="{{  countCategoryNews($category->id) > 0 ? route('categoy.blog', $category->slug) : 'javascript:void(0)' }}">{{ $category[lang().'_name'] }}</a><p>{{ countCategoryNews($category->id) }}</p></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(isset( $info['popular_news'][0]))
            <div class="popular-post">
                <p>{{ translation('popular_post') }}</p>
                <ul>
                    @foreach ( $info['popular_news'] as $popular)
                <li>
                    <div class="single-post">
                    <div class="post-img">
                        <img src="{{ $popular->primary_image }}" alt="images" />
                    </div>
                    <div class="post-content">
                        <a href="#"><p>{{ Str::words($popular[lang().'_title'], 5, '..') }}</p></a>
                        <span>{{ Carbon\Carbon::parse($popular->created_at)->format('M d, Y') }}</span>
                    </div>
                    </div>
                </li>
                @endforeach
                </ul>
            </div>
            @endif
            @if(isset($info['tag'][0]))
            <div class="popular-tag">
                <p>{{ translation('post_tag') }}</p>
                <ul>
                    @foreach ($info['tag'] as $tag )
                    <li><a href="{{ route('tag.blog',  $tag->slug) }}">{{ $tag[lang().'_name'] }}</a> </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
      </div>
    </div>
  </section>
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
