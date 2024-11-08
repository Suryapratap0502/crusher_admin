<form id="bt_edit">
    @csrf()
    <div class="mb-3">
        <label for="bt_name" class="form-label">Role Name</label>
        <input type="text" id="bt_name" name="bt_name" class="form-control" placeholder="Enter Business Type" value="{{$bt_data->name}}" />
        <span id="bt_name_error" class="error"></span>
    </div>
    <input type="hidden" id="id" name="id" value="{{$bt_data->id}}">
    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Update">
        </div>
    </div>
</form>