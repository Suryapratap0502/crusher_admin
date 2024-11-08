<form id="vehicle_type_edit">
    @csrf()
    <div class="mb-3">
        <label for="vehicle_name" class="form-label">Vehicle Type Name</label>
        <input type="text" id="vehicle_name" name="vehicle_name" class="form-control" placeholder="Enter Vehicle Type" value="{{$vehicle_type_data->vehicle_type}}" />
        <span id="vehicle_name_error" class="error"></span>
    </div>
    <input type="hidden" id="id" name="id" value="{{$vehicle_type_data->id}}">
    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Update">
            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
        </div>
    </div>
</form>