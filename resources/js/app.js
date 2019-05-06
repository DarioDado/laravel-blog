
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//disappear flash messages 
setTimeout(function() {
    $("#flash-message").fadeOut().empty();
}, 5000);

//prewiew selected image's name in upload form
function readFileInput(input) {
    if (input.files && input.files[0]) {
        $( ".file-name-label" ).html(`<i class="upload icon"></i> ${input.files[0].name}`);
        
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#upload-img-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#post-headline-image").change(function(){
    readFileInput(this);
});

//search
$('#search-icon').click(onSearch);

function onSearch() {
    $('#search-form').submit();
}