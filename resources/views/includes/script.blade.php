{{-- User --}}
<script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('frontend/js/google-maps.js') }}"></script>

<script src="{{ asset('frontend/vendor/wow/wow.min.js') }}"></script>

<script src="{{ asset('frontend/js/theme.js') }}"></script>
{{-- User --}}

<!-- Page level plugins -->
<script src="{{ asset('frontend/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('frontend/admin/js/demo/datatables-demo.js') }}"></script>


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
