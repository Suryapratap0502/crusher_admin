@include('admin/includes/header')
<style>
    #map-crusher {
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
                        <h4 class="mb-sm-0">Track Crusher</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">Track Crusher</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <div>
                                            <label for="crusher" class="form-label">Select Crusher<b class="text-danger">*</b></label>
                                            <select class="form-control" name="crusher" onchange="get_location(this.value)">
                                                <option value="" selected>Select Crusher</option>
                                                @if(!empty($list))
                                                @foreach($list as $val)
                                                <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                @endforeach
                                                @else
                                                <option>No Crusher Available</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="map-crusher"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
</div>
@include('admin/includes/footer')
<script>
    function get_location(val) {
        $.ajax({
            url: '{{ url("crusher_zones/get_crusher_location") }}',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                val: val
            },
            success: function(response) {
                var res = JSON.parse(response);
                //console.log(res.lat);
                 initMap(res.lat,res.long);
            }
        })
    }
</script>