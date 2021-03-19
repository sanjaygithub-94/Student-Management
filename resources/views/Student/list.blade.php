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
<a href="{{url('/')}}">Back</a>
<a href="{{url('/add-student')}}"> Add Student</a>
<button class="primary" data-toggle="modal" data-target="#addStudent">ADD</button>

<table>
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
    <a href="{{url('edit-student/'.$student->id)}}"><button>Edit</button></a>
    <form action="{{url('delete-student/'.$student->id)}}" method="POST">
      @csrf<button type="submit">Delete</button>
    </form>
    </td>
  </tr>
  @endforeach
</table>

<div class="modal fade" id="addStudent" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Student</h4>
        </div>
        <div class="modal-body">
          <form action="" method="POST" id='add_student_form'>
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
            @error('reporting_person')
              <div class="error">Required</div>
            @enderror
            <button type="button" class="add_student_submit_btn">Save</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<!-- <div class="modal fade" id="editStudent" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Student</h4>
        </div>
        <div class="modal-body">
          <form action="/update-student/" method="POST">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value=""><br>
            @error('name')
              <div class="error">Required</div>
            @enderror
            <label for="age">Age:</label><br>
            <input type="text" id="age" name="age" value=""><br>
            @error('age')
              <div class="error">Required</div>
            @enderror
            <label for="gender">Gender:</label><br>
            <input type="radio" id="male" name="gender" value="1">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="0">
            <label for="female">Female</label><br>
            @error('gender')
              <div class="error">Required</div>
            @enderror
            <label for="reporting_person">Reporting Person:</label>
            <select name="reporting_person" id="reporting_person">
              <option value="Alex" >Alex</option>
              <option value="David">David</option>
              <option value="John">John</option>
              <option value="Paul">Paul</option>
            </select><br>
            @error('reporting_person')
              <div class="error">Required</div>
            @enderror
            <input type="submit" value="Submit">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div> -->

</body>
</html>