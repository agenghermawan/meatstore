<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.include.head')
</head>

<body>

    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- Sidebar -->

            @include('backend.include.sidebar')
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                @include('backend.include.navbar')

            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>

    @include('frontend.include.footer')

    @include('frontend.include.script')
</body>

</html>
