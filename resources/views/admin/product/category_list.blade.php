@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Product Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product Management</a></li>
                                <li class="breadcrumb-item active">Product Category</li>
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
                                        <h5 class="card-title mb-0">Product Category</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#role_form"><i class="ri-add-line align-bottom me-1"></i> Add Category</button>
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
                                            <th data-ordering="false">Name</th>
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
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','product_category','Inactive','product_category');" role="switch" id="SwitchCheck9" checked>
                                                </div>
                                            </td>
                                            @elseif($value->flag == 0)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','product_category','Active','product_category');" role="switch" id="SwitchCheck9">
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
                                                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit('{{$value->id}}','product/edit_category');" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                        <li>
                                                            <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','product_category','delete','product_category');">
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
                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="role_form" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div id="response"></div>
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Category </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form id="category_add">
                                            @csrf()
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="category_name" class="form-label">Category Name <b class="text-danger">*</b></label>
                                                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category" required />
                                                    <span id="category_name_error" class="error"></span>
                                                </div>

                                                <div>
                                                    <label for="status-field" class="form-label">Status <b class="text-danger">*</b></label>
                                                    <select class="form-control mb-3" name="status">
                                                        <option value="1" selected>Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Save">
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
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
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