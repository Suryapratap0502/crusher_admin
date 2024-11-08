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
                        <h4 class="mb-sm-0">Add Crusher</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Crusher Management</a>
                                </li>
                                <li class="breadcrumb-item active">Add Crusher</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="add_crusher" method="post" autocomplete="off">
                @csrf()
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Personal Perticulars</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="owner_name">Owner Name<span class="text-danger">*</span></label>
                                        <input type="text" name="owner_name" id="owner_name" class="form-control" placeholder="Enter Owner Name">
                                        <span id="owner_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="owner_email">Owner Email<span class="text-danger">*</span></label>
                                        <input type="email" name="owner_email" id="owner_email" class="form-control" placeholder="Enter Owner Email">
                                        <span id="owner_email_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="owner_contact">Owner Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="owner_contact" id="owner_contact" class="form-control" placeholder="Enter Owner Contact">
                                        <span id="owner_contact_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="pan">PAN No.<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="pan" id="pan" class="form-control" placeholder="Enter PAN">
                                        <span id="pan_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="owner_pan">Upload Owner PAN</label>
                                        <input type="file" name="owner_pan" id="owner_pan" class="form-control" placeholder="Enter PAN">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="aadhar_no">Aadhar No.<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="aadhar_no" id="aadhar_no" class="form-control" placeholder="Enter Aadhar Number">
                                        <span id="aadhar_no_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="owner_aadhar">Upload Owner Aadhar</label>
                                        <input type="file" name="owner_aadhar" id="owner_aadhar" class="form-control" placeholder="Enter PAN">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="clerk_name">Munshi Name<span class="text-danger">*</span></label>
                                        <input type="text" name="clerk_name" id="clerk_name" class="form-control" placeholder="Enter Clerk Name">
                                        <span id="clerk_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="clerk_contact">Munshi Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="clerk_contact" id="clerk_contact" class="form-control" placeholder="Enter Clerk Contact">
                                        <span id="clerk_contact_error" class="error text-danger"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="weight_person_name">Weight Bridge Person Name<span class="text-danger">*</span></label>
                                        <input type="text" name="weight_person_name" id="weight_person_name" class="form-control" placeholder="Weight Bridge Person Name">
                                        <span id="weight_person_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="weight_person_contact">Weight Bridge Person Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="weight_person_contact" id="weight_person_contact" class="form-control" placeholder="Weight Bridge Person Contact">
                                        <span id="weight_person_contact_error" class="error text-danger"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="accountant_name">Accountant Name<span class="text-danger">*</span></label>
                                        <input type="text" name="accountant_name" id="accountant_name" class="form-control" placeholder="Accountant Name">
                                        <span id="accountant_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="accountant_contact">Accountant Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="accountant_contact" id="accountant_contact" class="form-control" placeholder="Accountant Contact">
                                        <span id="accountant_contact_error" class="error text-danger"></span>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Crusher Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_type">Type<span class="text-danger">*</span></label>
                                        <select class="form-control mb-3" name="crusher_type" id="crusher_type" onchange="change_type(this.value)">
                                            <option value="Crusher Zone" selected>Crusher Zone</option>
                                            <option value="Stock">Stock</option>
                                        </select>
                                        <span id="crusher_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_name"><span class="change_text">Crusher</span> Name<span class="text-danger">*</span></label>
                                        <input type="text" name="crusher_name" id="crusher_name" class="form-control" placeholder="Enter Crusher Name">
                                        <span id="crusher_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3 hide_div">
                                        <label class="form-label" for="license_no">License No. <i class="fs-10">(Optional)</i></label>
                                        <input type="text" name="license_no" id="license_no" class="form-control" placeholder="Enter License No">
                                    </div>
                                    <div class="col-md-3 mb-3 hide_div">
                                        <label class="form-label" for="license_issue_date">License Issue Date<span class="text-danger">*</span></label>
                                        <input type="date" name="license_issue_date" id="license_issue_date" class="form-control">
                                        <span id="license_issue_date_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3 hide_div">
                                        <label class="form-label" for="license_exp_date">License Expiry Date<span class="text-danger">*</span></label>
                                        <input type="date" name="license_exp_date" id="license_exp_date" class="form-control">
                                        <span id="license_exp_date_error" class="error text-danger"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="gstin"><span class="change_text">Crusher</span> GSTIN<span class="text-danger">*</span></label>
                                        <input type="text" name="gstin" id="gstin" class="form-control" placeholder="Enter GSTIN">
                                        <span id="gstin_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_gst"><span class="change_text">Crusher</span> Upload GST</label>
                                        <input type="file" name="crusher_gst" id="crusher_gst" class="form-control" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_pan_no"><span class="change_text">Crusher</span> PAN No.</label>
                                        <input type="text" name="crusher_pan_no" id="crusher_pan_no" class="form-control" placeholder="Enter PAN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_pan"><span class="change_text">Crusher</span> Upload PAN</label>
                                        <input type="file" name="crusher_pan" id="crusher_pan" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_msme_ssi_no"><span class="change_text">Crusher</span> MSME/SSI No.</label>
                                        <input type="text" name="crusher_msme_ssi_no" id="crusher_msme_ssi_no" class="form-control" placeholder="Enter MSME/SSI No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_msme_ssi"><span class="change_text">Crusher</span> Upload MSME/SSI</label>
                                        <input type="file" name="crusher_msme_ssi" id="crusher_msme_ssi" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_cin_no"><span class="change_text">Crusher</span> CIN No.</label>
                                        <input type="text" name="crusher_cin_no" id="crusher_cin_no" class="form-control" placeholder="Enter CIN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_cin"><span class="change_text">Crusher</span> Upload CIN</label>
                                        <input type="file" name="crusher_cin" id="crusher_cin" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_tan_no"><span class="change_text">Crusher</span> TAN No.</label>
                                        <input type="text" name="crusher_tan_no" id="crusher_tan_no" class="form-control" placeholder="Enter TAN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_tan"><span class="change_text">Crusher</span> Upload TAN</label>
                                        <input type="file" name="crusher_tan" id="crusher_tan" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_udyog_adhar_no"><span class="change_text">Crusher</span> Udyog Aadhaar No.</label>
                                        <input type="text" name="crusher_udyog_adhar_no" id="crusher_udyog_adhar_no" class="form-control" placeholder="Enter Udyog Aadhaar No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="crusher_udyog_aadhar"><span class="change_text">Crusher</span> Upload Udyog Aadhaar</label>
                                        <input type="file" name="crusher_udyog_aadhar" id="crusher_udyog_aadhar" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="state">State<span class="error_lable text-danger">*</span></label>
                                        <select name="state" id="state" class="form-control" onchange="get_city(this.value)">
                                            <option value="" selected>Select</option>
                                            @if(!empty($state))
                                            @foreach($state as $state_val)
                                            <option value="{{$state_val->id}}">{{$state_val->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span id="state_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="city">City<span class="error_lable text-danger">*</span></label>
                                        <select name="city" id="city" class="form-control city">

                                        </select>
                                        <span id="city_error" class="error"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="crusher_address"><span class="change_text">Crusher</span> Address<span class="text-danger">*</span></label>
                                        <textarea type="text" name="crusher_address" id="crusher_address" class="form-control" placeholder="Enter Crusher Address"></textarea>
                                        <span id="crusher_address_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onchange="manual_search_loc()">
                                            <label class="form-check-label" for="flexSwitchCheckChecked"><span id="search_manual_text">Search Location</span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="crusher_search_cordinates">Search Location For Cordinates<span class="text-danger">*</span></label>
                                        <textarea type="text" name="crusher_search_cordinates" id="crusher_search_cordinates" class="form-control" placeholder="Search Address"></textarea>
                                        <span id="crusher_search_cordinates_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div id="map"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="crusher_lat"><span class="change_text">Crusher</span> Lat<span class="text-danger">*</span></label>
                                        <input type="text" name="crusher_lat" id="crusher_lat" class="form-control remove_attr" placeholder="Your Selected Latitude" readonly>
                                        <span id="crusher_lat_error" class="error text-danger"></span>
                                        <span class="need_help"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="crusher_long"><span class="change_text">Crusher</span> Long<span class="text-danger">*</span></label>
                                        <input type="text" name="crusher_long" id="crusher_long" class="form-control remove_attr" placeholder="Your Selected Longitude" readonly>
                                        <span id="crusher_long_error" class="error text-danger"></span>
                                        <span class="need_help"></span>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Bank Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="bank_name">Bank Name<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name">
                                        <span id="bank_name_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="branch_name">Branch Name<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name">
                                        <span id="branch_name_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="bank_holder_name">Bank Holder Name<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="bank_holder_name" id="bank_holder_name" class="form-control" placeholder="Enter Bank Holder Name">
                                        <span id="bank_holder_name_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="ac_no">Account Number<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="ac_no" id="ac_no" class="form-control" placeholder="Enter Bank A/C Number">
                                        <span id="ac_no_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="ifsc">IFSC Code<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="Enter IFSC Code">
                                        <span id="ifsc_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="upi_id">UPI ID<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="upi_id" id="upi_id" class="form-control" placeholder="Enter UPI Id">
                                        <span id="upi_id_error" class="error"></span>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="cancel_cheque">Upload Cancel Cheque<span class="error_lable text-danger">*</span></label>
                                        <input type="file" name="cancel_cheque" id="cancel_cheque" class="form-control" placeholder="Enter UPI Id">
                                        <span id="cancel_cheque_error" class="error"></span>
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
        }else{
            $('.change_text').text('Crusher');
            $('.hide_div').show();
        }
    }
</script>