<!DOCTYPE html>
<html>

<head>
    <title>Student</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <div class="buttons">
            <a class="btn btn-link" href="{{url('/')}}">Back</a>
            <button class="btn btn-dark" data-toggle="modal" data-target="#addStudent">Add Student</button>
        </div>
        <table class="my-5 table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Reporting Person</th>
                <th>Action</th>
            </tr>
            @foreach($students as $key => $student)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{($student->gender == 1) ? 'M' : 'F' }}</td>
                <td>{{$student->reporting_person}}</td>
                <td>
                    <button class="btn btn-primary" onclick="editStudent({{$student->id}})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteStudent({{$student->id}})">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>



    <div class="modal fade" id="addStudent" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='add_student_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" value=""><br>
                        <div class="name-error"></div>
                        <label for="age">Age:</label><br>
                        <input type="text" id="age" name="age" value=""><br>
                        <div class="age-error"></div>
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="male" name="gender" value="1">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="0">
                        <label for="female">Female</label><br>
                        <div class="gender-error"></div>
                        <label for="reporting_person">Reporting Person:</label>
                        <select name="reporting_person" id="reporting_person">
                            <option value="Alex">Alex</option>
                            <option value="David">David</option>
                            <option value="John">John</option>
                            <option value="Paul">Paul</option>
                        </select><br>
                        <div class="reporting_person-error"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add_student_submit_btn">Save</button>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <div class="modal fade" id="editStudent" role="dialog">
        <div class="modal-dialog">
            <form action="" method="POST" id='edit_student_form'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" id="student_id" name="student_id" value="">
                        <label for="name">Name:</label><br>
                        <input type="text" id="edit_name" name="name" value=""><br>
                        <div class="edit-name-error"></div>
                        <label for="age">Age:</label><br>
                        <input type="text" id="edit_age" name="age" value=""><br>
                        <div class="edit-age-error"></div>
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="edit-male" name="gender" value="1">
                        <label for="male">Male</label>
                        <input type="radio" id="edit-female" name="gender" value="0">
                        <label for="female">Female</label><br>
                        <div class="edit-gender-error"></div>
                        <label for="reporting_person">Reporting Person:</label>
                        <select name="reporting_person" id="edit-reporting_person">
                            <option id="edit-Alex" value="Alex">Alex</option>
                            <option id="edit-David" value="David">David</option>
                            <option id="edit-John" value="John">John</option>
                            <option id="edit-Paul" value="Paul">Paul</option>
                        </select><br>
                        <div class="edit-reporting-error"></div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success edit_student_submit_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src="/js/custom.js"></script>
</body>

</html>