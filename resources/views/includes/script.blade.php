<script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('frontend/js/google-maps.js') }}"></script>

<script src="{{ asset('frontend/vendor/wow/wow.min.js') }}"></script>

<script src="{{ asset('frontend/js/theme.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(document).ready(function() {
        // saat hover pada elemen dropdown, tambahkan class dropdownmenu pada elemen dropdown-menu
        $('.dropdown').hover(function() {
            $('.dropdown-menu').addClass('dropdownmenu');
        }, function() {
            // saat tidak dihover, hapus class dropdownmenu pada elemen dropdown-menu
            $('.dropdown-menu').removeClass('dropdownmenu');
        });
    });
</script>
