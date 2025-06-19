@if(config('webcrawler.enabled'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.webcrawler.settingsPage') }}">
        <i class="fa fa-search"></i> WebCrawler
    </a>
</li>
@endif
