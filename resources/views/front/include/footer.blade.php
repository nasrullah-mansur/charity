<section class="footer-area">
    <div class="container">
      <div class="footer-top-area">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="footer-logo-area">
              <a href="index.html"><img src="{{ asset(path_image().allSettings('footer_logo'))}}" alt="images" /></a>
              <p>{{ allSettings(app()->getLocale().'_about_us') ? allSettings(app()->getLocale().'_about_us')  :  allSettings('pl_about_us') }}</p>
              <div class="footer-icon">
                <a href="{{ allSettings('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ allSettings('twitter') }}"><i class="fab fa-twitter"></i></a>
                <a href="{{ allSettings('linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
                <a href="{{ allSettings('skype') }}"><i class="fab fa-skype"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="footer-contact">
              <h4>{{ translation('contact_info') }}</h4>
              <ul>
                <li>{{ isset($contact) ? $contact[app()->getLocale().'_address'] : '23 Ramnogor main road, Rupsha, Khulna, Bangladesh' }}</li>
                <li>{{ isset($contact) ? $contact->phone : '+88 012 345 789 90' }} </li>
                <li>{{ isset($contact) ? $contact->email : 'info@charityzai.com' }}</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="quick-link">
              <h4>{{ translation('quick_link') }}</h4>
              <ul>
                <li><a href="{{ route('home') }}">{{ translation('home') }}</a></li>
                <li><a href="{{ route('contact.us') }}">{{ translation('contact') }}</a></li>
                <li><a href="{{ route('about.us') }}">{{ translation('about') }}</a></li>
                <li class="pb-0"><a href="{{ route('blog') }}">{{ translation('blog') }}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="Subscribe-area">
              <h4>{{ translation('subscribe_now') }}</h4>
              <form action="{{ route('newsletter.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="email" placeholder="email" />
                <span class="text-danger">{{ $errors->first('email') }}</span>
                <button type="submit">{{ translation('send') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom-area">
      <div class="copyright-area">
        <p>&copy;  {{ Carbon\Carbon::now()->format('Y').' | '.translation('right_reserved').' '.allSettings('company_name') }}</p>
      </div>
    </div>
  </section>
