// Update Profile
$(document).ready(function() {
    $(function() {
        $('#hotelForm').on('submit', function(e) {
            if ($("#hotelForm")[0].checkValidity()) {
                e.preventDefault();
                $('#hotelSubmitBtn').val('Please wait...');
                form_data = $('#hotelForm').serialize();
                // form_data = new FormData(this)
                console.log(form_data)

                $.ajax({
                    type: "POST",
                    url: "php/process.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    // dataType: "JSON",
                    data: new FormData(this),
                    success: function(response) {
                        console.log(response);
                        $("#hotelForm")[0].reset();
                        $('#hotelSubmitBtn').val('Submit Details');
                        $('#hotelAlert').html(response);
                    }
                });
            }
        });

        $('#transportForm').on('submit', function(e) {
            if ($("#transportForm")[0].checkValidity()) {
                e.preventDefault();
                $('#transportSubmitBtn').val('Please wait...');
                form_data = $('#transportForm').serialize();
                // form_data = new FormData(this)
                console.log(form_data)

                $.ajax({
                    type: "POST",
                    url: "php/process.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    // dataType: "JSON",
                    data: new FormData(this),
                    success: function(response) {
                        console.log(response);
                        $("#transportForm")[0].reset();
                        $('#transportSubmitBtn').val('Submit Details');
                        $('#transportAlert').html(response);
                    }
                });
            }
        });

        $('#exhibitorForm').on('submit', function(e) {
            if ($("#exhibitorForm")[0].checkValidity()) {
                e.preventDefault();
                $('#exhibitorSubmitBtn').val('Please Wait...');
                form_data = $('#exhibitorForm').serialize();
                // form_data = new FormData(this)
                console.log(form_data)

                $.ajax({
                    type: "POST",
                    url: "php/process.php",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success: function(response) {
                        console.log(response);
                        $("#exhibitorForm")[0].reset();
                        $('#exhibitorSubmitBtn').val('Submit Details');
                        $('#exhibitorAlert').html(response);
                    }
                });
            }
        });
    });
});