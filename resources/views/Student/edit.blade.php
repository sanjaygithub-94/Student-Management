<!DOCTYPE html>
<html>
<body>
<a href="{{url('/student')}}">Back</a>
<h2>Add Student</h2>

<form action="/update-student/{{$student->id}}" method="POST">
@csrf
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="{{$student->name}}"><br>
  @error('name')
    <div class="error">Required</div>
  @enderror
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age" value="{{$student->age}}"><br>
  @error('age')
    <div class="error">Required</div>
  @enderror
  <label for="gender">Gender:</label><br>
  <input type="radio" id="male" name="gender" <?php echo ($student->gender=='1')?'checked':'' ?> value="1">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" <?php echo ($student->gender=='0')?'checked':'' ?> value="0">
  <label for="female">Female</label><br>
  @error('gender')
    <div class="error">Required</div>
  @enderror
  <label for="reporting_person">Reporting Person:</label>
  <select name="reporting_person" id="reporting_person">
    <option value="Alex" <?=$student->reporting_person == 'Alex' ? ' selected="selected"' : '';?>>Alex</option>
    <option value="David"<?=$student->reporting_person == 'David' ? ' selected="selected"' : '';?>>David</option>
    <option value="John"<?=$student->reporting_person == 'John' ? ' selected="selected"' : '';?>>John</option>
    <option value="Paul"<?=$student->reporting_person == 'Paul' ? ' selected="selected"' : '';?>>Paul</option>
  </select><br>
  @error('reporting_person')
    <div class="error">Required</div>
  @enderror
  <input type="submit" value="Submit">
</form>
</body>
</html>