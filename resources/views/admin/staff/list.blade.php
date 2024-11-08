@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Staff</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Staff Management</a></li>
                                <li class="breadcrumb-item active">Staff</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-auto ms-auto">
                            <div class="list-grid-nav hstack gap-1">
                                <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal" data-bs-target="#add_staff"><i class="ri-add-fill me-1 align-bottom"></i> Add Staff</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div id="teamlist">
                            <div class="team-list grid-view-filter row" id="team-member-list">
                                <div class="col">
                                    <div class="card team-box">
                                        <div class="team-cover"> <img src="assets/images/small/img-9.jpg" alt="" class="img-fluid"> </div>
                                        <div class="card-body p-4">
                                            <div class="row align-items-center team-row">
                                                <div class="col team-settings">
                                                    <div class="row">
                                                        <div class="col">
                                                        </div>
                                                        <div class="col text-end dropdown"> <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"> <i class="ri-more-fill fs-17"></i> </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item edit-list" href="#addmemberModal" data-bs-toggle="modal" data-edit-id="12"><i class="ri-pencil-line me-2 align-bottom text-muted"></i>Edit</a></li>
                                                                <li><a class="dropdown-item remove-list" href="#removeMemberModal" data-bs-toggle="modal" data-remove-id="12"><i class="ri-delete-bin-5-line me-2 align-bottom text-muted"></i>Remove</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col">
                                                    <div class="team-profile-img">
                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0"><img src="assets/images/users/avatar-2.jpg" alt="" class="member-img img-fluid d-block rounded-circle"></div>
                                                        <div class="team-content"> <a class="member-name" data-bs-toggle="offcanvas" href="#member-overview" aria-controls="member-overview">
                                                                <h5 class="fs-16 mb-1">Nancy Martino</h5>
                                                            </a>
                                                            <p class="text-muted member-designation mb-0">Team Leader &amp; HR</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col">
                                                    <div class="row text-muted text-center">
                                                        <div class="col-6 border-end border-end-dashed">
                                                            <h5 class="mb-1 projects-num">225</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="mb-1 tasks-num">197</h5>
                                                            <p class="text-muted mb-0">Tasks</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col">
                                                    <div class="text-end"> <a href="" class="btn btn-light view-btn">View Profile</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="add_staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content border-0">

                                    <div class="modal-body">
                                        <form autocomplete="off" id="memberlist-form" class="needs-validation" novalidate="">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="hidden" id="memberid-input" class="form-control" value="">
                                                    <div class="px-1 pt-1">
                                                        <div class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                                            <img src="assets/images/small/img-9.jpg" alt="" id="cover-img" class="img-fluid">

                                                            <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="modal-title text-white" id="createMemberLabel">Add New Staff</h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <div class="d-flex gap-3 align-items-center">
                                                                        <button type="button" class="btn-close btn-close-white" id="createMemberBtn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mb-4 mt-n5 pt-2">
                                                        <div class="position-relative d-inline-block">
                                                            <div class="position-absolute bottom-0 end-0">
                                                                <label for="member-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Member Image" data-bs-original-title="Select Member Image">
                                                                    <div class="avatar-xs">
                                                                        <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                            <i class="ri-image-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <input class="form-control d-none" value="" id="member-image-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                            </div>
                                                            <div class="avatar-lg">
                                                                <div class="avatar-title bg-light rounded-circle">
                                                                    <img src="assets/images/users/user-dummy-img.jpg" id="member-img" class="avatar-md rounded-circle h-auto">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="status-field" class="form-label">Status</label>
                                                            <select class="form-control mb-3" name="status">
                                                                <option value="1" selected>Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="status-field" class="form-label">Role</label>
                                                            <select class="form-control mb-3" name="role">
                                                                @if(!empty($role_list))
                                                                <option value="" selected>Select Role</option>
                                                                @foreach($role_list as $val)
                                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                                @endforeach
                                                                @else
                                                                <option value="" selected>No Roles Avaliable</option>
                                                                @endif
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required />
                                                            <span id="name_error" class="error"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-4 mb-3">
                                                            <label for="mobile" class="form-label">Mobile <b class="text-danger">*</b></label>
                                                            <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile" required />
                                                            <span id="mobile_error" class="error"></span>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="email" class="form-label">Email <b class="text-danger">*</b></label>
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required />
                                                            <span id="email_error" class="error"></span>
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="username" class="form-label">Username <b class="text-danger">*</b></label>
                                                            <i><span class="text-success fs-12">(Used for CRM Login)</span></i>
                                                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required />
                                                            
                                                            <span id="username_error" class="error"></span>
                                                            
                                                        </div>

                                                        <div class="col-md-4 mb-3">
                                                            <label for="password" class="form-label">Password <b class="text-danger">*</b></label>
                                                            <i><span class="text-success fs-12">(Used for CRM Login)</span></i>
                                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Mobile" required />
                                                            <span id="password_error" class="error"></span>
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
                                                            <label for="city" class="form-label">City <b class="text-danger">*</b></label>
                                                            <select class="form-control mb-3" name="city">
                                                                <option value="" selected>Select City</option>
                                                                <option value="0">Delhi</option>
                                                            </select>
                                                            <span id="city_error" class="error"></span>
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
                                                    
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="addNewMember">Add Staff</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>
                        <!--end modal-->

                        <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="member-overview">
                            <!--end offcanvas-header-->
                            <div class="offcanvas-body profile-offcanvas p-0">
                                <div class="team-cover">
                                    <img src="assets/images/small/img-9.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="p-3">
                                    <div class="team-settings">
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="btn btn-light btn-icon rounded-circle btn-sm favourite-btn "> <i class="ri-star-fill fs-14"></i> </button>
                                            </div>
                                            <div class="col text-end dropdown">
                                                <a href="javascript:void(0);" id="dropdownMenuLink14" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill fs-17"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink14">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-line me-2 align-middle"></i>Favorites</a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="p-3 text-center">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-lg img-thumbnail rounded-circle mx-auto profile-img">
                                    <div class="mt-3">
                                        <h5 class="fs-15 profile-name">Nancy Martino</h5>
                                        <p class="text-muted profile-designation">Team Leader &amp; HR</p>
                                    </div>
                                    <div class="hstack gap-2 justify-content-center mt-4">
                                        <div class="avatar-xs">
                                            <a href="javascript:void(0);" class="avatar-title bg-secondary-subtle text-secondary rounded fs-16">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </div>
                                        <div class="avatar-xs">
                                            <a href="javascript:void(0);" class="avatar-title bg-success-subtle text-success rounded fs-16">
                                                <i class="ri-slack-fill"></i>
                                            </a>
                                        </div>
                                        <div class="avatar-xs">
                                            <a href="javascript:void(0);" class="avatar-title bg-info-subtle text-info rounded fs-16">
                                                <i class="ri-linkedin-fill"></i>
                                            </a>
                                        </div>
                                        <div class="avatar-xs">
                                            <a href="javascript:void(0);" class="avatar-title bg-danger-subtle text-danger rounded fs-16">
                                                <i class="ri-dribbble-fill"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 text-center">
                                    <div class="col-6">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1 profile-project">124</h5>
                                            <p class="text-muted mb-0">Projects</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1 profile-task">81</h5>
                                            <p class="text-muted mb-0">Tasks</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="p-3">
                                    <h5 class="fs-15 mb-3">Personal Details</h5>
                                    <div class="mb-3">
                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Number</p>
                                        <h6>+(256) 2451 8974</h6>
                                    </div>
                                    <div class="mb-3">
                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Email</p>
                                        <h6>nancymartino@email.com</h6>
                                    </div>
                                    <div>
                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Location</p>
                                        <h6 class="mb-0">Carson City - USA</h6>
                                    </div>
                                </div>
                                <div class="p-3 border-top">
                                    <h5 class="fs-15 mb-4">File Manager</h5>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-danger-subtle text-danger rounded fs-16">
                                                <i class="ri-image-2-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><a href="javascript:void(0);">Images</a></h6>
                                            <p class="text-muted mb-0">4469 Files</p>
                                        </div>
                                        <div class="text-muted">
                                            12 GB
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-secondary-subtle text-secondary rounded fs-16">
                                                <i class="ri-file-zip-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><a href="javascript:void(0);">Documents</a></h6>
                                            <p class="text-muted mb-0">46 Files</p>
                                        </div>
                                        <div class="text-muted">
                                            3.46 GB
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-success-subtle text-success rounded fs-16">
                                                <i class="ri-live-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><a href="javascript:void(0);">Media</a></h6>
                                            <p class="text-muted mb-0">124 Files</p>
                                        </div>
                                        <div class="text-muted">
                                            4.3 GB
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-primary-subtle text-primary rounded fs-16">
                                                <i class="ri-error-warning-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><a href="javascript:void(0);">Others</a></h6>
                                            <p class="text-muted mb-0">18 Files</p>
                                        </div>
                                        <div class="text-muted">
                                            846 MB
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end offcanvas-body-->
                            <div class="offcanvas-foorter border p-3 hstack gap-3 text-center position-relative">
                                <button class="btn btn-light w-100"><i class="ri-question-answer-fill align-bottom ms-1"></i> Send Message</button>
                                <a href="pages-profile.html" class="btn btn-primary w-100"><i class="ri-user-3-fill align-bottom ms-1"></i> View Profile</a>
                            </div>
                        </div>
                        <!--end offcanvas-->
                    </div>
                </div><!-- end col -->
            </div>
            <!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div>
@include('admin/includes/footer')

<script>
    document.querySelector("#member-image-input").addEventListener("change", function() {
        var e = document.querySelector("#member-img"),
            t = document.querySelector("#member-image-input").files[0],
            r = new FileReader;
        r.addEventListener("load", function() {
            e.src = r.result
        }, !1), t && r.readAsDataURL(t)
    })
</script>