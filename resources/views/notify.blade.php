{{--
    Flash message for the public package order pages.
    The admin panel shows its flash messages itself (admin/includes/flash.blade.php), so nothing is printed there.
--}}
@if (request()->routeIs('home-package', 'corporate-package') && Session::has('msg'))
    <script>
        Swal.fire({
            title: "Thank you!",
            text: @json(Session::get('msg')),
            icon: "success",
            confirmButtonColor: "#00a651"
        });
    </script>
@endif
