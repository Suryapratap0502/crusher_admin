@include('admin/includes/header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #f9f9f9;
        border: 1px solid #cfcfcf;
        border-radius: 4px;
        cursor: default;
        float: left;
        margin-right: 5px;
        margin-top: 5px;
        padding: 0 5px;
        color: #666;
        font-weight: 500;
        text-transform: capitalize;
    }

    .select2-container .select2-selection--multiple .select2-selection__choice__remove:hover {
        background: none !important;
    }

    .fssai {
        display: none;
    }

    .warehouse_list {
        display: none;
    }

    .other_business_type {
        display: none;
    }

    .Individual {
        display: none;
    }

    .Armed {
        display: none;
    }

    .business_details {
        display: none;
    }

    .del_list {
        display: none;
    }

    .del_desc {
        display: none;
    }

    .state_image {
        display: none;
    }

    #map {
        height: 400px;
        width: 100%;
    }
</style>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Purchase Order</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Bulk Customer Management</a>
                                </li>
                                <li class="breadcrumb-item active">Create Purchase Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="create_purchase_order" method="post" autocomplete="off">
                @csrf()
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Product Details</h5>
                            </div>
                            <div class="card-body">
                                <div id="response"></div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="purchase_order_id">Purchase Order ID<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="purchase_order_id" id="purchase_order_id" class="form-control" value="{{ $order_id }}" readonly>
                                        <span id="purchase_order_id_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company">Company<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="company" id="company" onchange="get_company_address(this.value)">
                                            <option value="" selected>Select Company</option>
                                            <option value="1">Maisha Infotech</option>
                                        </select>
                                        <span id="company_error" class="error text-danger"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="order_date">Order Date & Time<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="order_date" id="order_date" class="form-control" value="{{ $order_date }}" readonly>
                                        <span id="order_date_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="delivery_date">Delivery Date<span class="error_lable text-danger">*</span></label>
                                        <input type="date" name="delivery_date" id="delivery_date" class="form-control">
                                        <span id="delivery_date_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="order_by_person_name">Order By <small class="text-muted">(Contact Person Name)</small><span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="order_by_person_name" id="order_by_person_name" class="form-control" placeholder="Contact Person Name">
                                        <span id="order_by_person_name_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="order_by_person_contact">Order By <small class="text-muted">(Contact Person Contact)</small><span class="error_lable text-danger">*</span></label>
                                        <input type="number" name="order_by_person_contact" id="order_by_person_contact" class="form-control" placeholder="Contact Person Contact">
                                        <span id="order_by_person_contact_error" class="error"></span>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title flex-grow-1 mb-0 "></h5>
                                            <div class="flex-shrink-0">
                                                <a class="btn btn-primary btn-sm"><i class="ri-money-rupee-circle-fill align-middle me-1"></i> Total Amount - ₹ <span id="total_amount"> 0 </span>/-</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3 p-2" id="product-rows">
                                        <div class="col-md-2 mb-3">
                                            <label class="form-label" for="product_name">Product<span class="text-danger">*</span></label>
                                            <select class="form-control mb-3" name="product_name[]" id="product_name" onchange="get_product_details(this.value,'1');">
                                                <option value="" selected>Select Product</option>
                                                @if(!empty($product_data))
                                                @foreach($product_data as $val)
                                                <option value="{{ $val->product_name }}">{{ $val->product_name }}</option>
                                                @endforeach
                                                @else
                                                <option>No Product Avl</option>
                                                @endif
                                            </select>
                                            <span id="product_name_error" class="error text-danger"></span>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-label" for="crusher_name">Crusher<span class="text-danger">*</span></label>
                                            <select class="form-control mb-3 crusher_data" name="crusher_name[]" id="crusher_name_1">
                                                <option value="" selected>Select Crusher</option>
                                            </select>
                                            <span id="crusher_name_error" class="error text-danger"></span>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-label" for="product_uom">UOM<span class="error_lable text-danger">*</span></label>
                                            <input type="text" name="product_uom[]" id="product_uom_1" class="form-control" placeholder="Product UOM">
                                            <span id="product_uom_error" class="error"></span>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-label" for="product_today_price">Current Price<span class="error_lable text-danger">*</span></label>
                                            <input type="text" name="product_today_price[]" id="product_today_price_1" class="form-control" placeholder=" Today Price">
                                            <span id="product_today_price_error" class="error"></span>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label class="form-label" for="quantity">Quantity<span class="error_lable text-danger">*</span></label>
                                            <input type="text" name="quantity[]" id="quantity_1" oninput="updateTotalAmount(1);" class="form-control" placeholder="Quantity">
                                            <span id="quantity_error" class="error"></span>
                                        </div>
                                        <input type="hidden" id="product_data_json" value="{{ json_encode($product_data) }}">
                                        <input type="hidden" class="rowcount" value="" name="rowcount">
                                        <div class="col-md-2 mb-3 align-items-center d-flex mt-2">
                                            <button type="button" class="btn btn-primary w-sm" onclick="add_row();">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Shipping Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="mt-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-0">Saved Address</h5>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                                Add Address
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row gy-3">
                                        <div id="all_address">
                                            <div class="col-lg-12 col-sm-6">
                                                <div class="card ribbon-box border shadow-none mb-lg-0">
                                                    <div class="card-body text-muted">
                                                        <div class="ribbon-two ribbon-two-danger"><span>No Address</span></div>
                                                        <p class="mb-2">Please select compnay for getting address</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="fs-14 mb-3">Shipping Method</h5>

                                        <div class="row g-4">
                                            <div class="col-lg-4">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod01" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                                    <label class="form-check-label bg-transparent" for="shippingMethod01">
                                                        <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Free</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">Self Pickup</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Expected Delivery - Delivey Date</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check card-radio">
                                                    <input id="shippingMethod02" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                                    <label class="form-check-label" for="shippingMethod02">
                                                        <span class="fs-20 float-end mt-2 text-wrap d-block fw-semibold">Approx. ₹ 500/-</span>
                                                        <span class="fs-14 mb-1 text-wrap d-block">By Aggzone</span>
                                                        <span class="text-muted fw-normal text-wrap d-block">Delivery in 24hrs.</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Payment Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="tab_val_1" data-bs-toggle="collapse" data-tab="1" data-bs-target="#paymentmethodCollapse_razorpe" aria-expanded="true" aria-controls="paymentmethodCollapse_razorpe">
                                                    <div class="form-check card-radio">
                                                        <input id="paymentMethod01" name="paymentMethod" type="radio" class="form-check-input">
                                                        <label class="form-check-label bg-transparent" for="paymentMethod01">
                                                            <span class="fs-16 text-muted me-2"><i class="ri-bank-card-fill align-bottom"></i></span>
                                                            <span class="fs-14 text-wrap">Razorpe</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="tab_val_2" data-bs-toggle="collapse" data-tab="2" data-bs-target="#paymentmethodCollapse" aria-expanded="false" aria-controls="paymentmethodCollapse" class="collapsed">
                                                    <div class="form-check card-radio">
                                                        <input id="paymentMethod02" name="paymentMethod" type="radio" class="form-check-input" checked="">
                                                        <label class="form-check-label bg-transparent" for="paymentMethod02">
                                                            <span class="fs-16 text-muted me-2"><i class="ri-bank-card-fill align-bottom"></i></span>
                                                            <span class="fs-14 text-wrap">Bank Transfer</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="tab_val_3" data-bs-toggle="collapse" data-tab="3" data-bs-target="#paymentmethodCollapse.show" aria-expanded="true" aria-controls="paymentmethodCollapse">
                                                    <div class="form-check card-radio">
                                                        <input id="paymentMethod03" name="paymentMethod" type="radio" class="form-check-input">
                                                        <label class="form-check-label bg-transparent" for="paymentMethod03">
                                                            <span class="fs-16 text-muted me-2"><i class="ri-hand-coin-fill align-bottom"></i></span>
                                                            <span class="fs-14 text-wrap">Cash on Delivery</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="collapse" id="paymentmethodCollapse_razorpe">
                                            <div class="card p-4 border shadow-none mb-0 mt-4">
                                                <div class="row gy-3">
                                                    <div class="col-md-12 ">
                                                        <label for="cc-name" class="form-label">Razorpe Amount</label>
                                                        <input type="text" class="form-control" id="razorpe_submitted_amount" name="razorpe_submitted_amount" placeholder="Enter Amount">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="amount_reciept" class="form-label">Amount Reciept</label>
                                                        <input type="file" class="form-control dropify" id="razorpe_amount_reciept" name="razorpe_amount_reciept" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="collapse" id="paymentmethodCollapse">
                                            <div class="card p-4 border shadow-none mb-0 mt-4">
                                                <div class="row gy-3">
                                                    <div class="col-md-12 ">
                                                        <label for="cc-name" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" id="submitted_amount" name="submitted_amount" placeholder="Enter Amount">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="amount_reciept" class="form-label">Amount Reciept</label>
                                                        <input type="file" class="form-control dropify" id="bank_amount_reciept" name="bank_amount_reciept" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="selectedPaymentMethod" name="selectedPaymentMethod" value="">
                    <input type="hidden" id="selectedShippingAddress" name="selectedShippingAddress" value="">
                    <input type="hidden" id="total_price" name="total_price" value="">
                    <input type="hidden" id="selectedShippingMethod" name="selectedShippingMethod" value="">
                    <div class="text-end mb-3">
                        <!-- onclick="check_details()" -->
                        <input type="submit" class="btn btn-primary w-sm" value="Submit  Preview Order Details" name="submit">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div id="addAddressModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAddressModalLabel">Company Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter Company name" value="Maisha Infotech" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">Address Type</label>
                            <select class="form-select" id="state" data-choices data-choices-search-false>
                                <option value="homeAddress">Home (7am to 10pm)</option>
                                <option value="officeAddress">Office (11am to 7pm)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onchange="manual_search_loc()">
                            <label class="form-check-label" for="flexSwitchCheckChecked"><span id="search_manual_text">Search Location</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="company_search_cordinates" class="form-label">Address</label>
                            <textarea type="text" name="company_search_cordinates" id="company_search_cordinates" class="form-control" placeholder="Search Address"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="crusher_lat"><span class="change_text">Company</span> Lat<span class="text-danger">*</span></label>
                        <input type="text" name="crusher_lat" id="crusher_lat" class="form-control remove_attr" placeholder="Your Selected Latitude" readonly>
                        <span id="crusher_lat_error" class="error text-danger"></span>
                        <span class="need_help"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="crusher_long"><span class="change_text">Company</span> Long<span class="text-danger">*</span></label>
                        <input type="text" name="crusher_long" id="crusher_long" class="form-control remove_attr" placeholder="Your Selected Longitude" readonly>
                        <span id="crusher_long_error" class="error text-danger"></span>
                        <span class="need_help"></span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div id="map"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state" name="state" data-choices data-choices-search-true>
                                <option value="" selected>Select State</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Hariyana">Hariyana</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select" id="city" name="city" data-choices data-choices-search-true>
                                <option value="" selected>Select State</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Hariyana">Hariyana</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="addaddress-Name" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="addaddress-Name" placeholder="Enter phone no.">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>


@include('admin/includes/footer');

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2KE5mhINTL3jm_2rDDKgp5O3yZjSOP2U&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dropify').dropify();
</script>
<script>
    function manual_search_loc() {
        if ($('#flexSwitchCheckChecked').is(':checked')) {
            $('#search_manual_text').text('Search Location');
            $('#map').show();
            $('.remove_attr').attr('readonly', 'readonly');
            $('.need_help').html('');
        } else {
            $('#search_manual_text').text('Enter Manual Cordinates');
            $('#map').hide();
            $('.remove_attr').removeAttr('readonly');
            $('.need_help').html('<i><a href="https://support.google.com/maps/answer/18539?hl=en&co=GENIE.Platform%3DDesktop" target="_blank">Need Help?</a></i>');
        }
    }
</script>
<script>
    let map;
    let marker;

    function initMap() {
        const defaultLocation = {
            lat: 0,
            lng: 0
        };
        map = new google.maps.Map(document.getElementById('map'), {
            center: defaultLocation,
            zoom: 2,
        });
        geocoder = new google.maps.Geocoder();

        const input = document.getElementById('company_search_cordinates');
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                console.error("Returned place contains no geometry");
                return;
            }

            if (marker) {
                marker.setPosition(place.geometry.location);
            } else {
                marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                });
            }

            map.setCenter(place.geometry.location);
            map.setZoom(15);
            document.getElementById('crusher_lat').value = place.geometry.location.lat();
            document.getElementById('crusher_long').value = place.geometry.location.lng();
        });

        map.addListener('click', function(event) {
            const lat = event.latLng.lat();
            const lng = event.latLng.lng();

            if (marker) {
                marker.setPosition(event.latLng);
            } else {
                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                });
            }

            document.getElementById('crusher_lat').value = lat;
            document.getElementById('crusher_long').value = lng;
            geocodeLatLng(geocoder, lat, lng);
        });
    }

    function geocodeLatLng(geocoder, lat, lng) {
        const latlng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
        };
        geocoder.geocode({
            location: latlng
        }, (results, status) => {
            if (status === "OK") {
                if (results[0]) {
                    document.getElementById('company_search_cordinates').value = results[0].formatted_address;
                } else {
                    console.error("No results found");
                }
            } else {
                console.error("Geocoder failed due to: " + status);
            }
        });
    }

    window.onload = initMap;
</script>

<script>
    var productData = JSON.parse(document.getElementById('product_data_json').value);
    var rowcount = 1;
    $(".rowcount").val(rowcount);

    function add_row() {
        rowcount++;
        $(".rowcount").val(rowcount);

        var html = '<div class="row" id="product-rows' + rowcount + '" >';
        html += '<div class="col-md-2 mb-3">';
        html += '<label class="form-label" for="product_name' + rowcount + '">Product<span class="text-danger">*</span></label>';
        html += '<select class="form-control mb-3" name="product_name[]" id="product_name' + rowcount + '" onchange="get_product_details(this.value, ' + rowcount + ');">';
        html += '<option value="" selected>Select Product</option>';

        productData.forEach(function(product) {
            html += '<option value="' + product.product_name + '">' + product.product_name + '</option>';
        });

        html += '</select>';
        html += '<span id="product_name_error' + rowcount + '" class="error text-danger"></span>';
        html += '</div>';
        html += '<div class="col-md-2 mb-3"><label class="form-label" for="crusher_name">Crusher<span class="text-danger">*</span></label><select class="form-control mb-3" name="crusher_name[]" id="crusher_name_' + rowcount + '"><option value="" selected>Select Crusher</option><option value="Maisha">Maisha</option></select><span id="crusher_name_error" class="error text-danger"></span></div>';
        html += '<div class="col-md-2 mb-3"><label class="form-label" for="product_uom">UOM<span class="error_lable text-danger">*</span></label><input type="text" name="product_uom[]" id="product_uom_' + rowcount + '" class="form-control" placeholder="Product UOM"><span id="product_uom_error" class="error"></span></div>';
        html += '<div class="col-md-2 mb-3"><label class="form-label" for="product_today_price">Today Price<span class="error_lable text-danger">*</span></label><input type="text" name="product_today_price[]" id="product_today_price_' + rowcount + '" class="form-control" placeholder=" Today Price"><span id="product_today_price_error" class="error"></span></div>';
        html += '<div class="col-md-2 mb-3"><label class="form-label" for="quantity">Quantity<span class="error_lable text-danger">*</span></label><input type="text" name="quantity[]" id="quantity_' + rowcount + '" onchange="updateTotalAmount(' + rowcount + ');" class="form-control" placeholder="Quantity"><span id="quantity_error" class="error"></span></div>';
        html += '<div class="col-md-2 mb-3 align-items-center d-flex mt-2"> <button type="button" onclick="removerow(' + rowcount + ');" class="btn btn-danger wave-effect wave-light shadow-none">Remove</button></div></div></div>';

        $('#product-rows').append(html);


    }

    function removerow(product) {
        $('#product-rows' + product).remove();
        updateTotalAmount(product);
    }
</script>

<script>
    function get_product_details(val, rowcount) {
        $.ajax({
            url: "{{ url('bulk_management/get_product_data') }}",
            type: 'post',
            data: {
                val: val
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#product_uom_' + rowcount).val(response.uom);
                $('#product_today_price_' + rowcount).val(response.today_price);
            }
        })
    }
</script>
<script>
    function updateTotalAmount(rowId) {
        let totalAmount = 0;

        if (rowId) {
            const price = parseFloat($('#product_today_price_' + rowId).val()) || 0;
            const quantity = parseFloat($('#quantity_' + rowId).val()) || 0;
            totalAmount += price * quantity;

            $('#product-rows' + rowId).each(function() {
                const price = parseFloat($(this).find("[id^=product_today_price_" + rowId + "]").val()) || 0;
                const quantity = parseFloat($(this).find("[id^=quantity_" + rowId + "]").val()) || 0;
                totalAmount += price * quantity;
            });
        }
        $('#total_amount').text(totalAmount.toFixed(2));
        $('#total_price').val(totalAmount.toFixed(2));
    }
</script>

<script>
    function check_details() {
        window.location.href = "{{ url('bulk_management/submit_n_preview') }}";
    }

    function get_company_address(val) {
        $.ajax({
            url: "{{ url('bulk_management/get_company_address') }}",
            type: 'post',
            data: {
                val: val
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#all_address').html(response)
            }
        })
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]');
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                document.getElementById('selectedPaymentMethod').value = this.id;
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const shippingMethods = document.querySelectorAll('input[name="shippingMethod"]');
        shippingMethods.forEach(method => {
            method.addEventListener('change', function() {
                document.getElementById('selectedShippingMethod').value = this.id;
            });
        });
    });
</script>