<!DOCTYPE html>
    <html lang="en">
        @include('pages.header')
        @yield('index')
        @yield('addSchool')
        @yield('schoolList')
        @yield('editSchool')
        @yield('addDriver')
        @yield('editDriver')
        @yield('bookingQuery')
        @yield('bookingQueries')
        @yield('cancelledBookingQueries')
        @yield('taskList')
        @yield('taskListWithoutDiver')
        @yield('tripList')
        @yield('searchTrip')
        @yield('individualDriverTrips')
  

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