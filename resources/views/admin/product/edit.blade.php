<form id="product_edit">
    @csrf
    @if(getuserdetail('id') == 1)
    @php
    $get_state = App\Models\CrusherZoneModel::where('flag', '!=', '2')->distinct('state')->pluck('state');
    @endphp
    <div class="row">
        <div class="col-md-6">
            <label for="product_state" class="form-label">Select State <b class="text-danger">*</b></label>
            <select class="form-control mb-3" name="product_state" id="product_state_edit" onchange="get_city_2(this.value)">
                @if($get_state->isNotEmpty())
                <option value="" selected>Select State</option>
                @foreach($get_state as $state_id)
                @php
                $get_state_name = App\Models\StateModel::find($state_id);
                @endphp
                @if($get_state_name)
                <option value="{{ $get_state_name->id }}">{{ $get_state_name->name }}</option>
                @endif
                @endforeach
                @else
                <option value="" selected>No Zone Available</option>
                @endif
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label" for="city">Select City<span class="error_label text-danger">*</span></label>
            <select name="city" id="city" class="form-control city" onchange="get_zone_edit(this.value)">
                <option value="" {{ empty($product_data->city) ? 'selected' : '' }}>Select City</option>
            </select>
            <span id="city_error" class="error"></span>
        </div>

        <div class="col-md-6 mb-3">
            <label for="cursher_zone" class="form-label">Select Zone <b class="text-danger">*</b></label>
            <select class="form-control mb-3 zone" name="cursher_zone">
            </select>
        </div>
        @endif

        <div class="col-md-6 mb-3">
            <label for="product_category" class="form-label">Product Category <b class="text-danger">*</b></label>
            <select class="form-control" name="product_category">
                @if(!empty($category_list))
                <option value="" {{ empty($product_data->product_category) ? 'selected' : '' }}>Select Category</option>
                @foreach($category_list as $val)
                <option value="{{ $val->id }}"
                    {{ $product_data->product_category == $val->id ? 'selected' : '' }}>
                    {{ $val->name }}
                </option>
                @endforeach
                @else
                <option value="" selected>No Category Available</option>
                @endif
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="product_name" class="form-label">Product Name <b class="text-danger">*</b></label>
            <input type="text" id="product_name" name="product_name" class="form-control"
                value="{{ old('product_name', $product_data->product_name ?? '') }}"
                placeholder="Enter Product Name" required />
            <span id="product_name_error" class="error"></span>
        </div>

        <div class="col-md-6">
            <label for="product_size" class="form-label">UOM (Unit of measurement) <b class="text-danger">*</b></label>
            <select class="form-control" name="product_size">
                <option value="" {{ empty($product_data->product_size) ? 'selected' : '' }}>Select UOM</option>
                <option value="Metric Ton (MT)" {{ $product_data->product_size == 'Metric Ton (MT)' ? 'selected' : '' }}>Metric Ton (MT)</option>
                <option value="Feet" {{ $product_data->product_size == 'Feet' ? 'selected' : '' }}>Feet</option>
                <option value="Brass" {{ $product_data->product_size == 'Brass' ? 'selected' : '' }}>Brass</option>
                <option value="Cubic Meter" {{ $product_data->product_size == 'Cubic Meter' ? 'selected' : '' }}>Cubic Meter</option>
            </select>
            <span id="product_size_error" class="error"></span>
        </div>

        <div class="col-md-6 mb-3">
            <label for="product_price" class="form-label">Product Price <b class="text-danger">*</b></label>
            <input type="number" id="product_price" name="product_price" class="form-control"
                value="{{ old('product_price', $product_data->product_price ?? '') }}"
                placeholder="Enter Product Price" required />
            <span id="product_price_error" class="error"></span>
        </div>

        <div class="col-md-6 mb-3">
            <label for="status-field" class="form-label">Status <b class="text-danger">*</b></label>
            <select class="form-control mb-3" name="status">
                <option value="1" {{ $product_data->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $product_data->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <input type="hidden" name="id" id="id" value="{{ $product_data->id }}">

    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Save">
        </div>
    </div>
</form>
<script>
    function get_zone_edit(city_id) {
        var state_id = $('#product_state_edit').val();
        
        $.ajax({
            url: base_url + 'common_action/get_zone',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                city_id: city_id,
                state_id: state_id
            },
            success: function(response) {
                var result = JSON.parse(response)
                $('.zone').html(result.output)
            },
            error: function() {
                alert('Fail')
            }
        })
    }
</script>