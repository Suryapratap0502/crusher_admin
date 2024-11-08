@include('admin/includes/header')
<style>
    /* #change_per_zone{
        display: none;
    } */
    .btn-seacrh {
        margin-top: 25px;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-transparent">
                        <h4 class="mb-sm-0">Update Product Price</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product Management</a></li>
                                <li class="breadcrumb-item active">Update Product Price</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Update Product Price</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <label for="pay_gateway" class="form-label">Select Zone<b class="text-danger">*</b></label>
                                        <select class="form-control mb-3" name="cursher_zone" onchange="show_products(this.value)">
                                            @if(!empty($zone_list))
                                            <option value="" selected>Select Zone</option>
                                            @foreach($zone_list as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                            @else
                                            <option value="" selected>No Zone Avaliable</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div id="change_per_zone">
                                    </div>
                                    <!-- <div class="col-lg-12">
                                        <div class="text-end">
                                            <button class="btn btn-primary">Save / Update</button>
                                        </div>
                                    </div> -->
                                </div><!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">Updated Price Log</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="log_data">   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/includes/footer')
<script>
     get_latest_log();
    function show_products(val) {
        $.ajax({
            url: '{{ url("product/get_products_data") }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                val: val
            },
            success: function(response) {
                $('#change_per_zone').html(response)
            }
        })
    }

    function get_latest_log() {
        $.ajax({
            url: '{{ url("product/get_latest_log") }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#log_data').html(response)
            }
        })
    }
</script>