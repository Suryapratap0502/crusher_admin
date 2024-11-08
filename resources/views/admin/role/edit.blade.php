<form id="role_edit">
    @csrf()
    <div class="mb-3">
        <label for="role_name" class="form-label">Role Name</label>
        <input type="text" id="role_name" name="role_name" class="form-control" placeholder="Enter Role" value="{{$role_data->name}}" />
        <span id="role_name_error" class="error"></span>
    </div>
    <input type="hidden" id="id" name="id" value="{{$role_data->id}}">
    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Update">
            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
        </div>
    </div>
</form>