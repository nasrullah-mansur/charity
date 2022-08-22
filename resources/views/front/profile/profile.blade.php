@extends('front.master')
@section('title', translation('profile'))
@section('content')
<!-- banner-area-start -->
<section class="about-banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="about-banner-content">
            <h2>{{ translation('profile') }}</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ translation('profile') }}</li>
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
          <div class="profile-right-bar">
            <div class="profile-table">
              <div class="table-heading">
                <div class="row">
                  <div class="col-lg-6 col-md-10 col-sm-10 col-9">
                    <h2>My Profile</h2>
                  </div>
                  <div class="offset-lg-5 col-lg-1 col-md-2 col-sm-2 col-3">
                    <h2> <a href="{{ route('user.profile.edit') }}">{{ translation('edit_view') }}</a></h2>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-5 col-7">
                    <img id="profile" src="{{ $user->image ? $user->image : Avatar::create($user->first_name.' '.$user->last_name)->toBase64() }}" alt="images" />
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table-2">
                  <tr>
                    <td>{{ translation('first_name') }}</td>
                    <td>{{ $user->first_name }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('last_name') }}</td>
                    <td>{{ $user->last_name }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('email') }}</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('gender') }}</td>
                    <td>{{ $user->gender ?  gender($user->gender) : ''}}</td>
                  </tr>

                  <tr>
                    <td>{{ translation('phone') }}</td>
                    <td>{{ $user->phone }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('address') }}</td>
                    <td>{{ $user->address }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('country') }}</td>
                    <td>{{ $user->country }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('member_since') }}</td>
                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('M Y') }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('status') }}</td>
                    <td>{{ status($user->status) }}</td>
                  </tr>
                  <tr>
                    <td>{{ translation('contributed') }}</td>
                    <td>{{$user->donate ? number_format($user->donate->sum('amount'),2).' '.allSettings('currency') : 0}}</td>
                  </tr>
                  {{-- <tr>
                    <td>{{ translation('account_deactivation') }}</td>
                    <td><a href="javascript:void(0)" onclick="deactiveAccount()">{{ translation('deactive_account') }}</a></td>
                  </tr> --}}
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

@section('post_script')
<script>
    function deactiveAccount()
    {
        var message = confirm('Are you suer, do you want to deactvie your account ?');
        if(message){
            window.location.href = '{{route('user.account.deactivate')}}'
        }
    }
</script>
@endsection
