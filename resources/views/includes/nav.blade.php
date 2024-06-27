<!-- Start Nav bar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ __('messages.clients_data') }}</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('addClient') }}">{{ __('messages.add_client') }}</a></li>
            <li><a href="{{ route('clients') }}">{{ __('messages.clients') }}</a></li>
            <li><a href="{{ route('trashClient') }}">{{ __('messages.trash') }}</a></li>
            @yield('menu')
            @stack('submenu')
            <li><a href="#">{{ __('messages.page_2') }}</a></li>
            <li><a href="#">{{ __('messages.page_3') }}</a></li>
            <li class="col-md-6"></li>
            <li><a href="{{ route('facebookRedirect') }}">Login with facebook</a></li>
        </ul>
       
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">العربية</a></li>
        </ul>
    </div>
</nav>
<!-- End Nav bar -->
