@extends('admin.master')
@section('title', 'My Profile')

@section('body')
    <div class="row">
        <div class="col-xl-6">
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="col-xl-6">
            @include('profile.partials.update-password-form')
        </div>
        <div class="col-12">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection

@push('scripts')
    @php
        $profileStatus = [
            'profile-updated' => 'Profile saved',
            'password-updated' => 'Password updated',
            'verification-link-sent' => 'Verification link sent to your email',
        ][session('status')] ?? null;
    @endphp
    @if ($profileStatus)
        <script>
            Swal.mixin({ toast: true, position: "top-end", showConfirmButton: false, timer: 3500, timerProgressBar: true })
                .fire({ icon: "success", title: @json($profileStatus) });
        </script>
    @endif
@endpush
