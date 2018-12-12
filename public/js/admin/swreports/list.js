var FormControls = function(){
    //== Private functions
    $("#user_id").select2({
        placeholder: "Select Employee(s)"
    });

   $('.select2').select2();

    var baseFunction = function () {
        $( "#validation-form" ).validate({
            // define validation rules
            errorElement: 'span',
            errorClass: 'help-block',
            rules: {
                month: {
                    required: true
                },
                year: {
                    required: true
                },
                user_id: {
                    required: true
                }
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
        });
    }

    return {
        // public functions
        init: function() {
            baseFunction();
        }
    };

}();

$(document).ready(function(){
    FormControls.init();
});