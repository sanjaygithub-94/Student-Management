
/* Javascript for Student module */
$(document).ready(function () {
    // add student
    $('.add_student_submit_btn').click(function (e) {
        e.preventDefault();
        var formData = $("#add_student_form").serialize();
        $.ajax({
            url: '/student',
            type: 'POST',
            data: formData,
            success: function (data) {
                if (data.success) {
                    $('#addStudent').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                  var data = xhr.responseJSON;
                  $.each(data.errors, function (key, val) {
                      console.log(key);
                      $("." + key + "-error").text(val[0]);
                  });
                }
            }
        });
    });
});



