<!-- Footer Bottom -->
<footer class="footer-bottom"  id="footer-test">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                <!-- Copyright -->
                <div class="copyright">
                    <p>Copyright © {!! date('Y') !!}. All Rights Reserved by <strong style="color: #008B8B">CSE, SUST</strong></p>
                </div>
            </div>
            <div class="col-sm-6 col-12">

                <!-- Social Icons -->
                <!-- <ul class="social-media-icons text-right">
                    <li><a class="fa fa-facebook" href=""></a></li>
                    <li><a class="fa fa-twitter" href=""></a></li>
                    <li><a class="fa fa-pinterest-p" href=""></a></li>
                    <li><a class="fa fa-vimeo" href=""></a></li>
                  </ul> -->
            </div>
        </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
        <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{!! asset('plugins/bootstrap/dist/js/popper.min.js') !!}"></script>
<script src="{!! asset('plugins/bootstrap/dist/js/bootstrap.bundle.js') !!}"></script>
<script src="{!! asset('plugins/smoothscroll/SmoothScroll.min.js') !!}"></script>

@yield('script')



