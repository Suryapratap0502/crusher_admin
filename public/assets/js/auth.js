var base_url = window.location.origin + "/";

// login
$(document).on('submit', '#login', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'login',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".text-replace").val('Signing In.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                        $('#response').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        setTimeout(function() {
                            window.location.href = base_url + 'dashboard';
                        }, 1500);
                    
                } else if (result.code == 401) {
                    $(".text-replace").val('Sign In');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 403) {
                    $(".text-replace").val('Sign In');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                } else if (result.code == 402) {
                    $(".text-replace").val('Sign In');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                    
                }else if (result.code == 500) {
                    $(".text-replace").val('Sign In');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                    
                }
            },
            error: function (xhr) {
                $(".submitbtn").css('display', 'block');
            },
            complete: function () {
                $(".submitbtn").css('display', 'block');
            },
        })
    }
})

// validate email

$(document).on('submit', '#validate_email', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var email = $('#email').val();
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'validate_and_sendMail',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".text-replace").val('Sending Email.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                    $(".text-replace").val('Key Validating Process..');
                        $('#response').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        localStorage.setItem("email", email);
                        setTimeout(function() {
                            $('#loginModals').modal('show');
                            $("#validate_email")[0].reset();
                            $('#response').html('');
                        }, 1500);
                    
                } else if (result.code == 401) {
                    $(".text-replace").val('Send Email');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 403) {
                    $(".text-replace").val('Send Email');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function (xhr) {
                $(".submitbtn").css('display', 'block');
            },
            complete: function () {
                $(".submitbtn").css('display', 'block');
            },
        })
    }
})

// validate key

$(document).on('submit', '#validate_key', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var email = localStorage.getItem("email");
    formData.append("email", email);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'validate_key',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".text-replace").val('Key Validating.....');
                $(".text-replace").attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                        $('#response_key').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        setTimeout(function() {
                            window.location.href = base_url + 'change-password';
                        }, 2000);
                    
                } else if (result.code == 401) {
                    $(".text-replace").val('Validate Key');
                    $('.text-replace').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 400) {
                    $(".text-replace").val('Validate Key');
                    $('.text-replace').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function (xhr) {
                $(".submitbtn").css('display', 'block');
            },
            complete: function () {
                $(".submitbtn").css('display', 'block');
            },
        })
    }
})

// change password

$(document).on('submit', '#change_password', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var email = localStorage.getItem("email");
    formData.append("email", email);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'change_password_action',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#change_password_btn').val('Processing.....');
                $('#change_password_btn').attr('disabled', 'disabled');
            },
            success: function (result) {
                if (result.code == 200) {
                        $('#response').html('<div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert"><i class="ri-check-double-line label-icon"></i><strong>Congratulations 😊</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                        setTimeout(function() {
                            window.location.href = base_url + 'dashboard';
                        }, 2000);
                    
                } else if (result.code == 401) {
                    $('#change_password_btn').val('Reset Password');
                    $('#change_password_btn').removeAttr('disabled');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                } else if (result.code == 400) {
                    $('#change_password_btn').val('Reset Password');
                    $('#change_password_btn').removeAttr('disabled');
                    $('#response').html('<div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show" role="alert"><i class="ri-error-warning-line label-icon"></i><strong>OOPS 🙁</strong> - ' +result.message+ '<button type="button" class="btn-close btn-close-white " data-bs-dismiss="alert" aria-label="Close"></button></div>')
                }
            },
            error: function (xhr) {
                $(".submitbtn").css('display', 'block');
            },
            complete: function () {
                $(".submitbtn").css('display', 'block');
            },
        })
    }
})
