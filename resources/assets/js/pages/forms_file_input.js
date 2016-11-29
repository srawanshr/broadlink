/*
*  Altair Admin
*  @version v2.3.0
*  @author tzd
*  @license http://themeforest.net/licenses
*  forms_file_input.js - forms_file_input.html
*/

$(function() {
    // dropify file input
    altair_form_file_dropify.init();
});


altair_form_file_dropify = {
    init: function() {

        $('.dropify').dropify();

    }
};