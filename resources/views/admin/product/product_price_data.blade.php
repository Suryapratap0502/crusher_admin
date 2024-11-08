<div id="response_edit"></div>
@if(!empty($data_for_update) && $data_for_update->count() > 0)
@foreach($data_for_update as $val)
<form id="update_pro_price_{{ $val->id }}" class="mt-3" method="post">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-3">
            <label for="size">Product</label>
            <input type="text" name="name_{{ $val->id }}" id="name_{{ $val->id }}" value="{{ $val->product_name }}" class="form-control" readonly>
        </div>
        <div class="col-lg-3 d-flex flex-column">
            <label for="size">Size</label>
            <input type="text" name="size_{{ $val->id }}" id="size_{{ $val->id }}" value="{{ $val->product_size }}" class="form-control" readonly>
        </div>
        <div class="col-lg-3 d-flex flex-column">
            <label for="price">Price</label>
            <input type="text" name="price_{{ $val->id }}" id="price_{{ $val->id }}" value="{{ $val->product_price }}" class="form-control">
        </div>
        <div class="col-lg-1 form-check form-switch form-switch-custom form-switch-primary">
            <br>
            <input class="form-check-input in_stock_{{ $val->id }}" type="checkbox" name="in_stock_{{ $val->id }}" role="switch" id="SwitchCheck9" checked>
        </div>
        <input type="hidden" id="id" name="id" value="{{ $val->id }}">
        <div class="col-lg-2 d-flex flex-column btn-seacrh">
            <input type="button" class="btn btn-primary" name="submit_{{ $val->id }}" id="submit_{{ $val->id }}" value="Update" onclick="check('{{ $val->id }}')">
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    function get_latest_log() {
        $.ajax({
            url: "{{ url('product/get_latest_log') }}",
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#log_data').html(response)
            }
        })
    }

    function check(id) {
        var price = $('#price_' + id).val();
        let inStock = $('.in_stock_' + id).is(':checked') ? 'Yes' : 'No';
        $.ajax({
            url: "{{ url('product/update_pro_price') }}",
            type: 'post',
            data: {
                id: id,
                price: price,
                inStock: inStock
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $(".text-replace").val('Processing.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function(result) {
                if (result.code == 200) {
                    $('#response_edit').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' + result.message + '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                    // show_products(crusher_zone_id);
                    get_latest_log();
                } else if (result.code == 401) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function(prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 400) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $('#response_edit').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' + result.message + '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function(xhr) {
                $(".text-replace").css('display', 'block');
            },
            complete: function() {
                $(".text-replace").css('display', 'block');
            },
        })
    }
</script>
@endforeach
@else
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>No Product Found For Selected Crusher,Select another one</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif