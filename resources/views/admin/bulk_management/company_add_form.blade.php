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
                        <h4 class="mb-sm-0">Add Company</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Bulk Customer Management</a>
                                </li>
                                <li class="breadcrumb-item active">Add Company</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <form id="add_company" method="post" autocomplete="off">
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
                                        <label class="form-label" for="company_name">Company Name<span class="text-danger">*</span></label>
                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name">
                                        <span id="company_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_email">Company Email<span class="text-danger">*</span></label>
                                        <input type="email" name="company_email" id="company_email" class="form-control" placeholder="Enter Company Email">
                                        <span id="company_email_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_contact">Company Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="company_contact" id="company_contact" class="form-control" placeholder="Enter Company Contact">
                                        <span id="company_contact_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="pan">Company PAN No.<span class="error_lable text-danger">*</span></label>
                                        <input type="text" name="pan" id="pan" class="form-control" placeholder="Enter PAN">
                                        <span id="pan_error" class="error"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_pan">Upload Company PAN</label>
                                        <input type="file" name="company_pan" id="company_pan" class="form-control">
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
                                        <label class="form-label" for="contact_per_name">Contact Person Name<span class="text-danger">*</span></label>
                                        <input type="text" name="contact_per_name" id="contact_per_name" class="form-control" placeholder="Enter Contact Person Name">
                                        <span id="contact_per_name_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="contact_per_no">Contact Person Contact<span class="text-danger">*</span></label>
                                        <input type="number" name="contact_per_no" id="contact_per_no" class="form-control" placeholder="Enter Contact Person Contact">
                                        <span id="contact_per_no_error" class="error text-danger"></span>
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
                                <h5 class="card-title mb-0">Company Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_type">Company Type<span class="text-danger">*</span></label>
                                        <input type="text" name="company_type" id="company_type" class="form-control" placeholder="Enter Company type">
                                        <span id="company_type_error" class="error text-danger"></span>
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
                                        <label class="form-label" for="gstin"><span class="change_text">Company</span> GSTIN<span class="text-danger">*</span></label>
                                        <input type="text" name="gstin" id="gstin" class="form-control" placeholder="Enter GSTIN">
                                        <span id="gstin_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_gst"><span class="change_text">Company</span> Upload GST</label>
                                        <input type="file" name="company_gst" id="company_gst" class="form-control" >
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_pan_no"><span class="change_text">Company</span> PAN No.</label>
                                        <input type="text" name="company_pan_no" id="company_pan_no" class="form-control" placeholder="Enter PAN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_pan"><span class="change_text">Company</span> Upload PAN</label>
                                        <input type="file" name="company_pan" id="company_pan" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_msme_ssi_no"><span class="change_text">Company</span> MSME/SSI No.</label>
                                        <input type="text" name="company_msme_ssi_no" id="company_msme_ssi_no" class="form-control" placeholder="Enter MSME/SSI No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_msme_ssi"><span class="change_text">Company</span> Upload MSME/SSI</label>
                                        <input type="file" name="company_msme_ssi" id="company_msme_ssi" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_cin_no"><span class="change_text">Company</span> CIN No.</label>
                                        <input type="text" name="company_cin_no" id="company_cin_no" class="form-control" placeholder="Enter CIN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_cin"><span class="change_text">Company</span> Upload CIN</label>
                                        <input type="file" name="company_cin" id="company_cin" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_tan_no"><span class="change_text">Company</span> TAN No.</label>
                                        <input type="text" name="company_tan_no" id="company_tan_no" class="form-control" placeholder="Enter TAN No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_tan"><span class="change_text">Company</span> Upload TAN</label>
                                        <input type="file" name="company_tan" id="company_tan" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_udyog_adhar_no"><span class="change_text">Company</span> Udyog Aadhaar No.</label>
                                        <input type="text" name="company_udyog_adhar_no" id="company_udyog_adhar_no" class="form-control" placeholder="Enter Udyog Aadhaar No.">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="company_udyog_aadhar"><span class="change_text">Company</span> Upload Udyog Aadhaar</label>
                                        <input type="file" name="company_udyog_aadhar" id="company_udyog_aadhar" class="form-control">
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
                                        <label class="form-label" for="company_address"><span class="change_text">Company</span> Address<span class="text-danger">*</span></label>
                                        <textarea type="text" name="company_address" id="company_address" class="form-control" placeholder="Enter Crusher Address"></textarea>
                                        <span id="company_address_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked onchange="manual_search_loc()">
                                            <label class="form-check-label" for="flexSwitchCheckChecked"><span id="search_manual_text">Search Location</span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="company_search_cordinates">Search Location For Cordinates<span class="text-danger">*</span></label>
                                        <textarea type="text" name="company_search_cordinates" id="company_search_cordinates" class="form-control" placeholder="Search Address"></textarea>
                                        <span id="company_search_cordinates_error" class="error text-danger"></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div id="map"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="comopany_lat"><span class="change_text">Company</span> Lat<span class="text-danger">*</span></label>
                                        <input type="text" name="comopany_lat" id="comopany_lat" class="form-control remove_attr" placeholder="Your Selected Latitude" readonly>
                                        <span id="comopany_lat_error" class="error text-danger"></span>
                                        <span class="need_help"></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="comopany_long"><span class="change_text">Company</span> Long<span class="text-danger">*</span></label>
                                        <input type="text" name="comopany_long" id="comopany_long" class="form-control remove_attr" placeholder="Your Selected Longitude" readonly>
                                        <span id="comopany_long_error" class="error text-danger"></span>
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
