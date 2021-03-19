<!DOCTYPE html>
<html>

<body>
<a href="{{url('/student')}}">Back</a>
<h2>Add Student</h2>

<form action="/student" method="POST">
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
    <option value="Alex">Alex</option>
    <option value="David">David</option>
    <option value="John">John</option>
    <option value="Paul">Paul</option>
  </select><br>
  @error('reporting_person')
    <div class="error">Required</div>
  @enderror
  <input type="submit" value="Submit">
</form>
</body>
</html>