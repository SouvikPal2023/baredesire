$(function () {
    $('.dataTable').DataTable({
        responsive: true,
        order: false
    });

    //Exportable table
    // $('.js-exportable').DataTable({
    //     dom: 'Bfrtip',
    //     responsive: true,
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
});