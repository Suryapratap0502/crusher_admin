@include('admin/includes/header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
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
                        <h4 class="mb-sm-0">Add Vehicle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Vehicle Management</a>
                                </li>
                                <li class="breadcrumb-item active">Add Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form id="add_crusher" method="post" autocomplete="off">
                @csrf()
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Basic Vehicle Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="vehicle_type">Vehicle Type<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="vehicle_type" id="vehicle_type">
                                            <option value="" selected>Select Type</option>
                                            <option value="Tipper">Tipper</option>
                                            <option value="Dumper">Dumper</option>
                                            <option value="Trolla">Trolla</option>
                                        </select>
                                        <span id="vehicle_type_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="vehicle_model">Vehicle Model<span class="text-danger">*</span></label>
                                        <input type="text" name="vehicle_model" id="vehicle_model" class="form-control" placeholder="Enter Vehicle Model">
                                        <span id="vehicle_model_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="vehicle_no">Vehicle No./License No.<span class="text-danger">*</span></label>
                                        <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Enter Vehicle No./License No.">
                                        <span id="vehicle_no_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="vehicle_manufacturer">Vehicle Manufacturer<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="vehicle_manufacturer" id="vehicle_manufacturer" class="form-control" placeholder="Enter Vehicle Manufacturer">
                                        <span id="vehicle_manufacturer_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="load_capacity">Vehicle Load Capacity <span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="load_capacity" id="load_capacity" class="form-control" placeholder="Enter Vehicle Load Capacity">
                                        <span id="load_capacity_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="engine_capacity">Vehicle Engine Capacity <span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="engine_capacity" id="engine_capacity" class="form-control" placeholder="Enter Vehicle Engine Capacity">
                                        <span id="engine_capacity_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="vehicle_image">Upload Image</label>
                                        <input type="file" name="vehicle_image" id="vehicle_image" class="form-control" placeholder="Enter PAN">
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Vehicle Specification</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="chassis_no">Chassis No.<span class="text-danger">*</span></label>
                                        <input type="text" name="chassis_no" id="chassis_no" class="form-control" placeholder="Enter Chassis No.">
                                        <span id="chassis_no_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="fuel_type">Fuel Type<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="fuel_type" id="fuel_type">
                                            <option value="" selected>Select Type</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Petrol">Petrol</option>
                                        </select>
                                        <span id="fuel_type_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="fuel_tank_capacity">Fuel Tank Capacity<span class="text-danger">*</span></label>
                                        <input type="text" name="fuel_tank_capacity" id="fuel_tank_capacity" class="form-control" placeholder="Enter Fuel Tank Capacity">
                                        <span id="fuel_tank_capacity_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="max_load">Maximum Load(kgs/tons)<span class="text-danger">*</span></label>
                                        <input type="text" name="max_load" id="max_load" class="form-control" placeholder="Enter Maximum Load(kgs/tons)">
                                        <span id="max_load_error" class="error text-danger"></span>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Registration & Insurance Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="reg_date">Registraion Date<span class="error_lable text-danger">*</span></label>
                                        <input type="date" name="reg_date" id="reg_date" class="form-control" placeholder="Enter Registraion Date">
                                        <span id="reg_date_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="insurance_exp_date">Insurance Exp. Date<span class="error_lable text-danger">*</span></label>
                                        <input type="date" name="insurance_exp_date" id="insurance_exp_date" class="form-control" placeholder="Enter Insurance Exp. Date">
                                        <span id="insurance_exp_date_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="permit_exp_date">Permit Exp. Date<span class="error_lable text-danger">*</span></label>
                                        <input type="date" name="permit_exp_date" id="permit_exp_date" class="form-control" placeholder="Enter Insurance Exp. Date">
                                        <span id="permit_exp_date_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="road_tax_validity">Road Tax Validity<span class="error_lable text-danger">*</span></label>
                                        <input type="date" name="road_tax_validity" id="road_tax_validity" class="form-control" placeholder="Enter Insurance Exp. Date">
                                        <span id="road_tax_validity_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="current_mileage">Current Mileage<span class="text-danger">*</span></label>
                                        <input type="text" name="current_mileage" id="current_mileage" class="form-control" placeholder="Enter Current Mileage">
                                        <span id="current_mileage_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="service_record">Service Record </label>
                                        <input type="file" name="service_record" id="service_record" class="form-control" placeholder="Enter PAN">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="comment">Comment<span class="text-danger">*</span></label>
                                        <input type="text" name="comment" id="comment" class="form-control" placeholder="Enter Comment">
                                        <span id="comment_error" class="error text-danger"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <input type="submit" class="btn btn-primary w-sm" value="Submit" name="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- container-fluid -->
    </div>
</div>


@include('admin/includes/footer');
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Select an option",
        });
    });
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2KE5mhINTL3jm_2rDDKgp5O3yZjSOP2U&libraries=places"></script>
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

        const input = document.getElementById('crusher_search_cordinates');
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
                    // Update the location-search input with the formatted address
                    document.getElementById('crusher_search_cordinates').value = results[0].formatted_address;
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
    change_type('Crusher');

    function change_type(val) {
        if (val == 'Stock') {
            $('.change_text').text('Stock');
            $('.hide_div').hide();
        } else {
            $('.change_text').text('Crusher');
            $('.hide_div').show();
        }
    }
</script>