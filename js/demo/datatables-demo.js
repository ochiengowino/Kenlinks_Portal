// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel', 'pdf', 'csv', 'print'],
        order: [0, 'desc'],
        "bDestroy": true
    });
});

$(document).ready(function() {
    $('#dataTable2').DataTable({
        // dom: 'Bfrtip',
        // buttons: ['excel', 'pdf', 'csv', 'print'],
        order: [0, 'desc'],
        "bDestroy": true
    });
});

// 
// // {
//     extend: 'excel',
//     className: 'btn btn-primary'
// }