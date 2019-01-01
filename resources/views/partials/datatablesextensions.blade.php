    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            var table = $('#tablewithextensions').DataTable({
                // fixedColumns: {
                //     leftColumns: 2
                // },
                // scrollX: true,
                // paging: false,
                searching: false,
                ordering:  false,
                info: false,
                // lengthChange: false,
                buttons: ['excel', 'pdf'],
                // buttons: [{
                //     extend: 'excel',
                //     customize: function (xlsx) {
                //             var sheet = xlsx.xl.worksheets['SolidWasteSheet1.xml'];
                //             var col = $('col', sheet);
                //             col.each(function () {
                //                 $(this).attr('width', 30);
                //             });
                //         };
                //     }
                // }]
            });
        
            table.buttons().container()
                .appendTo( '#tablewithextensions_wrapper .col-sm-6:eq(0)' );
        } );
    </script>