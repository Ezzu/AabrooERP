var FormControls = function () {
    $('#users-table').DataTable();
    //== Private functions

    var baseFunction = function () {

    }

    var createLineItem = function () {
        var global_counter = parseInt($('#line_item-global_counter').val()) + 1;

        var line_item = $('#line_item-container').html().replace(/########/g, '').replace(/######/g, global_counter);

        $('#qualifications-table tr:last').after(line_item);
        // Apply Select2 on newly created item


       // $('#line_items-databank_id-'+global_counter).select2(Select2AjaxObj());
        $('#line_item-global_counter').val(global_counter)
        $('#line_item-no-'+global_counter).html(global_counter - 1);
    }

    var destroyLineItem = function (itemId) {
        var r = confirm("Are you sure to delete Line Item?");
        if (r == true) {
            // $('#entry_item-ledger_id-'+itemId).select2(Select2AjaxObj());
            $('#line_item-'+itemId).remove();
            //CalculateTotal();
        }
    }


    return {
        // public functions
        init: function() {
            baseFunction();
        },
        createLineItem : createLineItem,
        destroyLineItem : destroyLineItem,
    };
}();

jQuery(document).ready(function() {
    FormControls.init();
});