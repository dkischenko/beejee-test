$(document).ready(function() {
    $('#tasks').DataTable({
        "pageLength": 3,
        "searching": false,
        "bLengthChange": false,
        "columnDefs": [{
            "targets": [2,4,5],
            "orderable": false
        }]
    });
} );