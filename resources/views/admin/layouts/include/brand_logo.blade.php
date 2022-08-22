<!-- Brand Logo -->
<a href="{{route('admin.dashboard')}}" class="brand-link">
    @if(allSettings('logo'))
    <img src="{{ allSettings('footer_logo') ? asset(path_image().allSettings('footer_logo')) : ''}}" alt="chartyzai" class="brand-image "
         style="opacity: .8">
    @else
         <span class="brand-text font-weight-light">@if(allSettings(['company_name'])) {{allSettings(['company_name'])}} @else zaimart @endif</span>
    @endif
</a>
