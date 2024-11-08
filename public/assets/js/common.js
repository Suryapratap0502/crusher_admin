var base_url = window.location.origin + '/'

function edit (id, url) {
    $.ajax({
        url: base_url + url,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function (response) {
            $('#edit_data').html(response)
        }
    })
}

function action_data (id, table, status, call_back_url) {
    if (status == 'delete') {
        var keys = 'Deleted'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/gsqxdxog.json' trigger='loop' colors='primary:#f7b84b,secondary:#f06548' style='width:100px;height:100px'></lord-icon>"
    } else if (status == 'Inactive') {
        var keys = 'Deactivate'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/rslnizbt.json' trigger='loop' colors='primary:#f06548,secondary:#f06548' style='width:100px;height:100px'></lord-icon>"
    } else if (status == 'Active') {
        var keys = 'Activate'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/hjeefwhm.json' trigger='loop' colors='primary:#08a88a,secondary:#f06548' style='width:100px;height:100px'></lord-icon>"
    }

    Swal.fire({
        html:
            '<div class="mt-3">' +
            icon +
            '<div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to ' +
            keys +
            ' this Account ?</p></div></div>',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mb-1',
        confirmButtonText: 'Yes, ' + keys + ' It!',
        cancelButtonClass: 'btn btn-danger w-xs mb-1',
        buttonsStyling: false,
        showCloseButton: true
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'common_action/change_status',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    keys: keys,
                    table: table
                },
                success: function (result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: keys,
                            text: 'Your record has been ' + keys + '.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: !1
                        })
                        setTimeout(function () {
                            window.location.href = call_back_url
                        }, 2000)
                    } else {
                        Swal.fire({
                            title: 'Oops...',
                            text: result.message,
                            icon: 'error',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: !1
                        })
                    }
                }
            })
        } else {
            swal('Cancelled', {
                icon: 'error'
            })
        }
    })
}

// change verify status or clean device id

function action_data_2 (id, table, status, call_back_url) {
    if (status == 'clean') {
        var keys = 'Clean Device ID'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/usownftb.json' trigger='loop' style='width:100px;height:100px'> </lord-icon>"
    } else if (status == 'verify_yes') {
        var keys = 'Verify'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/hjeefwhm.json' trigger='loop' colors='primary:#08a88a,secondary:#08a88a' style='width:100px;height:100px'></lord-icon>"
    } else if (status == 'verify_no') {
        var keys = 'Unverify'
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/usownftb.json' trigger='loop' colors='primary:#08a88a,secondary:#f06548' style='width:100px;height:100px'></lord-icon>"
    }

    Swal.fire({
        html:
            '<div class="mt-3">' +
            icon +
            '<div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to ' +
            keys +
            ' ?</p></div></div>',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-primary w-xs me-2 mb-1',
        confirmButtonText: 'Yes, ' + keys + ' It!',
        cancelButtonClass: 'btn btn-danger w-xs mb-1',
        buttonsStyling: false,
        showCloseButton: true
    }).then(result => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'common_action/change_status_2',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    keys: keys,
                    table: table
                },
                success: function (result) {
                    if (result.code == 200) {
                        Swal.fire({
                            title: keys,
                            text: 'Your record has been ' + keys + '.',
                            icon: 'success',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: !1
                        })
                        setTimeout(function () {
                            window.location.href = call_back_url
                        }, 2000)
                    } else {
                        Swal.fire({
                            title: 'Oops...',
                            text: result.message,
                            icon: 'error',
                            confirmButtonClass: 'btn btn-primary w-xs mt-2',
                            buttonsStyling: !1
                        })
                    }
                }
            })
        } else {
            swal('Cancelled', {
                icon: 'error'
            })
        }
    })
}

function get_city (id) {
    $.ajax({
        url: base_url + 'common_action/get_city',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function (response) {
            var result = JSON.parse(response)
            $('.city').html(result.output)
        },
        error: function () {
            alert('Fail')
        }
    })
}

function get_city_2 (id) {
    $.ajax({
        url: base_url + 'common_action/get_city_2',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function (response) {
            var result = JSON.parse(response)
            $('.city').html(result.output)
        },
        error: function () {
            alert('Fail')
        }
    })
}

function get_zone (city_id) {
    var state_id = $('#product_state').val();
    $.ajax({
        url: base_url + 'common_action/get_zone',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            city_id: city_id,
            state_id: state_id
        },
        success: function (response) {
            var result = JSON.parse(response)
            $('.zone').html(result.output)
        },
        error: function () {
            alert('Fail')
        }
    })
}

function initMap(latitude,longitude) {
    const location = {
        lat: parseFloat(latitude),
        lng: parseFloat(longitude)
    };

    const map = new google.maps.Map(document.getElementById("map-crusher"), {
        zoom: 12,
        center: location,
    });

    const icon = {
        path: 'M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z',
        fillColor: '#ff0000',
        fillOpacity: 1,
        strokeWeight: 0,
        scale: 1.5, 
        anchor: new google.maps.Point(12, 24),
    };

    const marker = new google.maps.Marker({
        position: location,
        map: map,
        icon: icon,
    });
}

window.onload = initMap;
