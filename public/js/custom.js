/* Javascript for Student Management */
$(document).ready(function() {
    // add student
    $('.add_student_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#add_student_form").serialize();
        $.ajax({
            url: '/student',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#addStudent').modal('toggle');
                    document.getElementById("add_student_form").reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $("." + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });
    // update student
    $('.edit_student_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#edit_student_form").serialize();
        $.ajax({
            url: '/update-student',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#editStudent').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $(".edit-" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // add student mark
    $('.add_student_mark_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#add_student_mark_form").serialize();
        $.ajax({
            url: '/student-marks',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#addStudentMark').modal('toggle');
                    document.getElementById("add_student_mark_form").reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $("." + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });

    // update student mark
    $('.edit_student_mark_submit_btn').click(function(e) {
        e.preventDefault();
        var formData = $("#edit_student_mark_form").serialize();
        $.ajax({
            url: '/update-student-marks',
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.success) {
                    $('#editStudent').modal('toggle');
                    window.location.reload();
                }
            },
            error: function(xhr) {
                $("#spinner-text").html('');
                if (xhr.status == 422) {
                    var data = xhr.responseJSON;
                    $.each(data.errors, function(key, val) {
                        $(".edit-" + key + "-error").text(val[0]);
                    });
                }
            }
        });
    });
});

//edit student
function editStudent(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'edit-student/' + id,
        type: 'get',
        success: function(data) {
            $('#student_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#edit_age').val(data.age);
            if (data.gender == 1) {
                document.getElementById("edit-male").checked = true;
            } else {
                document.getElementById("edit-female").checked = true;
            }
            if (data.reporting_person == 'Alex') {
                document.getElementById("edit-reporting_person").selectedIndex = "0";
            } else if (data.reporting_person == 'David') {
                document.getElementById("edit-reporting_person").selectedIndex = "1";
            } else if (data.reporting_person == 'John') {
                document.getElementById("edit-reporting_person").selectedIndex = "2";
            } else if (data.reporting_person == 'Paul') {
                document.getElementById("edit-reporting_person").selectedIndex = "3";
            }
            $('#editStudent').modal('show');
        }
    });
}

//delete student
function deleteStudent(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete-student/" + id,
        method: "POST",
        data: {
            "id": id,
            "_method": 'POST'
        },
        success: function(data) {
            if (data.success) {
                window.location.reload();
            }
        }
    });
}

//edit student mark
function editStudentMark(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'edit-student-marks/' + id,
        type: 'get',
        success: function(data) {
            $("#edit_student_id").val(data.student.id).trigger('change');
            $('#student_mark_id').val(data.id);
            $('#edit-maths_mark').val(data.maths_mark);
            $('#edit-science_mark').val(data.science_mark);
            $('#edit-history_mark').val(data.history_mark);
            if (data.term == 'One') {
                document.getElementById("edit-term").selectedIndex = "0";
            } else if (data.term == 'Two') {
                document.getElementById("edit-term").selectedIndex = "1";
            } else if (data.term == 'Three') {
                document.getElementById("edit-term").selectedIndex = "2";
            } else if (data.term == 'Four') {
                document.getElementById("edit-term").selectedIndex = "3";
            }
            $('#editStudentMark').modal('show');
        }
    });
}

//delete student mark
function deleteStudentMark(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete-student-marks/" + id,
        method: "POST",
        data: {
            "id": id,
            "_method": 'POST'
        },
        success: function(data) {
            if (data.success) {
                window.location.reload();
            }
        }
    });
}