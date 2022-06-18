<script src="js/jquery.js"></script>
<script src="Owl/owl.carousel.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script>
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 5,
        autoplay: true,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2
            },
            600: {
                items: 3
            },
            900: {
                items: 4
            },
            1100: {
                items: 5
            }
        }
    });
</script>

</body>

</html>