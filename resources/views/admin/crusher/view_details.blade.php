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
                        <h4 class="mb-sm-0">View Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Crusher Management</a>
                                </li>
                                <li class="breadcrumb-item active">View Crusher</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item active show" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#home" role="tab" aria-selected="false" tabindex="-1">
                                        Personal Perticulars
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#product1" role="tab" aria-selected="false" tabindex="-1">
                                        Crusher Details
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false" tabindex="-1">
                                        Bank Details
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active show" id="home" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Owner Name</th>
                                                    <td>{{ $get_crusher_data->owner_name }}</td>
                                                    <th scope="row" style="width: 200px;">Owner Email</th>
                                                    <td>{{ $get_crusher_data->owner_email }}</td>
                                                    <th scope="row" style="width: 200px;">Owner Contact</th>
                                                    <td>{{ $get_crusher_data->owner_contact }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Owner PAN</th>
                                                    <td>{{ $get_crusher_data->owner_pan }}</td>
                                                    <th scope="row" style="width: 200px;">Owner Aadhar</th>
                                                    <td>{{ $get_crusher_data->owner_aadhar_no }}</td>
                                                    <th scope="row" style="width: 200px;"></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Munshi Name</th>
                                                    <td>{{ $get_crusher_data->munshi_name }}</td>
                                                    <th scope="row" style="width: 200px;">Munshi Contact</th>
                                                    <td>{{ $get_crusher_data->munshi_contact }}</td>
                                                    <th scope="row" style="width: 200px;"></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">WB Person Name</th>
                                                    <td>{{ $get_crusher_data->weight_bridge_person_name }}</td>
                                                    <th scope="row" style="width: 200px;">WB Person Contact</th>
                                                    <td>{{ $get_crusher_data->weight_bridge_person_contact }}</td>
                                                    <th scope="row" style="width: 200px;"></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Accountant Name</th>
                                                    <td>{{ $get_crusher_data->accountant_name }}</td>
                                                    <th scope="row" style="width: 200px;">Accountant Contact</th>
                                                    <td>{{ $get_crusher_data->accountant_contact }}</td>
                                                    <th scope="row" style="width: 200px;"></th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Owner Pan</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <a href="{{ asset('upload/crusher/docs/' . $get_crusher_data->owner_upload_pan) }}" target="_blank"><img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->owner_upload_pan) }}" alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <th scope="row" style="width: 200px;">Owner Adhar</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <a href="{{ asset('upload/crusher/docs/' . $get_crusher_data->owner_upload_aadhar) }}" target="_blank"><img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->owner_upload_aadhar) }}" alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <th scope="row" style="width: 200px;"></th>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane" id="product1" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Crusher Type</th>
                                                    <td>{{ $get_crusher_data->crusher_type }}</td>
                                                    <th scope="row" style="width: 200px;">Crusher Name</th>
                                                    <td>{{ $get_crusher_data->name }}</td>
                                                    <th scope="row" style="width: 200px;">License No.</th>
                                                    <td>{{ $get_crusher_data->license_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">License Issue Date</th>
                                                    <td>{{ $get_crusher_data->license_issue_date }}</td>
                                                    <th scope="row" style="width: 200px;">License Expiry Date</th>
                                                    <td>{{ $get_crusher_data->license_exp_date }}</td>
                                                    <th scope="row" style="width: 200px;">Crusher GSTIN</th>
                                                    <td>{{ $get_crusher_data->gst_in }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">State</th>
                                                    <td>{{ $get_crusher_data->state }}</td>
                                                    <th scope="row" style="width: 200px;">City</th>
                                                    <td>{{ $get_crusher_data->city }}</td>
                                                    <th scope="row" style="width: 200px;">Address</th>
                                                    <td>{{ $get_crusher_data->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 200px;">Search Location For Cordinates</th>
                                                    <td>{{ $get_crusher_data->search_location }}</td>
                                                    <th scope="row" style="width: 200px;">Latitude</th>
                                                    <td>{{ $get_crusher_data->crusher_lat }}</td>
                                                    <th scope="row" style="width: 200px;">Longitude</th>
                                                    <td>{{ $get_crusher_data->crusher_long }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="map"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    @if(!empty($get_crusher_data->upload_gst))
                                                    <th scope="row" style="width: 200px;">Crusher GST</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->upload_gst) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if(!empty($get_crusher_data->crusher_upload_pan))
                                                    <th scope="row" style="width: 200px;">Crusher PAN</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->crusher_upload_pan) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if(!empty($get_crusher_data->crusher_upload_msme))
                                                    <th scope="row" style="width: 200px;">Crusher MSME</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->crusher_upload_msme) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    @if(!empty($get_crusher_data->crusher_upload_cin))
                                                    <th scope="row" style="width: 200px;">Crusher CIN</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->crusher_upload_cin) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if(!empty($get_crusher_data->crusher_upload_tan))
                                                    <th scope="row" style="width: 200px;">Crusher TAN</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->crusher_upload_tan) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if(!empty($get_crusher_data->crusher_upload_udyog_aadhar))
                                                    <th scope="row" style="width: 200px;">Crusher Udyog Aadhar</th>
                                                    <td>
                                                        <div class="avatar-lg bg-light rounded p-1">
                                                            <img src="{{ asset('upload/crusher/docs/' . $get_crusher_data->crusher_upload_udyog_aadhar) }}" alt="" class="img-fluid d-block">
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 200px;">Bank Name</th>
                                                <td>{{ $get_crusher_data->bank_name }}</td>
                                                <th scope="row" style="width: 200px;">Branch Name</th>
                                                <td>{{ $get_crusher_data->branch_name }}</td>
                                                <th scope="row" style="width: 200px;">Bank Holder Name</th>
                                                <td>{{ $get_crusher_data->acc_holder_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 200px;">Account Number</th>
                                                <td>{{ $get_crusher_data->account_no }}</td>
                                                <th scope="row" style="width: 200px;">IFSC Code</th>
                                                <td>{{ $get_crusher_data->ifsc }}</td>
                                                <th scope="row" style="width: 200px;">UPI ID</th>
                                                <td>{{ $get_crusher_data->upi_id }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 200px;">Upload Cancel Cheque</th>
                                                <td>{{ $get_crusher_data->cancel_cheque }}
                                                    <img src="assets/images/small/img-2.jpg" class="rounded img-fluid" style="height: 60px;" alt="">
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
</div>


@include('admin/includes/footer');
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2KE5mhINTL3jm_2rDDKgp5O3yZjSOP2U"></script>
<script>
    function initMap() {
        const location = {
            lat: <?php echo $get_crusher_data->crusher_lat; ?>,
            lng: <?php echo $get_crusher_data->crusher_long; ?>
        };

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: location,
        });

        const icon = {
            path: 'M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z', // Example SVG path (you can use your own path data)
            fillColor: '#ff0000', // Icon color
            fillOpacity: 1,
            strokeWeight: 0,
            scale: 1.5, // Adjust the size of the icon
            anchor: new google.maps.Point(12, 24), // Anchor the icon (adjust to center it correctly)
        };

        // Create a marker and place it on the map
        const marker = new google.maps.Marker({
            position: location, // Position based on latitude and longitude
            map: map, // The map where the marker will be displayed
            icon: icon, // SVG icon for the marker
        });
    }

    window.onload = initMap;
</script>