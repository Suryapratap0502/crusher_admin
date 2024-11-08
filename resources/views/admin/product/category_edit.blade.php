<form id="category_edit">
    @csrf()
    <div class="mb-3">
        <label for="category_name" class="form-label">Category Name <b class="text-danger">*</b></label>
        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category" value="{{$category_data->name}}" />
        <span id="category_name_error" class="error"></span>
    </div>
    <input type="hidden" id="id" name="id" value="{{$category_data->id}}">
    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success text-replace" id="add-btn" value="Update">
        </div>
    </div>
</form>