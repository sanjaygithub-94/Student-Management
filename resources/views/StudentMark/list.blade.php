<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/custom.js"></script>
<body>
<a href="{{url('/')}}">Back</a>
<button class="primary" data-toggle="modal" data-target="#addStudentMark">Add Mark</button>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Maths</th>
    <th>Science</th>
    <th>History</th>
    <th>Term</th>
    <th>Total Marks</th>
    <th>Created On</th>
    <th>Action</th>
  </tr>
  @foreach($students as $key => $student)
  <tr>
    <td>{{$key+1}}</td>
    <td>{{$student->student->name}}</td>
    <td>{{$student->maths_mark}}</td>
    <td>{{$student->science_mark}}</td>
    <td>{{$student->history_mark}}</td>
    <td>{{$student->term}}</td>
    <td>{{$student->total_marks}}</td>
    <td>{{$student->created_at->format('M d, Y H:i A')}}</td>
    <td>
    <button class="primary" onclick="editStudentMark({{$student->id}})">Edit</button>
    <button class="primary" onclick="deleteStudentMark({{$student->id}})">Delete</button>
    </td>
  </tr>
  @endforeach
</table>

<div class="modal fade" id="addStudentMark" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Student Mark</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id='add_student_mark_form'>
            @csrf
              <label for="student_id">Student:</label>
              <select name="student_id" id="student_id">
              <option value="0">Please select</option>
                @if (!empty($studentsInfo))
                @foreach ($studentsInfo as $studentData)
                <option value="{{ $studentData['id'] }}">{{ $studentData['name'] }}</option>
                @endforeach
                @endif
              </select><br>
              <div class="student_id-error"></div>
              <label for="maths_mark">Maths:</label><br>
              <input type="text" id="maths_mark" name="maths_mark" value=""><br>
              <div class="maths_mark-error"></div>

              <label for="science_mark">Science:</label><br>
              <input type="text" id="science_mark" name="science_mark" value=""><br>
              <div class="science_mark-error"></div>

              <label for="history_mark">History:</label><br>
              <input type="text" id="history_mark" name="history_mark" value=""><br>
              <div class="history_mark-error"></div>
              <label for="term">Term:</label>
              <select name="term" id="term">
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
              </select><br>
              <div class="term-error"></div>
            <button type="button" class="add_student_mark_submit_btn">Save</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="editStudentMark" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Student Mark</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id='edit_student_mark_form'>
            @csrf
            <input type="hidden" id="student_mark_id" name="student_mark_id" value="">
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id">
            <option value="0">Please select</option>
              @if (!empty($studentsInfo))
              @foreach ($studentsInfo as $studentData)
              <option value="{{ $studentData['id'] }}">{{ $studentData['name'] }}</option>
              @endforeach
              @endif
            </select><br>
            @error('student_id')
              <div class="error"></div>
            @enderror
            <label for="maths_mark">Maths:</label><br>
            <input type="text" id="edit-maths_mark" name="maths_mark" value=""><br>
            <div class="edit-maths_mark-error"></div>

            <label for="science_mark">Science:</label><br>
            <input type="text" id="edit-science_mark" name="science_mark" value=""><br>
            <div class="edit-science_mark-error"></div>

            <label for="history_mark">History:</label><br>
            <input type="text" id="edit-history_mark" name="history_mark" value=""><br>
            <div class="edit-history_mark-error"></div>
            <label for="term">Term:</label>
            <select name="term" id="edit-term">
              <option id="edit-One" value="One" >One</option>
              <option id="edit-Two" value="Two">Two</option>
              <option id="edit-Three" value="Three">Three</option>
              <option id="edit-Four" value="Four">Four</option>
            </select><br>
            <button type="button" class="edit_student_mark_submit_btn">Save</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

</body>
</html>