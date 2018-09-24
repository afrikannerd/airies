
/**
 * Description of app
 * Created on : Jun 29, 2018, 22:10:30 PM
 * @author afrikannerd <https://github.com/afrikannerd>
 * @version "0.1"
 */
$(document).ready(function(){

    /*
    $('#addnew').on('click',function(){
        
        var cls = $('#class').val();
        var adm = $('#admno').val();
        var name = $('#name').val();

        $.post('create',{cls:cls,adm:adm,name:name},function(data){
            $("#info").html(data);

        });
    });


    $('.view_student').on('click',function (){
        $('.add_student_form').empty();
        $.post('/student/viewAll',{},function (data) {

            $("#info").html(data);
        });
    });

    $('.add-new').on('click',function () {
        $.post('/student/new',{},function (data) {
            $('.panel_content').html(data);
        });
    });

    $('#add').on('click',function () {
        $.post('/teacher/new',{},function (data) {
            $('.panel_content').html(data);
        });

    });

*/
});

function isNumeric(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}