@extends('front.master')
@section('title' , translation('blog_details'))
@section('content')
 <!-- banner-area-start -->
 <section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('blog_details') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('blog_details') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- blog-area-end -->
  <section class="blog-details-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
           <div class="blog-details">
             <div class="details-img">
               <img src="{{ $blog->primary_image }}" alt="images" />
             </div>
             <div class="details-title">
               <h2>{{ $blog[lang().'_title'] }}</h2>
               <span>{{  isset($blog->category) ? Carbon\Carbon::parse($blog->created_at)->format('d M Y').' - '.$blog->category[lang().'_name'] :  Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
             </div>
             <div class="details-text">
                 <p>{!! $blog[lang().'_description_pre_image'] !!}</p>
             </div>
             <div class="details-img">
               <img src="{{ $blog->secondary_image }}" alt="images" />
             </div>
             <div class="details-text2">
                <p>{!! $blog[lang().'_description_post_image'] !!}</p>
            </div>
             <div class="author">
                <div class="author-img">
                  <img src="{{isset( $blog->author->image ) ?  $blog->author->image :  Avatar::create($blog->author->name)->toBase64() }}" alt="images" />
                </div>
                <div class="author-details">
                  <h4>{{isset( $blog->author ) ? $blog->author->name : ''}}</h4>
                  <span>{{ translation('author') }}</span>
                  <p>{{isset( $blog->author ) ? $blog->author[lang().'_bio'] : ''}}</p>
                </div>
             </div>
             <div class="comment-box">
                <div class="comment-form">
                  <p>{{ translation('comment_here') }}</p>
                  <form action="{{ route('blog.comment.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="single-box">
                          <input type="text" name="first_name" placeholder="{{ translation('first_name') }}" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="single-box">
                          <input type="text"name="last_name" placeholder="{{ translation('last_name') }}" />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="single-box">
                          <input type="text"name="email" placeholder="{{ translation('email') }}"  />
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="single-box">
                          <textarea name="Message" cols="30" rows="10" placeholder="Your Message Here" name="comment"></textarea>
                        </div>
                      </div>
                      <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                      <div class="col-lg-4">
                        <div class="comment-btn">
                          <button type="submit">{{ translation('comment') }}</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
             </div>
           </div>
        </div>
        <div class="col-lg-4">
            <div class="searchbar">
              <form action="{{ route('search.blog') }}"  enctype="multipart/form-data">
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
  </section>
  <!-- blog-area-end -->
<div class="big-bg">
  <!-- related-post-area-end -->
  @if(isset($info['related_blog'][0]))
  <section class="related-post">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="related-post-title">
            <h2>{{ translation('related_blog') }}</h2>
          </div>
        </div>
        @foreach ($info['related_blog'] as $related )
        @if($blog->id == $related->id)
            @continue
        @endif
        <div class="col-lg-4">
          <div class="single-blog">
            <div class="blog-img">
              <img src="{{ $related->primary_image }}" alt="images" />
            </div>
            <div class="blog-details">
              <div class="blog-meta">
                <p>{{  isset($related->category) ? Carbon\Carbon::parse($related->created_at)->format('d M Y').' - '.$related->category[lang().'_name'] :  Carbon\Carbon::parse($related->created_at)->format('d M Y') }}</p>

              </div>
              <a href="{{route('blog.details',$related->slug) }}"><h4>{{  Str::words($related[lang().'_title'],7, '...') }}</h4></a>
              <p>{!! Str::words($related[lang().'_description_pre_image'],20, '...') !!}</p>
              <div class="read-btn">
                <a href="{{route('blog.details',$related->slug) }}">Read More<i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- related-post-area-end -->
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
