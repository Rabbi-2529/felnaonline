{{--
    Shared layout for the Home and Corporate package pages.
    Expects: $packages, $tag, $idField, $orderRoute
--}}
@php
    $fmtNum = fn ($n) => rtrim(rtrim(number_format((float) $n, 1), '0'), '.');
    $speeds = $packages->map(fn ($p) => preg_match('/([\d.]+)/', (string) $p->bandwidth, $m) ? (float) $m[1] : null)->filter();
    $lowestPrice = $packages->min('price');
    $metaText = $tag . ' internet packages in Dhaka from Felna Online';
    if ($packages->count()) {
        $metaText .= ': ' . $packages->count() . ' plans';
        if ($speeds->count()) {
            $metaText .= ' from ' . $fmtNum($speeds->min()) . ' to ' . $fmtNum($speeds->max()) . ' Mbps';
        }
        if (is_numeric($lowestPrice)) {
            $metaText .= ', starting at ' . number_format((float) $lowestPrice) . ' TK';
        }
    }
    $metaText .= '. Order online or call 01958-666999.';
@endphp
@section('meta_description', $metaText)

@push('head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@include('notify')
@if (Session::has('error'))
    <script>
        Swal.fire({ title: "Sorry", text: @json(Session::get('error')), icon: "error", confirmButtonColor: "#00a651" });
    </script>
@endif

<section class="fo-section">
    <div class="container">
        <div class="fo-head-row">
            <div class="fo-section-head">
                <span class="fo-eyebrow">{{ $tag }} internet</span>
                <h2 class="fo-title">Choose the speed that fits you</h2>
                <p class="fo-lead">Pick a package below and place your order in under a minute. Our team will contact you to confirm the connection.</p>
            </div>
            <div class="fo-switch" role="tablist" aria-label="Package type">
                <a href="{{ route('home-package') }}" class="{{ request()->routeIs('home-package') ? 'active' : '' }}">Home</a>
                <a href="{{ route('corporate-package') }}" class="{{ request()->routeIs('corporate-package') ? 'active' : '' }}">Corporate</a>
            </div>
        </div>

        @if ($packages->isEmpty())
            <div class="fo-empty">
                <i class="fa-solid fa-wifi"></i>
                <h3>No packages available right now</h3>
                <p class="mb-0">Please call us at <a href="tel:+8801958666999">+88-01958-666999</a> for current offers.</p>
            </div>
        @else
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 fo-reveal" id="order-{{ $package->id }}">
                        @include('website.includes.plan-card', [
                            'package' => $package,
                            'tag' => $tag,
                            'orderTarget' => 'orderModal' . $package->id,
                        ])
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- Order modals --}}
@foreach ($packages as $package)
    @php
        $isOld = (string) old($idField) === (string) $package->id;
        $router = $isOld ? old('need_router', '1') : '1';
    @endphp
    <div class="modal fade fo-modal" id="orderModal{{ $package->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $package->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="fo-modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <small>Order your package</small>
                    <h2 id="orderModalLabel{{ $package->id }}">{{ $package->name }}</h2>
                    <div class="fo-modal-summary">
                        <span><i class="fa-solid fa-gauge-high"></i> {{ $package->bandwidth }}</span>
                        <span><i class="fa-solid fa-tag"></i> {{ is_numeric($package->price) ? number_format((float) $package->price) : $package->price }} TK</span>
                        <span><i class="fa-solid fa-layer-group"></i> {{ $tag }}</span>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route($orderRoute) }}" class="fo-form needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="{{ $idField }}" value="{{ $package->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label" for="inputName{{ $package->id }}">Full name</label>
                                <input type="text" name="name" id="inputName{{ $package->id }}" class="form-control"
                                    placeholder="Your full name" value="{{ $isOld ? old('name') : '' }}" required>
                                <span class="fo-field-error">{{ $isOld ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputEmail{{ $package->id }}">Email</label>
                                <input type="email" name="email" id="inputEmail{{ $package->id }}" class="form-control"
                                    placeholder="you@example.com" value="{{ $isOld ? old('email') : '' }}" required>
                                <span class="fo-field-error">{{ $isOld ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputPhone{{ $package->id }}">Mobile number</label>
                                <input type="tel" name="mobile" class="form-control" id="inputPhone{{ $package->id }}"
                                    placeholder="01XXXXXXXXX" value="{{ $isOld ? old('mobile') : '' }}" required
                                    pattern="^(?:\+88|01)?(?:\d{9}|\d{10})$">
                                <div class="fo-field-error" id="phoneError{{ $package->id }}"></div>
                                <span class="fo-field-error">{{ $isOld ? $errors->first('mobile') : '' }}</span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputArea{{ $package->id }}">Coverage area</label>
                                <select class="form-select" id="inputArea{{ $package->id }}" name="coverage_area">
                                    <option value="DHAKA">Dhaka</option>
                                </select>
                                <span class="fo-field-error">{{ $isOld ? $errors->first('coverage_area') : '' }}</span>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="inputAddress{{ $package->id }}">Full address / area</label>
                                <input type="text" name="address" class="form-control" id="inputAddress{{ $package->id }}"
                                    placeholder="House, road, area" value="{{ $isOld ? old('address') : '' }}" required>
                                <span class="fo-field-error">{{ $isOld ? $errors->first('address') : '' }}</span>
                            </div>
                            <div class="col-12">
                                <span class="form-label d-block">Do you need a router?</span>
                                <div class="fo-choice">
                                    <input type="radio" id="router{{ $package->id }}yes" name="need_router" value="1" {{ $router == '1' ? 'checked' : '' }}>
                                    <label for="router{{ $package->id }}yes"><i class="fa-solid fa-check"></i> Yes, I need one</label>
                                    <input type="radio" id="router{{ $package->id }}no" name="need_router" value="0" {{ $router == '0' ? 'checked' : '' }}>
                                    <label for="router{{ $package->id }}no"><i class="fa-solid fa-xmark"></i> No, I have one</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="fo-btn fo-btn-primary fo-btn-block">
                                    Place order <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@push('scripts')
    <script>
        // Bangladeshi phone number validation
        function validateBangladeshiPhone(phone) {
            phone = phone.replace(/\s+/g, '');
            const regex = /^(?:\+88|01)?(?:\d{9}|\d{10})$/;
            if (!regex.test(phone)) return false;
            if (phone.startsWith('+88')) return phone.length === 14;
            if (phone.startsWith('01')) return phone.length === 11;
            if (phone.startsWith('1')) return phone.length === 10;
            return false;
        }

        function validatePhoneInput(input, errorElement) {
            const phone = input.value.trim();
            if (phone === '') {
                errorElement.textContent = 'Phone number is required';
                input.setCustomValidity('Phone number is required');
                return false;
            }
            if (!validateBangladeshiPhone(phone)) {
                errorElement.textContent = 'Please enter a valid Bangladeshi phone number (e.g. 01XXXXXXXXX or +8801XXXXXXXXX)';
                input.setCustomValidity('Please enter a valid Bangladeshi phone number');
                return false;
            }
            errorElement.textContent = '';
            input.setCustomValidity('');
            return true;
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('input[name="mobile"]').forEach(function (input) {
                const errorElement = document.getElementById('phoneError' + input.id.replace('inputPhone', ''));
                input.addEventListener('input', function () { validatePhoneInput(input, errorElement); });
                input.addEventListener('blur', function () { validatePhoneInput(input, errorElement); });
            });

            document.querySelectorAll('.needs-validation').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    const phoneInput = form.querySelector('input[name="mobile"]');
                    const errorElement = document.getElementById('phoneError' + phoneInput.id.replace('inputPhone', ''));
                    const phoneOk = validatePhoneInput(phoneInput, errorElement);
                    if (!form.checkValidity() || !phoneOk) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            // Re-open the order form after a failed submission, or when arriving via #order-{id}
            let openId = @json($errors->any() ? old($idField) : null);
            if (!openId) {
                const match = window.location.hash.match(/^#order-(\d+)$/);
                if (match) openId = match[1];
            }
            if (openId) {
                const modalEl = document.getElementById('orderModal' + openId);
                if (modalEl) bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        });
    </script>
@endpush
