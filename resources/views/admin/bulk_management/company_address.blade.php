<div class="row">
    @if(!empty($company_address))
    @foreach($company_address as $val)
    <div class="col-lg-4 col-sm-6">
        <div class="form-check card-radio">
        <input id="shippingAddress01_{{ $val->id }}" name="shippingAddress" type="radio" class="form-check-input" onclick="handleShippingAddressSelection(this)" value="{{ $val->id }}">
            <label class="form-check-label bg-transparent" for="shippingAddress01_{{ $val->id }}">
                <span class="mb-4 fw-semibold d-block text-muted text-uppercase">{{ $val->address_type }} Address</span>

                <span class="fs-14 mb-2 d-block">{{ $val->address_status }}</span>
                <span class="text-muted fw-normal text-wrap mb-1 d-block">{{ $val->address }}</span>
                <span class="text-muted fw-normal d-block">Mo. {{ $val->contact }}</span>
            </label>
        </div>
        <div class="d-flex align-items-center flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1" style="justify-content: space-between;">
            <div>
                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="ri-pencil-fill text-muted align-bottom me-1"></i> Edit</a>
            </div>
            <div>
                <a href="#" class="d-block text-body p-1 px-2" data-bs-toggle="modal" data-bs-target="#removeItemModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove</a>
            </div>
        </div>
    </div>

    @endforeach
    @else
    <div class="col-lg-12 col-sm-6">
        <div class="card ribbon-box border shadow-none mb-lg-0">
            <div class="card-body text-muted">
                <div class="ribbon-two ribbon-two-danger"><span>No Address</span></div>
                <p class="mb-2">Please select compnay for getting address</p>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressRadios = document.querySelectorAll('input[name="shippingAddress"]');

        addressRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('selectedAddressId').value = this.id;
            });
        });
    });
</script>