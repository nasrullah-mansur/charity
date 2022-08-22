@extends('front.master')
@section('title', translation('dashboard'))
@section('content')

  <!-- banner-area-start -->
  <section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('Dashboard') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('dashboard') }}</li>
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
          <div class="dashboard-right-bar">
            <div class="top-area">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="single-dashboard">
                    <div class="dashboard-icon">
                      <i class="flaticon-campaigning" style="background: #EFA325;"></i>
                    </div>
                    <div class="dashboard-content">
                      <p>{{ translation('active_campaign') }}</p>
                      <span class="counter">{{ isset($info['active_campaign'][0]) ? count($info['active_campaign']) : 0  }}</span>
                      <span>+</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="single-dashboard">
                    <div class="dashboard-icon">
                      <i class="flaticon-money-bag" style="background: #324ECF;"></i>
                    </div>
                    <div class="dashboard-content">
                      <p>{{ translation('total_collection') }}</p>
                      <span>{{ allSettings('currency') }}</span>
                      <span class="counter">{{ isset($info['total_collection']) ? $info['total_collection'] : 0  }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                  <div class="single-dashboard mb-0">
                    <div class="dashboard-icon">
                      <i class="flaticon-dollar" style="background: #0093D2;"></i>
                    </div>
                    <div class="dashboard-content">
                      <p>{{ translation('collection_this_week') }}</p>
                      <span>{{ allSettings('currency') }}</span>
                      <span class="counter">{{ isset($info['total_collection_this_week']) ? $info['total_collection_this_week'] : 0  }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="bottom-area">
              <h2>{{ translation('active_campaign') }}</h2>
              <div class="table-responsive">
                <table class="table">
                    <tr class="heading">
                      <th>{{ translation('image') }}</th>
                      <th>{{ translation('title') }}</th>
                      <th>{{ translation('goal') }}</th>
                      <th>{{ translation('raised') }}</th>
                      <th>{{ translation('start_date') }}</th>
                       <th>{{ translation('end_date') }}</th>
                      <th>{{ translation('edit_view') }}</th>
                    </tr>
                    @if(isset($info['active_campaign'][0]))
                    @foreach ($info['active_campaign'] as $campaign )
                    <tr>
                      <td class="table-img"><img src="{{ $campaign->image }}" alt="images" /></td>
                      <td><a href="{{ route('campaign.details', $campaign->slug) }}">{{ strlen($campaign[lang().'_title']) > 10 ? substr($campaign[lang().'_title'], 0,10).'..' :$campaign[lang().'_title']  }}</a></td>
                      <td>{{ allSettings('currency').$campaign->goal_amount }}</td>
                      <td>{{ allSettings('currency').$campaign->raised_amount }}</td>
                      <td>{{ Carbon\Carbon::parse($campaign->start_date)->format('d M') }}</td>
                      <td>{{ Carbon\Carbon::parse($campaign->end_date)->format('d M') }}</td>
                     <td>
                        @if($campaign->is_approved)
                            <a href="{{ route('user.campaign.view', $campaign->slug )}}">  <i class="fas fa-eye"></i></a>
                        @else
                            <a href="{{ route('user.campaign.edit', $campaign->slug )}}"> <i class="fas fa-edit"></i></a>
                            <a href="{{ route('user.campaign.view', $campaign->slug )}}">  <i class="fas fa-eye"></i></a>
                        @endif
                        @if(isNotWithdraw($campaign->id)) <a class="withdraw-btn" data-id="{{ $campaign->slug }}"  data-toggle="modal" data-target="#exampleModal"><i class="fas fa-donate"></i></a>@endif
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
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select withdraw method</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('user.withdraw.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="slug" id="paypal_withdraw_campaign" >
            <input type="hidden" name="withdraw_method" value="{{ PAYMENT_PAYPAL }}">
            <button class="w-100 border-0 mb-3" type="submit">
                <img  src="{{ asset('uploaded_file/images/payment/paypal.png') }}" alt="paypal">
            </button>
        </form>
        <form action="{{ route('user.withdraw.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="slug" id="stripe_withdraw_campaign" >
            <input type="hidden" name="withdraw_method" value="{{ PAYMENT_STRIPE }}">

            <button  class="w-100 border-0" type="submit"> <img src="{{ asset('uploaded_file/images/payment/stripe.png') }}" alt="paypal"></button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('post_script')
<script>
    $('.withdraw-btn').on('click', function() {
       let slug = $(this).attr('data-id');
        $('#stripe_withdraw_campaign').val(slug);
        $('#paypal_withdraw_campaign').val(slug);
    })
</script>
@endsection
