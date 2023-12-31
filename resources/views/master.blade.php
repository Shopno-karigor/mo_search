<!DOCTYPE html>
    <html lang="en">
        @include('pages.header')
        @yield('index')
        @yield('search')
        @yield('searchResults')
        @yield('countryList')
        @yield('addOperator')
        @yield('operatorList')
        @yield('editOperator')
        
  

        @yield('404')
        @yield('500')
        
        @yield('widgets')
        {{-- Layout --}}
        @yield('top-nav')
        @yield('top-nav-sidebar')
        @yield('boxed')
        @yield('fixed-sidebar')
        @yield('fixed-sidebar-custom')
        @yield('fixed-topnav')
        @yield('fixed-footer')
        @yield('collapsed-sidebar')
        {{--  --}}


        @include('pages.footer-script')
    </html>