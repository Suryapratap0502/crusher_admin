@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Delivery Charges</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">Delivery Charges</li>
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
                            <div id="response"></div>
                            <form id="update_delivey_charges">
                                @csrf()
                                <div class="modal-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-10 mb-3">
                                            <label for="delivery_charges" class="form-label">Price (Per KM) <span class="text-danger">*</span></label>
                                            <input type="number" id="delivery_charges" name="delivery_charges" class="form-control" placeholder="Enter Price Per Kilometer" value="{{ $delivery_data->price ?? '' }}" required />
                                            <span id="delivery_charges_error" class="text-danger error"></span>
                                        </div>
                                        <input type="hidden" id="id" name="id" value="{{ $delivery_data->id ?? '' }}">
                                        <div class="col-lg-2 mt-3">
                                            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Update Charges">
                                        </div>
                                    </div>
                                </div>
                            </form>
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