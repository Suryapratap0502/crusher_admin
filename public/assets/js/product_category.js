var base_url = window.location.origin + "/";

// role add
$(document).on('submit', '#category_add', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'product/add_category',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".text-replace").val('Processing.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                        $('#response').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        setTimeout(function() {
                            window.location.href = base_url + 'product/product_category';
                        }, 1500);
                    
                } else if (result.code == 401) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 400) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function (xhr) {
                $(".text-replace").css('display', 'block');
            },
            complete: function () {
                $(".text-replace").css('display', 'block');
            },
        })
    }
})

// role update

$(document).on('submit', '#category_edit', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'product/update_category',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".text-replace").val('Processing.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                        $('#response_edit').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        setTimeout(function() {
                            window.location.href = base_url + 'product/product_category';
                        }, 1500);
                    
                } else if (result.code == 401) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 400) {
                    $(".text-replace").val('Save');
                    $('.text-replace').removeAttr('disabled');
                    $('#response_edit').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function (xhr) {
                $(".text-replace").css('display', 'block');
            },
            complete: function () {
                $(".text-replace").css('display', 'block');
            },
        })
    }
})