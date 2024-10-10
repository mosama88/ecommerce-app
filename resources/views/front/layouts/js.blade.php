<script src="{{ asset('front') }}/assets/js/jquery-3.3.1.min.js"></script>

<!-- fly cart ui jquery-->
<script src="{{ asset('front') }}/assets/js/jquery-ui.min.js"></script>

<!-- exitintent jquery-->
<script src="{{ asset('front') }}/assets/js/jquery.exitintent.js"></script>
<script src="{{ asset('front') }}/assets/js/exit.js"></script>

<!-- slick js-->
<script src="{{ asset('front') }}/assets/js/slick.js"></script>

<!-- menu js-->
<script src="{{ asset('front') }}/assets/js/menu.js"></script>

<!-- lazyload js-->
<script src="{{ asset('front') }}/assets/js/lazysizes.min.js"></script>

<!-- Bootstrap js-->
<script src="{{ asset('front') }}/assets/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('front') }}/assets/js/bootstrap-notify.min.js"></script>

<!-- Fly cart js-->
<script src="{{ asset('front') }}/assets/js/fly-cart.js"></script>

<!-- Theme js-->
<script src="{{ asset('front') }}/assets/js/theme-setting.js"></script>
<script src="{{ asset('front') }}/assets/js/script.js"></script>

<script>
    $(window).on('load', function() {
        setTimeout(function() {
            $('#exampleModal').modal('show');
        }, 2500);
    });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
</script>


@yield('scripts')
