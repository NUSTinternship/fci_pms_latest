<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
     $("#wrapper").toggleClass("toggled");
    });

// Simple trigger to load another section.
                $('#menu-toggle').on('click', function (e) {
                     $("#wrapper").toggleClass("toggled");
                    e.preventDefault();
                });
</script>
