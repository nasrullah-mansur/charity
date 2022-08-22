<div class="header-area">
    <div class="container">
      <div class="header-top-area">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="header-mail">
              <i class="fas fa-envelope"></i>
              <p>{{ isset($contact) ? $contact->email : 'info@charityzai.com' }}</p>
            </div>
            <div class="header-contact">
              <i class="fas fa-phone-alt"></i>
              <p>{{ isset($contact) ? $contact->phone : '+88 012 345 789 90' }}</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 col-sm-12">
            <div class="header-top-right text-right">
                <div class="dropdown languages-dropdown">
                    <button class="languages-area dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(lang() == 'pl')
                        <span>{{ allSettings('pl') }}</span>
                        @elseif(lang() == 'sl')
                        <span>{{ allSettings('sl') }}</span>
                        @endif
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if(lang() == 'pl')
                        <a href="{{ route('set_lang', 'sl') }}">{{ allSettings('sl') }}</a>
                        @elseif(lang() == 'sl')
                        <a href="{{ route('set_lang', 'pl') }}">{{ allSettings('pl') }}</a>
                        @endif
                    </div>
                </div>
                <div class="header-icon">
                    <a href="{{ allSettings('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ allSettings('twitter') }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ allSettings('linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
                    <a href="{{ allSettings('skype') }}"><i class="fab fa-skype"></i></a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom-area">
        <div class="row">
          <div class="col-lg-10 align-self-center">
              <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset(path_image().allSettings('logo'))}}" alt="images" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item ">
                      <a class="nav-link {{ isset($active) && $active == 'Home' ? 'active' : '' }}" href="{{ route('home') }}">{{ translation('home') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ isset($active) && $active == 'About' ? 'active' : '' }}" href="{{ route('about.us') }}">{{ translation('about') }}</a>
                    </li>
                    <li class="dropdown">
                      <button class="dropbtn">{{ translation('pages') }} <i class="fas fa-angle-down"></i></button>
                      <div class="dropdown-content">
                        @if(Auth::id())
                            <a href="{{ route('user.campaigns') }}">{{ translation('my_campaign') }}</a>
                        @else
                            <a href="{{ route('sign.up') }}">{{ translation('signup') }}</a>
                            <a href="{{ route('sign.in') }}">{{ translation('signin') }}</a>
                        @endif
                            <a  href="{{ route('about.us') }}">{{ translation('about') }}</a>
                            <a  href="{{ route('team') }}">{{ translation('team') }}</a>
                            <a  href="{{ route('contact.us') }}">{{ translation('contact') }}</a>
                            <a  href="{{ route('blog') }}">{{ translation('blog') }}</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link {{ isset($active) && $active == 'Team' ? 'active' : '' }}" href="{{ route('team') }}">{{ translation('team') }}</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link {{ isset($active) && $active == 'Blog' ? 'active' : '' }}" href="{{ route('blog') }}">{{ translation('blog') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ isset($active) && $active == 'Contact' ? 'active' : '' }}" href="{{ route('contact.us') }}">{{ translation('contact') }}</a>
                    </li>
                  </ul>
                </div>
              </nav>
          </div>
          <div class="col-lg-2">
                @if (isset($user))
                <div class="dropdown avater-dropdown">
                    <button class="avater-area dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="avater-image" src="{{ $user->image ? $user->image :  Avatar::create($user->first_name.' '.$user->last_name)->toBase64() }}" alt="avatar" />
                      <span>{{ $user->first_name.' '.$user->last_name}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if($user->role == DONAR)
                        <a class="dropdown-item" href="{{ route('user.profile') }}">{{ translation('profile') }}</a>
                        @else
                      <a class="dropdown-item" href="{{ route('user.dashboard') }}">{{ translation('dashboard') }}</a>
                      @endif
                      <a class="dropdown-item" href="{{ route('user.logout') }}">{{ translation('logout') }}</a>
                    </div>
                </div>
                @else
                <div class="btn-style-1">
                    <a href="{{ route('sign.up') }}">{{ translation('create_camp') }}</a>
                </div>
                @endif
          </div>
        </div>
      </div>
    </div>
  </div>
