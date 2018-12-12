var FormControls = function () {
    $('#users-table').DataTable();
    //== Private functions
    //for Previewing Image on Upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image_previewer').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readURL(this);
    });
    //Previewing image ends here

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
        var id = $('#line_item-'+itemId).children().find('input#q_id-'+itemId).val();
        var degree = $('#line_item-title_id-'+id).val();
        if (r == true) {
            if(degree){
                // $('#entry_item-ledger_id-'+itemId).select2(Select2AjaxObj());
                $.ajax({
                    method: "POST",
                    url: "qualification_delete",
                    data: { id: id, _token: $('input[name=_token]').val() }
                })
                    .done(function() {
                        console.log('Done');
                })
                .fail(function(){
                    alert('Something Went Wrong ! Please Try Again Later');
                });
                //CalculateTotal();
            }
            $('#line_item-'+itemId).remove();
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