<!DOCTYPE html>
<html class="no-js" lang="zxx">
@include('front.include.head')

<body>
  <!-- header-area-start -->
  <?php
  $contact = contactUs();
  $user =App\Models\User::where('id', Auth::id())->first();
  ?>
  @include('sweetalert::alert')

@include('front.include.header')

  <!-- header-area-end -->
  @yield('content')
  <!-- footer-area-start -->
@include('front.include.footer')

  <!-- footer-area-end -->

@include('front.include.script')

</body>

</html>
