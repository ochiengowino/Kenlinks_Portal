//Add new data
$(document).ready(function() {

    $('#saveBtn').on('click', function(e) {
        if ($('#add-form')[0].checkValidity()) {
            e.preventDefault();
        }
        // $('#addModal').modal('show');
        // console.log('save btn clicked');


        $.ajax({
            type: "POST",
            url: "/admin-panel/process.php",
            data: $("#add-form").serialize() + "&action=add_data",
            success: function(response) {

                $('#add-form')[0].reset();
                $('#addModal').modal('hide');

                Swal.fire({
                    title: 'Data Added Successfully!',
                    type: 'success'
                });
                window.location = 'demo-request.php', true;
                console.log(response);
                //alert(response);
            }
        });

    });
});




// $(document).ready(function() {

//     $('#dataTable tbody').on('click', '.deletebtn', function() {

//         $('#deletemodal').modal('show');
//         console.log('delete btn clicked');
//         del_data = $(this).attr('delete_id');
//         // console.log(del_data);

//         $.ajax({
//             type: "POST",
//             url: "deletemodal.php",
//             data: { del_data: del_data },
//             success: function(response) {

//                 $("#delete_body").html(response);
//                 //alert(response);
//             }
//         });

//     });
// });


// $('#dataTable tbody').on('click', '.editbtn', function() {
//     // $('#viewmodal').modal('show');
//     console.log('clicked!!!')
//     edit_data = $(this).attr('edit_id');
//     console.log(edit_data);

//     $.ajax({ //create an ajax request to display.php
//         type: "POST",
//         url: "editmodal.php",
//         data: { edit_data: edit_data },
//         success: function(response) {

//             $("#edit_body").html(response);
//             //alert(response);
//         }
//     });

// });

// $(document).on('click', '.viewbtn', function() {
//     var data1 = $(this).attr('view_id');
//     console.log(data1);
//     $('#viewmodal').modal('show');

//     $.ajax({ //create an ajax request to display.php
//         type: "POST",
//         url: "viewmodal.php",
//         data: { data1: data1 },
//         success: function(response) {
//             // $('#viewmodal').modal('show');
//             $("#view_body").html(response);
//             //alert(response);
//         }
//     });
// });


$(document).ready(function() {

    $('#dataTable tbody').on('click', '.viewbutton', function() {
        console.log('clicked view button');
        var data1 = $(this).attr('view_id');

        // $('#viewmodal').modal('show');
        // console.log(data1);
        // alert(data1);

        $.ajax({
            type: "POST",
            url: "viewmodal.php",
            data: { data1: data1 },
            success: function(response) {
                // $('#viewmodal').modal('show');
                $("#view_modal_body").html(response);
                //alert(response);

            }
        });
    });
});

$(document).ready(function() {
    //Display data of a user
    displayAllData();

    function displayAllData() {
        $.ajax({
            type: "POST",
            url: "/admin-panel/process.php",
            data: { action: 'display_data' },
            success: function(response) {
                // console.log(response);
                $("#showData").html(response);
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf', 'csv', 'print'],
                    order: [0, 'desc'],
                    "bDestroy": true
                });
            }
        });
    }
});


//Fetch Edit data
$('#dataTable tbody').on('click', '.editbtn1', function() {
    // $('#viewmodal').modal('show');
    // console.log('clicked!!!');
    edit_data = $(this).attr('edit_id');
    // console.log(edit_data);

    $.ajax({
        type: "POST",
        url: "process.php",
        data: { edit_data: edit_data },
        success: function(response) {
            data = JSON.parse(response);
            // console.log(data);
            $('#id').val(data.id);
            $('#reference').val(data.uniqueID);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#phone').val(data.phone_number);
            $('#date').val(data.date);
            $('#message').val(data.message);
            // $("#edit_body").html(response);
        }
    });

});


// Update data
$('.updatebtn').on('click', function(e) {
    if ($('#update-form')[0].checkValidity()) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "process.php",
            data: $("#update-form").serialize() + "&action=update_data",
            success: function(response) {
                $('#update-form')[0].reset();
                $('#editmodal').modal('hide');
                window.location = 'demo-request.php', true;
                Swal.fire({
                    title: 'Data Updated Successfully!',
                    type: 'success'
                });

                console.log(response);
            }
        });
    }
});


// Delete Data

$(document).ready(function() {

    $('#dataTable tbody').on('click', '.deletebtn1', function(e) {
        e.preventDefault();
        console.log('delete btn clicked');
        del_data = $(this).attr('delete_id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: { del_data: del_data },
                    success: function(response) {
                        // console.log(response);
                        window.location = 'demo-request.php', true;
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        );
                    }
                });
            }
        })
    });
});




$(document).ready(function() {

    $('#dataTable tbody').on('click', '.viewbutton1', function(e) {
        console.log('clicked');
        e.preventDefault();
        view_id = $(this).attr('view_id');

        $.ajax({
            type: "POST",
            url: "process.php",
            data: { view_id: view_id },
            success: function(response) {

                data = JSON.parse(response);
                Swal.fire({
                    title: 'Data Updated Successfully!',
                    type: 'success',
                    html: '',
                    showCancelButton: true
                });
            }
        });
    });
});


// Update Profile
$(document).ready(function() {

    $('#profile-update-form').on('submit', function(e) {
        e.preventDefault();
        dat = $("#profile-update-form").serialize()
        console.log(dat)
        $.ajax({
            type: "POST",
            url: "process.php",
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(response) {
                console.log(response);
                location.reload();

            }
        });
    });
});



// Update Profile Password
$(document).ready(function() {

    $('#changePassBtn').on('click', function(e) {
        if ($('#change-pass-form')[0].checkValidity()) {
            e.preventDefault();
            $('#changePassBtn').val('Please wait...');
            if ($('#newpass').val() != $('#cnewpass').val()) {
                $('#changePassError').text('Passswords did not match!');
                $('#changePassBtn').val('Change Password');
            } else {
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: $("#change-pass-form").serialize() + "&action=change_pass",
                    success: function(response) {
                        // console.log(response);
                        $('#changePassAlert').html(response);
                        $('#changePassBtn').val('Change Password');
                        $('#changePassError').text('');
                        $('#change-pass-form')[0].reset();
                    }
                });
            }
        }

    });
});


//Verify Email
$(document).ready(function() {

    $('#verify-email').on('click', function(e) {

        e.preventDefault();
        $(this).text('Please Wait...');

        $.ajax({
            type: "POST",
            url: "process.php",
            data: { action: 'verify_email' },
            success: function(response) {
                console.log(response);
                $('#verifyEmailAlert').html(response);
                $('#verify-email').text('Verify Now')
            }
        });

    });
});


// Send feedback to the Admin
$(document).ready(function() {

    $('#feedbackBtn').on('click', function(e) {
        if ($('#feedback-form')[0].checkValidity()) {
            e.preventDefault();
            $(this).text('Please Wait...');
            $.ajax({
                type: "POST",
                url: "process.php",
                data: $("#feedback-form").serialize() + "&action=feedback",
                success: function(response) {
                    console.log(response);
                    $('#feedback-form')[0].reset();
                    // $('#verifyEmailAlert').html(response);
                    $('#feedbackBtn').val('Send Feedback');
                    Swal.fire({
                        title: 'Feedback sent successfully!',
                        type: 'success'
                    });
                }
            });
        }

    });
});



// Get notifications
$(document).ready(function() {
    fetchNotifications();

    function fetchNotifications() {
        $.ajax({
            type: "POST",
            url: "/admin-panel/process.php",
            data: { action: 'fetchNotifications' },
            success: function(response) {
                // console.log(response);
                $('#showAllNotifications').html(response);

            }
        });
    }

    // Check notifications
    checkNotifications();

    function checkNotifications() {
        $.ajax({
            type: "POST",
            url: "/admin-panel/process.php",
            data: { action: 'checkNotifications' },
            success: function(response) {
                // console.log(response);
                // $('#showAllNotifications').html(response);
                $('#checkNotifications').html(response);

            }
        });
    }

    // Remove Notifications
    $('body').on('click', '.close', function(e) {
        e.preventDefault();

        notification_id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: "process.php",
            data: { notification_id: notification_id },
            success: function(response) {
                // console.log(response);
                checkNotifications();
                fetchNotifications();

            }
        });
    });
});


// checking user is logged in/out
$.ajax({
    type: "POST",
    url: "login-system/action.php",
    data: { action: 'checkUser' },
    success: function(response) {
        // console.log(response);
        if (response === 'bye') {
            window.location = 'login-system/index.php', true;
        }

    }
});