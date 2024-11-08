<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead class="table-light">
        <tr>
            <th data-ordering="false">SR No.</th>
            <th data-ordering="false">Updated By</th>
            <th data-ordering="false">Zone</th>
            <th data-ordering="false">Product Name</th>
            <th data-ordering="false">Price</th>
            <th data-ordering="false">In Stock</th>
            <th>Updated Date</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($log))
        @foreach($log as $key => $val)
        @php
        $get_zone_name = App\Models\CrusherZoneModel::where('id', $val->zone_id)->first();
        $get_product_name = App\Models\ProductModel::where('id', $val->product_id)->first();
        $get_user_name = App\Models\AuthModel::where('id', $val->updated_by)->first();
        @endphp
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $get_user_name->name }}</td>
            <td>{{ $get_zone_name->name }}</td>
            <td>{{ $get_product_name->product_name }}</td>
            <td>{{ $val->price }}</td>
            <td>{{ $val->in_stock }}</td>
            <td>{{ $val->created_at }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>