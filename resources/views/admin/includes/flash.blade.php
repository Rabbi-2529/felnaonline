{{-- Admin flash messages, shown as small notifications in the top-right corner --}}
@php
    $flashes = [];
    foreach (['msg' => 'success', 'success' => 'success', 'del' => 'success', 'error' => 'error'] as $key => $icon) {
        if (Session::has($key)) {
            $flashes[] = ['icon' => $icon, 'text' => (string) Session::get($key)];
        }
    }
@endphp
@if (count($flashes))
    <script>
        (function () {
            var toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true
            });
            @foreach ($flashes as $flash)
                toast.fire({ icon: @json($flash['icon']), title: @json($flash['text']) });
            @endforeach
        })();
    </script>
@endif
