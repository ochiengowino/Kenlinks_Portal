$(document).ready(function() {
    $('#adminLoginBtn').on('click', function(e) {

        if ($('#admin-login-form')[0].checkValidity()) {
            e.preventDefault();
            $(this).val('Please wait...');

            $.ajax({
                type: "POST",
                url: "admin-action.php",
                data: $("#admin-login-form").serialize() + "&action=adminLogin",
                success: function(response) {
                    // console.log(response);
                    if (response === 'admin_login') {
                        window.location = 'admin-dashboard.php', true;
                    } else {
                        $('#adminLoginAlert').html(response);

                    }
                    $('#adminLoginBtn').val('Login');

                }
            });

        }
    });
});


// Fetch All Users
$(document).ready(function() {
    fetchAllUsers();

    function fetchAllUsers() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'fetchAllUsers' },
            success: function(response) {
                // console.log(response);

                $('#showAllUsers').html(response);
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


// Display user details in modal
$(document).ready(function() {

    $('body').on('click', '.userDetails', function(e) {
        e.preventDefault();
        details_id = $(this).attr('id');
        // console.log(details_id);
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { 'details_id': details_id },
            success: function(response) {

                data = JSON.parse(response);
                // console.log(data);
                $('#getName').text('Name :' + data.name);
                $('#getEmail').text(data.email);
                $('#getPhone').text(data.phone);
                $('#getGender').text(data.gender);
                $('#getDob').text(data.dob);
                $('#getCreated').text(data.created_at);
                $('#getVerified').text(data.verified);

                if (data.photo != '') {
                    $('#getImage').html('<img src="../../' + data.photo + '" class="img-thumbnail img-fluid align-self-center" width=100px>');
                } else {
                    $('#getImage').html('<img src="../../img/favicon.png" class="img-thumbnail img-fluid align-self-center" width=100px>');
                }
            }
        });
    });
});


// Delete User

$(document).ready(function() {

    $('body').on('click', '.deleteUser', function(e) {
        e.preventDefault();
        // console.log('delete btn clicked');
        delete_id = $(this).attr('id');
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
                    url: "admin-action.php",
                    data: { delete_id: delete_id },
                    success: function(response) {
                        // console.log(response);
                        window.location = 'admin-users.php', true;
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        );

                        fetchAllUsers();
                    }
                });
            }
        })
    });
});


// Fetch All Deleted Users
$(document).ready(function() {
    fetchDeletedUsers();

    function fetchDeletedUsers() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'fetchDeletedUsers' },
            success: function(response) {
                // console.log(response);

                $('#showDeletedUsers').html(response);
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



// Restore User

$(document).ready(function() {

    $('body').on('click', '.restoreUser', function(e) {
        e.preventDefault();
        // console.log('delete btn clicked');
        restore_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure you want to restore this user?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, restore!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "admin-action.php",
                    data: { restore_id: restore_id },
                    success: function(response) {
                        // console.log(response);
                        window.location = 'admin-deleted-users.php', true;
                        Swal.fire(
                            'Restored!',
                            'User has been restores successfully.',
                            'success'
                        );

                        fetchDeletedUsers();
                    }
                });
            }
        })
    });
});




// Fetch All Requests
$(document).ready(function() {
    fetchAddedRequests();

    function fetchAddedRequests() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'fetchAddedRequests' },
            success: function(response) {


                $('#showAddedRequests').html(response);
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



// Delete Added Request

$(document).ready(function() {

    $('body').on('click', '.deleteAddedRequests', function(e) {
        e.preventDefault();
        // console.log('delete btn clicked');
        del_req_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            // text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "admin-action.php",
                    data: { del_req_id: del_req_id },
                    success: function(response) {
                        // console.log(response);
                        window.location = 'admin-added-requests.php', true;
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        );

                        fetchAddedRequests();
                    }
                });
            }
        })
    });
});



// Display user Added requests by admin in modal
$(document).ready(function() {

    $('body').on('click', '.viewAddedRequests', function(e) {
        e.preventDefault();
        add_req_id = $(this).attr('id');
        // console.log(details_id);
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { 'add_req_id': add_req_id },
            success: function(response) {

                data = JSON.parse(response);
                // console.log(data);
                $('#getUsername').text(data.name);
                $('#getUserEmail').text(data.email);
                $('#getUniqueID').text(data.uniqueID);
                $('#getEmail').text(data.email);
                $('#getPhoneNumber').text(data.phone_number);
                $('#getRequestDate').text(data.date);
                $('#getMessage').text(data.message);
                $('#getSentDate').text(data.sent_date);
                $('#getUpdatedDate').text(data.updated_at);
            }
        });
    });
});


// Fetch All Feedbacks of Users
$(document).ready(function() {
    fetchAllFeedbacks();

    function fetchAllFeedbacks() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'fetchAllFeedbacks' },
            success: function(response) {

                $('#showAllFeedbacks').html(response);
                $('#dataTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf', 'csv', 'print'],
                    order: [0, 'desc'],
                    "bDestroy": true
                });

            }
        });
    }



    // Get the current user id and feedback id
    var uid;
    var id;
    $('body').on('click', '.replyFeedback', function(e) {
        uid = $(this).attr('id');
        fid = $(this).attr('fid');

        $('#feedbackReplyBtn').on('click', function(e) {
            if ($('#feedback-reply-form')[0].checkValidity()) {
                let message = $('#message').val();
                e.preventDefault();
                $('#feedbackReplyBtn').val('Please wait...');

                $.ajax({
                    type: "POST",
                    url: "admin-action.php",
                    data: { uid: uid, fid: fid, message: message },
                    success: function(response) {
                        // console.log(response);
                        $('#feedbackReplyBtn').val('Send Reply');
                        $('#replyFeedback').modal('hide');
                        $('#feedback-reply-form')[0].reset();

                        Swal.fire({
                            title: 'Reply sent successfully!',
                            type: 'success'
                        });

                        fetchAllFeedbacks();
                    }
                });
            }
        });
    });

});

// Fetch Notifications
$(document).ready(function() {
    fetchNotifications();

    function fetchNotifications() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'fetchNotifications' },
            success: function(response) {
                // console.log(response);
                $('#showNotifications').html(response);
            }
        });
    }


    // Check Notificaations
    checkNotifications();

    function checkNotifications() {
        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { action: 'checkNotifications' },
            success: function(response) {
                // console.log(response);
                $('.checkNotifications').html(response);
            }
        });
    }


    // Remove Notifications
    $('body').on('click', '.close', function(e) {
        e.preventDefault();

        notification_id = $(this).attr('id');
        // console.log(notification_id)

        $.ajax({
            type: "POST",
            url: "admin-action.php",
            data: { notification_id: notification_id },
            success: function(response) {
                // console.log(response);
                checkNotifications();
                fetchNotifications();
            }
        });
    });
});


// Create Admins
$(document).ready(function() {
    $('#create_adminBtn').on('click', function(e) {
        if ($('#create-admin-form')[0].checkValidity()) {
            e.preventDefault();
            $('#create_adminBtn').val('Please wait...');
            $.ajax({
                type: "POST",
                url: "admin-action.php",
                data: $("#create-admin-form").serialize() + "&action=create_admin",
                success: function(response) {
                    // console.log(response);
                    $('#create_adminBtn').val('Create');
                    $('#createAdminAlert').html(response);

                    if (response === 'admin_created') {
                        // location.reload();
                        window.location = 'admin-create-admins.php', true;
                        $('#createAdminAlert').html(response);
                        $('#create-admin-form')[0].reset();
                    } else {
                        $('#createAdminAlert').html(response);
                    }

                }
            });
        }
    });
});


// Update Admin Profile
$(document).ready(function() {

    $('#profile-update-form').on('submit', function(e) {
        e.preventDefault();
        // console.log('profile')
        $.ajax({
            type: "POST",
            url: "admin-process.php",
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


// Update Admin Profile Password
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
                    url: "admin-process.php",
                    data: $("#change-pass-form").serialize() + "&action=change_admin_pass",
                    success: function(response) {
                        console.log(response);
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