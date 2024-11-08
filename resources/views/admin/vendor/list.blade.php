@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Vendor</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor Management</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Vendor List</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#vendor_form"><i class="ri-add-line align-bottom me-1"></i> Add Vendor</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>

                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead class="table-light">
                                        <tr>
                                            <th data-ordering="false">SR No.</th>
                                            <th data-ordering="false">Vendor ID</th>
                                            <th data-ordering="false">Name</th>
                                            <th data-ordering="false">Email</th>
                                            <th data-ordering="false">Mobile</th>
                                            <th data-ordering="false">Business type</th>
                                            <th>Is Verify</th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($list))
                                        @foreach ($list as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><a href="{{ url('vendor/view_customer/' . $value->vendor_id) }}" class="fw-medium link-primary">{{ $value->vendor_id }}</a></td>
                                            <td>{{ $value->f_name }} {{ $value->l_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>{{ $value->business_type }}</td>
                                            @if ($value->is_verify == 1)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data_2('{{$value->id}}','vendor','verify_no','vendor');" role="switch" id="SwitchCheck9" checked>
                                                </div>
                                            </td>
                                            @elseif($value->is_verify == 0)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data_2('{{$value->id}}','vendor','verify_yes','vendor');" role="switch" id="SwitchCheck9">
                                                </div>
                                            </td>
                                            @endif
                                            @if ($value->flag == 1)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','vendor','Inactive','vendor');" role="switch" id="SwitchCheck9" checked>
                                                </div>
                                            </td>
                                            @elseif($value->flag == 0)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','vendor','Active','vendor');" role="switch" id="SwitchCheck9">
                                                </div>
                                            </td>
                                            @endif
                                            <td>{{ $value->created_at }}</td>
                                            @if($value->flag == 1)
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','role/edit');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li> -->
                                                        <li>
                                                            <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','vendor','delete','vendor');">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="dropdown-item remove-item-btn" onclick="action_data_2('{{$value->id}}','vendor','clean','vendor');">
                                                                <i class="ri-eraser-fill align-bottom me-2 text-muted"></i> Clean Device ID
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
                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="vendor_form" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div id="response"></div>
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Vendor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form id="vendor_add">
                                            @csrf()
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="status-field" class="form-label">Status</label>
                                                        <select class="form-control mb-3" name="status">
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="is_verify" class="form-label">Is Verify?</label>
                                                        <select class="form-control mb-3" name="is_verify">
                                                            <option value="1" selected>Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="company_name" class="form-label"> Company Name <b class="text-danger">*</b></label>
                                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Enter Company Name" required />
                                                        <span id="company_name_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="business_name" class="form-label"> Business Name <b class="text-danger">*</b></label>
                                                        <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Enter Business Name" required />
                                                        <span id="business_name_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="business_type" class="form-label">Business Type <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="business_type">
                                                            @if(!empty($business_type))
                                                            <option value="1" selected>Active</option>
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">Inactive</option>
                                                            @endif
                                                        </select>
                                                        <span id="business_type_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="f_name" class="form-label">First Name <b class="text-danger">*</b></label>
                                                        <input type="text" id="f_name" name="f_name" class="form-control" placeholder="Enter First Name" required />
                                                        <span id="f_name_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="l_name" class="form-label">Last Name <b class="text-danger">*</b></label>
                                                        <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Enter Last Name" required />
                                                        <span id="l_name_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="mobile" class="form-label">Mobile <b class="text-danger">*</b></label>
                                                        <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile" required />
                                                        <span id="mobile_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="image" class="form-label">Profile Image <b class="text-danger">*</b></label>
                                                        <input type="file" id="image" name="image" class="form-control" required />
                                                        <span id="image_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="aadhar" class="form-label">Aadhar No. <b class="text-danger">*</b></label>
                                                        <input type="number" id="aadhar" name="aadhar" class="form-control" placeholder="Enter Aadhar Number" required />
                                                        <span id="aadhar_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="gstin" class="form-label">GSTIN</label>
                                                        <input type="number" id="gstin" name="gstin" class="form-control" placeholder="Enter GST Number" required />
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="email" class="form-label">Email <b class="text-danger">*</b></label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required />
                                                        <span id="email_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="city" class="form-label">City <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="city">
                                                            <option value="" selected>Select City</option>
                                                            <option value="0">Delhi</option>
                                                        </select>
                                                        <span id="city_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="state" class="form-label">State <b class="text-danger">*</b></label>
                                                        <select class="form-control" name="state">
                                                            <option value="" selected>Select State</option>
                                                            <option value="0">New Delhi</option>
                                                        </select>
                                                        <span id="state_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="pin" class="form-label">Pin <b class="text-danger">*</b></label>
                                                        <input type="number" id="pin" name="pin" class="form-control" placeholder="Enter Pin" required />
                                                        <span id="pin_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="address" class="form-label"> Address <b class="text-danger">*</b></label>
                                                        <textarea type="text" id="address" name="address" class="form-control" placeholder="Enter Address" required></textarea>
                                                        <span id="address_error" class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success text-replace" value="Save">
                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="edit" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div id="response_edit"></div>
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Vendor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <div class="modal-body" id="edit_data">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end modal -->
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