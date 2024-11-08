@include('admin/includes/header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Purchase Order List</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Management</a></li>
                                <li class="breadcrumb-item active">Purchase Order List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Purchase Order List</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <a href="{{ url('bulk_management/purchase_order_form') }}"><button type="button" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Create Purchase Order</button></a>
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
                                            <th data-ordering="false">Company</th>
                                            <th data-ordering="false">Purchase Order ID</th>
                                            <th data-ordering="false">Product Details</th>
                                            <th data-ordering="false">Shipping Details</th>
                                            <th>Invoice Generated?</th>
                                            <th>Challan Generated?</th>
                                            <th>Allocated Crusher</th>
                                            <th>Vehicle Details</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Total Price</th>
                                            <th>Added Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($list))
                                        @foreach ($list as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->company_id }}</td>
                                            <td>{{ $value->purchase_order_id }}</td>
                                            <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#show_data" onclick="show_details('{{ $value->id }}','product_details')">View Details</button></td>
                                            <td><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#show_data" onclick="show_details('{{ $value->id }}','shipping_details')">View Details</button></td>
                                            <td>{{ $value->invoice_generated }}</td>
                                            <td>{{ $value->challan_generated }}</td>
                                            <td>{{ $value->allocated_crusher ?? 'NA' }}</td>
                                            <td>{{ $value->vehicle_details ?? 'NA' }}</td>
                                            <td>{{ $value->order_date }}</td>
                                            <td>{{ $value->order_status }}</td>
                                            <td>{{ $value->total_price }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            @if ($value->flag == 1)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','purchase_order','Inactive','bulk_management/purchase_order');" role="switch" id="SwitchCheck9" checked>
                                                </div>
                                            </td>
                                            @elseif($value->flag == 0)
                                            <td>
                                                <div class="form-check form-switch form-switch-custom form-switch-primary">
                                                    <input class="form-check-input" type="checkbox" onclick="action_data('{{$value->id}}','purchase_order','Active','bulk_management/purchase_order');" role="switch" id="SwitchCheck9">
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
                                                            <a href="#" class="dropdown-item remove-item-btn" onclick="action_data('{{$value->id}}','purchase_order','delete','bulk_management/purchase_order');">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ url('crusher_zones/view/' . $value->id) }}" class="dropdown-item remove-item-btn">
                                                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i> View
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
                                <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="show_data" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div id="response_edit"></div>
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"><span id="data_type_lable"></span> Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <div class="modal-body" id="details_data">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
</div>
@include('admin/includes/footer')

<script>
    function show_details(id, coloumn_name) {
        if (coloumn_name == 'product_details') {
            var label = 'Product';
        }else{
            var label = 'Shipping';
        }
        $.ajax({
            url: '{{ url("bulk_management/get_detailed_data") }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                coloumn_name: coloumn_name
            },
            success: function(response) {
                $('#details_data').html(response);
                $('#data_type_lable').html(label);
            }
        })
    }
</script>