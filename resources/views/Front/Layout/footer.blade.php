
    <footer></footer>


    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ URL::asset('assets/js/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ URL::asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ URL::asset('assets/js/accordions.js') }}"></script>
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slick.js') }}"></script>
    <script src="{{ URL::asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ URL::asset('assets/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

  </body>
</html>
