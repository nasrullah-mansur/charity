@extends('front.master')
@section('title', 'Running Campaign' )
@section('post_head')
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
                <li class="breadcrumb-item active" aria-current="page">{{ translation('pending_campaign') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('running_campaign') }}</li>
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
          <div class="my-campaign-right-bar ">
            <div class="my-campaign-table">
              <h2>{{ translation('pending_campaign') }}</h2>
              <div class="table-responsive">
                <table class="table">
                  <tr class="heading">
                    <th>{{ translation('image') }}</th>
                    <th>{{ translation('title') }}</th>
                    <th>{{ translation('goal') }}</th>
                    <th>{{ translation('raised') }}</th>
                    <th>{{ translation('start_date') }}</th>
                     <th>{{ translation('end_date') }}</th>
                    <th>{{ translation('action') }}</th>
                  </tr>
                  @if(isset($campaigns[0]))
                  @foreach ($campaigns as $campaign )
                  <tr>
                    <td class="table-img"><img src="{{ $campaign->image }}" alt="images" /></td>
                    <td><a href="{{ route('campaign.details', $campaign->slug) }}">{{ strlen($campaign[lang().'_title']) > 10 ? substr($campaign[lang().'_title'], 0,10).'..' :$campaign[lang().'_title']  }}</a></td>
                    <td>{{ allSettings('currency').$campaign->goal_amount }}</td>
                    <td>{{ allSettings('currency').$campaign->raised_amount }}</td>
                    <td>{{ Carbon\Carbon::parse($campaign->start_date)->format('d M') }}</td>
                    <td>{{ Carbon\Carbon::parse($campaign->end_date)->format('d M') }}</td>
                    <td>
                    <a href="{{ route('user.campaign.view', $campaign->slug )}}">  <i class="fas fa-eye"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  @endif

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- dashboard-area-end -->
@endsection
