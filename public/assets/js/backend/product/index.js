$(document).ready(function () {
    $('.datatable').DataTable({
        "lengthMenu": [5, 10, 25, 50],
        "pageLength": 5,
        "columns": [{
            'orderable': true
        }, {
            'orderable': true
        }, {
            'orderable': true
        }, {
            'orderable': true
        }, {
            'orderable': true
        }, {
            'orderable': true
        }, {
            'orderable': false
        }, {
            'orderable': false
        }],
        "order": [[1, "asc"]],
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function drawCallback() {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });
});
