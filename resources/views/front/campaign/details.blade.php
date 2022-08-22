

@extends('front.master')
@section('title', translation('campaign_details'))
@section('post_head')
<link href="{{ asset('assets/front/css/nouislider.min.css')}}" rel="stylesheet">
@endsection
@section('content')
  <!-- banner-area-start -->
  <section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('campaign_details') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('campaign_details') }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- banner-area-end -->
  <!-- blog-area-end -->
  <section class="campaign-details-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
           <div class="campaign-details">
                <div class="details-img">
                    <img src="{{ $campaign->image }}" alt="images" />
                </div>
                <div class="details-text">
                    {!! $campaign[lang().'_details'] !!}
                </div>
           </div>
           <div class="campaign-comment">
              <div class="comment-title">
                  <h2>{{ translation('comment') }} ({{ isset($campaign->comment[0])  ? count($campaign->comment) : 0}})</h2>
              </div>
              @if(isset($campaign->comment[0]))
                @foreach ($campaign->comment as $comment)
                <div class="single-comment">
                    <div class="comment-icon">
                        <img src="{{ isset($comment->user->image) ? $comment->user->image : Avatar::create($comment->first_name.' '.$comment->last_name)->toBase64() }}">
                    </div>
                    <div class="comment-text">
                    <p>{{ $comment->comment }}</p>
                    </div>
                    <div class="comment-meta">
                    <div class="meta-1">
                        <a href="#">
                        <span>{{ isset($comment->user) ? $comment->user->first_name.' '.$comment->user->last_name : $comment->first_name.' '.$comment->last_name}}</span>
                        </a>
                        </div>
                    <div class="meta-2">
                        <a href="#">
                            <i class="fas fa-clock"></i>
                            <span>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans()  }}</span>
                        </a>
                    </div>
                    <div class="meta-3">
                        <i class="fas fa-comments"></i>
                        <span><a href="#write_reply" onclick="getCommentId('{{$comment->id}}')">Reply </a> ({{ isset($comment->reply[0]) ? count($comment->reply) : 0 }})</span>
                    </div>
                    </div>
                </div>
                @if(isset($comment->reply[0]))
                    @foreach($comment->reply as $reply)
                    <div class="single-comment has-child">
                        <div class="comment-icon">
                            <img src="{{ isset($reply->user->image) ? $reply->user->image : Avatar::create($reply->first_name.' '.$reply->last_name)->toBase64() }}">
                        </div>
                        <div class="comment-text">
                            <p>{{ $reply->comment }}</p>
                        </div>
                        <div class="comment-meta">
                        <div class="meta-1">
                            <a href="#">
                                <span>{{ isset($reply->user) ? $reply->user->first_name.' '.$reply->user->last_name : $reply->first_name.' '.$reply->last_name}}</span>
                            </a>
                        </div>
                        <div class="meta-2">
                            <a href="#">
                            <i class="fas fa-clock"></i>
                            <span>{{ Carbon\Carbon::parse($reply->created_at)->diffForHumans()  }}</span>
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                @endif
              @endforeach
              @endif

              <div class="comment-box" id="write_reply">
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
                        <input type="hidden" name="blog_id" value="{{ $campaign->id }}">
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
          <div class="campaign-details-right-side-bar">
            <div class="details-goal-area">
              <div class="goal-icon">
                <i class="fas fa-user-circle"></i>
              </div>
              <div class="goal-title">
                <h3><span class="mr-1">by</span> {{ isset($campaign->user) ? $campaign->user->first_name.' '.$campaign->user->last_name : '' }}</h3>
                <p>{{ $campaign->address }}</p>
              </div>
              <div class="goal-title-2">
                <h3>{{ $campaign[lang().'_title'] }}</h3>
                <p><i class="fas fa-clock"></i>{{ translation('created_on') }} : {{ Carbon\Carbon::parse($campaign->created_at)->format('d M, Y') }}</p>
              </div>
              <div class="goals">
                <div class="single-goal">
                    <span>{{ translation('raised') }}</span>
                    <p>{{ allSettings('currency').$campaign->raised_amount }}</p>
                  </div>
                <div class="single-goal">
                    <span>{{ translation('goal') }}</span>
                    <p>{{ allSettings('currency').$campaign->goal_amount }}</p>
                  </div>
                <div class="single-goal">
                    <span>{{ translation('donars') }}</span>
                    <p>{{ count($campaign->donar) }}</p>
                </div>
              </div>
             </div>
            <form action="{{ route('donate.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="donate-area">
              <div class="donate-input">
                <span>{{ allSettings('currency') }}</span>
                <input type="text" name ="donate_amount" id="donate_amount" value="{{ $slot->value5 }}" required>
              </div>
              <div class="donates" id="donates">
                  <p>{{ allSettings('currency').$slot->value1 }}</p>
                  <p>{{ allSettings('currency').$slot->value2 }}</p>
                  <p>{{ allSettings('currency').$slot->value3 }}</p>
                  <p>{{ allSettings('currency').$slot->value4 }}</p>
                  <p>{{ allSettings('currency').$slot->value5 }}</p>
                  <p>{{ allSettings('currency').$slot->value6 }}</p>
                  <p>{{ allSettings('currency').$slot->value7 }}</p>
                  <p>{{ allSettings('currency').$slot->value8 }}</p>
                  <p>{{ allSettings('currency').$slot->value9 }}</p>
              </div>
              <input type="hidden" name="campaign_id" value="{{$campaign->id }}">
              <div class="donate-btn">
                <button type="submit">{{ translation('donate') }}</button>
              </div>
            </div>
            </form>
            <div class="link-area">
              <div class="link-input">
                <input type="url" id="myInput" value="{{ Request::url() }}">
                <button type="button"  onclick="copy()">{{ translation('copy') }}</button>
              </div>
              <div class="link-icon">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('campaign.details', $campaign->slug ) }}&display=popup"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/intent/tweet?url={{ route('campaign.details', $campaign->slug ) }}"><i class="fab fa-twitter-square"></i></a>
                <a href="https://pinterest.com/pin/create/button/?url={{ route('campaign.details', $campaign->slug ) }}&media={{ $campaign->primary_image }}&description={{ $campaign->pl_title }}"><i class="fab fa-pinterest-square"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- blog-area-end -->
@endsection

@section('post_script')
 <!-- nouislider js -->
 <script src="{{ asset('assets/front/js/nouislider.min.js') }}"></script>
 <script>
    var mySlider = document.getElementById('noUiSlider');
    var raised = '{{(float) $campaign->raised_amount }}'
    var goal = '{{ (int)$campaign->goal_amount }}'
      noUiSlider.create(mySlider, {
        // // Start values
        start: [20, 80],
        // // Min/Max values
        range: {
          'min': [0],
          'max': [100]
        },


    });

    function donateAount(){
        alert('ok');
    }

    $('#donates p').on('click', function(e) {
       var text = e.target.innerHTML;
       var value = text.split('{{ allSettings('currency') }}');

       $('#donate_amount').val(value[1]);
       console.log(value[1]);
    })

    function copy() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

}

    function getCommentId($id) {
            let commentId = document.getElementById('comment_id');
            comment_id.value = $id;
        }
</script>
@endsection
