<!DOCTYPE html>
<html lang="en">

        @include('includes.front_header')

    <body>

        <!-- Navigation -->
        @include('includes.front_nav')


        <!-- Page Content -->
        <div class="container">

            @include('includes.flash_messages')

            <div class="row">

                <div class="col-lg-8">
                    @yield('content')

                </div>

                <div class="col-md-4">
                    @include('includes.front_sidebar')
                </div>
            </div>
        </div>
         @include('includes.front_footer')

    </body>

</html>
