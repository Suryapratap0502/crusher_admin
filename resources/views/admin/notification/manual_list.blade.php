@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Manual Notification</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Notification Managament</a></li>
                                <li class="breadcrumb-item active">Manual Notification</li>
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
                                        <h5 class="card-title mb-0">Manual Notification List</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#role_form"><i class="ri-add-line align-bottom me-1"></i>Send Manual Notification</button>
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
                                            <th data-ordering="false">Title</th>
                                            <th data-ordering="false">Send To</th>
                                            <th data-ordering="false">User Type</th>
                                            <th data-ordering="false">Read Status</th>
                                            <th data-ordering="false">Send Plateform</th>
                                            <th>Send Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($list))
                                        @foreach ($list as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->send_to }}</td>
                                            <td>{{ $value->user_type }}</td>
                                            <td>{{ $value->read_status }}</td>
                                            <td>{{ $value->send_plateform }}</td>
                                            <td>{{ $value->created_at }}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="role_form" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div id="response"></div>
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Manual Notification</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form id="manual_notification">
                                            @csrf()
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="send_to" class="form-label">Send To <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="send_to" onchange="change_user_type(this.value)">
                                                            <option value="" selected>Select Anyone</option>
                                                            <option value="vendor">Vendor</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                        <span id="send_to_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="user_type" class="form-label"><span class="send_type"> </span> Type <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="user_type">
                                                            <option value="" selected>Select Anyone</option>
                                                            <option value="all">All</option>
                                                            <option value="active">Active Users</option>
                                                            <option value="deactive">Deactive Users</option>
                                                        </select>
                                                        <span id="user_type_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="user_or_vendor" class="form-label">Select <span class="user_or_vendor"> </span> <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="user_or_vendor">
                                                            <option value="" selected>Select Anyone</option>
                                                            <option value="1">Surya</option>
                                                            <option value="2">Pratap</option>
                                                        </select>
                                                        <span id="user_or_vendor_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="title" class="form-label">Title <b class="text-danger">*</b></label>
                                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required />
                                                        <span id="title_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="image" class="form-label">Image <b class="text-danger">*</b></label>
                                                        <input type="file" id="image" name="image" class="form-control" accept="image/png, image/jpeg ,image/jpg" required />
                                                        <span id="image_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="message" class="form-label">Message <b class="text-danger">*</b></label>
                                                        <textarea type="text" id="message" name="message" class="form-control" placeholder="Enter Title" required></textarea>
                                                        <span id="message_error" class="error"></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Send">
                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                </div>
                                            </div>
                                        </form>
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