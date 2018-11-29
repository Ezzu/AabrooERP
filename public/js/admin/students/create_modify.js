var FormControls = function(){
    $('#users-table').DataTable();
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

}();

$(document).ready(function(){
    FormControls.init();
});