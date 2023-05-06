<!-- JAVASCRIPT -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<!-- pace js -->
<script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<script defer src="{{ mix('js/costume.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#link-logout').click(function() {
            $.ajax({
                url: '/logout',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf_token"]').attr("content")
                },
            });
            location.reload();
        });
    });
</script>

@yield('scripts')
