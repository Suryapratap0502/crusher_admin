@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product Management</a></li>
                                <li class="breadcrumb-item active">Products</li>
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
                                        <h5 class="card-title mb-0">Product List</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <a href="{{ url('product/update_product_price_layout') }}"><button type="button" class="btn btn-primary add-btn"><i class="ri-loop-left-line align-bottom me-1"></i> Update Product Price</button></a>
                                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#product_form"><i class="ri-add-line align-bottom me-1"></i> Add Product</button>
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
                                            @if(getuserdetail('id') == 1)
                                            <th data-ordering="false">Crusher</th>
                                            @endif
                                            <th data-ordering="false">Category</th>
                                            <th data-ordering="false">Name</th>
                                            <th data-ordering="false">Size</th>
                                            <th data-ordering="false">Price</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($list))
                                        @foreach ($list as $key => $value)
                                        @php
                                        $get_category_name = App\Models\ProductCategoryModel::where('id', $value->product_cat)->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            @if(getuserdetail('id') == 1)
                                            @php
                                            $get_zone_name = App\Models\CrusherZoneModel::where('id', $value->crusher_zone)->first();
                                            @endphp
                                            <td>{{ $get_zone_name ? $get_zone_name->name : 'No Zone Found' }}</td>
                                            @endif

                                            <td>{{ $get_category_name ? $get_category_name->name : 'No Category Found' }}</td>
                                            <td>{{ $value->product_name }}</td>
                                            <td>{{ $value->product_size }}</td>
                                            <td>₹ {{ $value->product_price }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            @if ($value->flag == 1)
                                            <td>
                                                <!-- Custom Switches -->
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','product','Inactive','zone_products');" role="switch" id="SwitchCheck9" checked>
                                                </div>
                                            </td>
                                            @elseif($value->flag == 0)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','product','Active','zone_products');" role="switch" id="SwitchCheck9">
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
                                                            <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','product','delete','zone_products');">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-danger btn-sm dropdown" type="button" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="First Activate this Record" data-bs-original-title="First Activate this Role">
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
                            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="product_form" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div id="response"></div>
                                        <div class="modal-header bg-light p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form id="product_add">
                                            @csrf()
                                            <div class="modal-body">

                                                @if(getuserdetail('id') == 1)
                                                @php
                                                $get_state = App\Models\CrusherZoneModel::where('flag', '!=', '2')->distinct('state')->pluck('state');
                                                @endphp
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="product_state" class="form-label">Select State <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="product_state" id="product_state" onchange="get_city_2(this.value)">
                                                            @if($get_state->isNotEmpty())
                                                            <option value="" selected>Select State</option>
                                                            @foreach($get_state as $state_id)
                                                            @php
                                                            $get_state_name = App\Models\StateModel::find($state_id);
                                                            @endphp
                                                            @if($get_state_name)
                                                            <option value="{{ $get_state_name->id }}">{{ $get_state_name->name }}</option>
                                                            @endif
                                                            @endforeach
                                                            @else
                                                            <option value="" selected>No Zone Available</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="city">Select City<span class="error_lable text-danger">*</span></label>
                                                        <select name="city" id="city" class="form-control city" onchange="get_zone(this.value)">
                                                        <option value="" selected>Select City</option>
                                                        </select>
                                                        <span id="city_error" class="error"></span>
                                                    </div>


                                                    <div class="col-md-6 mb-3">
                                                        <label for="cursher_zone" class="form-label">Select Zone <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3 zone" name="cursher_zone">
                                                        <option value="" selected>Select Zone</option>    
                                                    </select>
                                                    </div>
                                                    @endif
                                                    <div class="col-md-6 mb-3">
                                                        <label for="product_category" class="form-label">Product Category <b class="text-danger">*</b></label>
                                                        <select class="form-control" name="product_category">
                                                            @if(!empty($category_list))
                                                            <option value="" selected>Select Category</option>
                                                            @foreach($category_list as $val)
                                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                            @endforeach
                                                            @else
                                                            <option value="" selected>No Category Avaliable</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="product_name" class="form-label">Product Name <b class="text-danger">*</b></label>
                                                        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Enter Product Name" required />
                                                        <span id="product_name_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="product_size" class="form-label">UOM (Unit of measurement) <b class="text-danger">*</b></label>
                                                        <select class="form-control" name="product_size">
                                                            <option value="" selected>Select UOM</option>
                                                            <option value="Metric Ton (MT)">Metric Ton (MT)</option>    
                                                            <option value="Feet">Feet</option>
                                                            <option value="Brass">Brass</option>
                                                            <option value="Cubic Meter">Cubic Meter</option>
                                                        </select>
                                                        <span id="product_size_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="product_price" class="form-label">Product Price <b class="text-danger">*</b></label>
                                                        <input type="number" id="product_price" name="product_price" class="form-control" placeholder="Enter Product Price" required />
                                                        <span id="product_price_error" class="error"></span>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="status-field" class="form-label">Status <b class="text-danger">*</b></label>
                                                        <select class="form-control mb-3" name="status">
                                                            <option value="1" selected>Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
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