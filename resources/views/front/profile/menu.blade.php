<?php
  $user = user();
?>
<div class="col-lg-3">
    <div class="left-sidebar">
      <div class="user">
        <img src="{{ $user->image ? $user->image : Avatar::create($user->first_name.' '.$user->last_name)->toBase64() }}">
        <h3></h3>
        <p>{{ $user->first_name.' '.$user->last_name }}</p>
      </div>
      <div class="sidebar-menu">
        <ul>
          @if($user->role == CAMPAIGNER)
          <li class="{{ isset($menu) && $menu == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}">
            <i class="fas fa-box"></i>
            <p>{{ translation('dashboard') }}</p>
            </a>
          </li>
          <li class="slide-down {{ isset($menu) && $menu == 'Campaign' ? 'active' : '' }}">
            <i class="fas fa-bullhorn"></i>
            <p>{{ translation('campaign') }}</p>
            <div class="dropdown">
              <i class="fas fa-angle-down"></i>
            </div>
            <ul class="submenu">
              <li><a href="{{ route('user.campaigns') }}">{{ translation('my_campaign') }}</a></li>
              <li><a href="{{ route('user.campaing.create') }}">{{ translation('start_campaign') }}</a></li>
              <li><a href="{{ route('user.campaign.running') }}">{{ translation('running_campaign') }}</a></li>
              <li><a href="{{ route('user.campaign.pending') }}">{{ translation('pending_campaign') }}</a></li>
              <li><a href="{{ route('user.campaign.backed') }}">{{ translation('backed_campaign') }}</a></li>
            </ul>
          </li>
          <li class="{{ isset($menu) && $menu == 'Withdraw' ? 'active' : '' }}">
            <a href="{{ route('user.withdraw') }}">
              <i class="fas fa-credit-card"></i>
              <p>{{ translation('withdraw') }}</p>
            </a>
          </li>
          @endif
          <li class="{{ isset($menu) && $menu == 'profile' ? 'active' : '' }}">
            <a href="{{ route('user.profile') }}">
              <i class="fas fa-user"></i>
              <p>{{ translation('profile') }}</p>
            </a>
          </li>
          <li class="{{ isset($menu) && $menu == 'Change Password' ? 'active' : '' }}">
            <a href="{{ route('user.password.change') }}">
              <i class="fas fa-lock"></i>
              <p>{{ translation('change_password') }}</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
