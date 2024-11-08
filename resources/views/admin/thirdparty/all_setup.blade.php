@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">All Third Party Setup</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Third Party Setup Management</a></li>
                                <li class="breadcrumb-item active">All Third Party Setup</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Payment Gateway</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="pg_status" checked>
                                            <label class="form-check-label" for="pg_status">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="pg_status">
                                            <label class="form-check-label" for="pg_status">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="pay_gateway" class="form-label">Select Payment Gateway <b class="text-danger">*</b></label>
                                        <select class="form-control mb-3" name="pay_gateway">
                                            <option value="" selected>Select Anyone</option>
                                            <option value="Razorpe">Razorpe</option>
                                            <option value="CCAvenue">CCAvenue</option>
                                            <option value="Instamojo">Instamojo</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="public_key" class="form-label">Public Key <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="public_key" name="public_key" placeholder="Enter Public Key">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="secret_key" class="form-label">Secret Key <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="secret_key" name="secret_key" placeholder="Enter Secret Key">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button class="btn btn-primary">Save / Update</button>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Other Payment Gateway</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-sm btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#role_form"><i class="ri-file-list-3-fill align-bottom me-1"></i> View Other Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="pg_status" checked>
                                            <label class="form-check-label" for="pg_status">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="pg_status">
                                            <label class="form-check-label" for="pg_status">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="payment_title" class="form-label">Title <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="payment_title" name="payment_title" placeholder="Enter Payment Title">
                                        <span id="payment_title_error" class="error"></span>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="secret_key" class="form-label">Description <b class="text-danger">*</b></label>
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                        <span id="description_error" class="error"></span>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button class="btn btn-primary">Save / Update</button>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">SMS Gateway</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="sg_status" checked>
                                            <label class="form-check-label" for="sg_status">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="sg_status">
                                            <label class="form-check-label" for="sg_status">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="pay_gateway" class="form-label">Select SMS Gateway <b class="text-danger">*</b></label>
                                        <select class="form-control mb-3" name="pay_gateway">
                                            <option value="" selected>Select Anyone</option>
                                            <option value="Textlocal">Textlocal</option>
                                            <option value="Airtel">Airtel</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="public_key" class="form-label">Public Key <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="public_key" name="public_key" placeholder="Enter Public Key">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="secret_key" class="form-label">Secret Key <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="secret_key" name="secret_key" placeholder="Enter Secret Key">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button class="btn btn-primary">Save / Update</button>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Gmail Setup</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="mailer_status" checked>
                                            <label class="form-check-label" for="mailer_status">
                                                Active
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check form-radio-primary mb-3">
                                            <input class="form-check-input" type="radio" name="mailer_status">
                                            <label class="form-check-label" for="mailer_status">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-12">
                                        <label for="pay_gateway" class="form-label">Select Payment Gateway <b class="text-danger">*</b></label>
                                        <select class="form-control mb-3" name="pay_gateway">
                                            <option value="" selected>Select Anyone</option>
                                            <option value="Razorpe">Razorpe</option>
                                            <option value="CCAvenue">CCAvenue</option>
                                            <option value="Instamojo">Instamojo</option>
                                        </select>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <label for="mailer" class="form-label">Mailer <b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="mailer" name="mailer" value="SMTP" disabled>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="host" class="form-label">Host<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="host" name="host" value="smtp.gmail.com" disabled>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="port" class="form-label">Port<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="port" name="port" value="465" disabled>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="username" class="form-label">Username<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="username" name="username" value="maishainfotechsurya@gmail.com">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="app_password" class="form-label">App Password<b class="text-danger">*</b></label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" name="app_password" id="app_password" value="zagaspkjywhmjzrx">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="encryption" class="form-label">Encryption<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="encryption" name="encryption" value="tls" disabled>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="from_addr" class="form-label">From Address (Sendor Address)<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="from_addr" name="from_addr" value="info@udhar.com">
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="from_name" class="form-label">From Name (Sendor Name)<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" id="from_name" name="from_name" value="Udar">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button class="btn btn-primary">Save / Update</button>
                                        </div>
                                    </div>
                                </div><!--end row-->
                            </form>
                        </div>
                        <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="role_form" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div id="response"></div>
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Other Payment Method List</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead class="table-light">
                                                <tr>
                                                    <th data-ordering="false">SR No.</th>
                                                    <th data-ordering="false">Payment Title</th>
                                                    <th data-ordering="false">Description</th>
                                                    <th>Create Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($list))
                                                @foreach ($list as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    @if ($value->flag == 1)
                                                    <td>
                                                        <!-- Custom Switches -->
                                                        <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                            <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','role','Inactive','role');" role="switch" id="SwitchCheck9" checked>
                                                        </div>
                                                    </td>
                                                    @elseif($value->flag == 0)
                                                    <td>
                                                        <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                            <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','role','Active','role');" role="switch" id="SwitchCheck9">
                                                        </div>
                                                    </td>
                                                    @endif
                                                    @if($value->flag == 1)
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','role/edit');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                                <li>
                                                                    <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','role','delete','role');">
                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <div class="dropdown d-inline-block">
                                                            <button class="btn btn-soft-danger btn-sm dropdown" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="First Activate this Role" data-bs-original-title="First Activate this Role">
                                                                <i class="ri-alert-line align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
</div>
@include('admin/includes/footer')