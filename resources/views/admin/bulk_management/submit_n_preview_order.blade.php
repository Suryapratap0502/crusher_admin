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
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Purchase Order Details</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Management</a></li>
                                <li class="breadcrumb-item active">Purchase Order Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card" id="demo">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header border-bottom-dashed p-4">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <img src="{{ asset('assets/images/logo_dark.png')}}" class="card-logo card-logo-dark" alt="logo dark" height="50">
                                            <img src="{{ asset('assets/images/logo_dark.png')}}" class="card-logo card-logo-light" alt="logo light" height="50">
                                            <div class="mt-sm-5 mt-4">
                                                <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                                <p class="text-muted mb-1" id="address-details">California, United States</p>
                                                <p class="text-muted mb-0" id="zip-code"><span>Zip-code:</span> 90201</p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 mt-sm-0 mt-3">
                                            <h6><span class="text-muted fw-normal">Legal Registration No:</span><span id="legal-register-no">987654</span></h6>
                                            <h6><span class="text-muted fw-normal">Email:</span><span id="email">velzon@themesbrand.com</span></h6>
                                            <h6><span class="text-muted fw-normal">Website:</span> <a href="https://themesbrand.com/" class="link-primary" target="_blank" id="website">www.themesbrand.com</a></h6>
                                            <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> +(01) 234 6789</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-header-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Order ID</p>
                                            <h5 class="fs-14 mb-0">#VL<span id="invoice-no">25000355</span></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Order Date</p>
                                            <h5 class="fs-14 mb-0"><span id="invoice-date">23 Nov, 2021</span> <small class="text-muted" id="invoice-time">02:36PM</small></h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                            <span class="badge bg-success-subtle text-success fs-11" id="payment-status">Paid</span>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                            <h5 class="fs-14 mb-0">₹ <span id="total-amount">755.96</span></h5>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4 border-top border-top-dashed">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing Address</h6>
                                            <p class="fw-medium mb-2" id="billing-name">David Nichols</p>
                                            <p class="text-muted mb-1" id="billing-address-line-1">305 S San Gabriel Blvd</p>
                                            <p class="text-muted mb-1"><span>Phone: +</span><span id="billing-phone-no">(123) 456-7890</span></p>
                                            <p class="text-muted mb-0"><span>Tax: </span><span id="billing-tax-no">12-3456789</span> </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                            <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                            <p class="text-muted mb-1" id="shipping-address-line-1">305 S San Gabriel Blvd</p>
                                            <p class="text-muted mb-1"><span>Phone: +</span><span id="shipping-phone-no">(123) 456-7890</span></p>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="table-active">
                                                    <th scope="col" style="width: 50px;">#</th>
                                                    <th scope="col">Product Details</th>
                                                    <th scope="col">Rate</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col" class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="products-list">
                                                <tr>
                                                    <th scope="row">01</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">10 MM (MM)</span>
                                                    </td>
                                                    <td>₹ 119.99</td>
                                                    <td>02</td>
                                                    <td class="text-end">₹ 239.98</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">02</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">10 MM (MM)</span>
                                                    </td>
                                                    <td>₹ 94.99</td>
                                                    <td>01</td>
                                                    <td class="text-end">₹ 94.99</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">03</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">10 MM (MM)</span>
                                                    </td>
                                                    <td>₹ 24.99</td>
                                                    <td>01</td>
                                                    <td class="text-end">₹ 24.99</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">04</th>
                                                    <td class="text-start">
                                                        <span class="fw-medium">10 MM (MM)</span>
                                                    </td>
                                                    <td>₹ 340.00</td>
                                                    <td>01</td>
                                                    <td class="text-end">₹ 340.00</td>
                                                </tr>
                                            </tbody>
                                        </table><!--end table-->
                                    </div>
                                    <div class="border-top border-top-dashed mt-2">
                                        <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end">₹ 699.96</td>
                                                </tr>
                                                <tr>
                                                    <td>Estimated Tax (12.5%)</td>
                                                    <td class="text-end">₹ 44.99</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                                    <td class="text-end">- ₹ 53.99</td>
                                                </tr>
                                                <tr>
                                                    <td>Shipping Charge</td>
                                                    <td class="text-end">₹ 65.00</td>
                                                </tr>
                                                <tr class="border-top border-top-dashed fs-15">
                                                    <th scope="row">Total Amount</th>
                                                    <th class="text-end">₹ 755.96</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </div>
                                    <div class="mt-3">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                        <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                                        <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                                        <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                        <p class="text-muted">Total Amount: <span class="fw-medium" id="">₹ </span><span id="card-total-amount">755.96</span></p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="alert alert-primary">
                                            <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                                    credit card or direct payment online. If account is not paid within 7
                                                    days the credits details supplied as confirmation of work undertaken
                                                    will be charged the agreed quoted fee noted above.
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                        <a href="#" class="btn btn-soft-primary"><i class="ri-edit-2-fill align-bottom me-1"></i> Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-save-3-fill align-bottom me-1"></i> Create Order</a>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content-->

@include('admin/includes/footer');