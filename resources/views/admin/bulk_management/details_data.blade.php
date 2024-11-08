@if($coloumn_name == 'product_details')
<table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead class="table-light">
        <tr>
            <th data-ordering="false">SR No.</th>
            <th data-ordering="false">Product Name</th>
            <th data-ordering="false">Unit Price</th>
            <th data-ordering="false">Quantity</th>
            <th data-ordering="false">Total Price</th>
        </tr>
    </thead>
    <tbody>
        @if (!empty($get_data))
        @php $decoded_data = json_decode($get_data->product_details); @endphp

        @foreach ($decoded_data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->unit_price }}</td>
            <td>{{ $value->quantity }}</td>
            <td>{{ $value->total_price }}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@else
<div>
    {!! nl2br(e($get_data->shipping_details)) !!}
</div>
@endif