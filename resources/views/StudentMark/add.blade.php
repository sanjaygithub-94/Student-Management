<!DOCTYPE html>
<html>
<body>

<a href="{{url('/student')}}">Back</a>
<h2>Add Student</h2>

<form action="/student-marks" method="POST">
@csrf

<label for="student_id">Student:</label>
  <select name="student_id" id="student_id">
  <option value="0">Please select</option>
    @if (!empty($students))
    @foreach ($students as $student)
    <option value="{{ $student['id'] }}">{{ $student['name'] }}</option>
    @endforeach
    @endif
  </select><br>
  @error('student_id')
    <div class="error">Required</div>
  @enderror
  <label for="maths_mark">Maths:</label><br>
  <input type="text" id="maths_mark" name="maths_mark" value=""><br>
  @error('maths_mark')
    <div class="error">Required</div>
  @enderror

  <label for="science_mark">Science:</label><br>
  <input type="text" id="science_mark" name="science_mark" value=""><br>
  @error('science_mark')
    <div class="error">Required</div>
  @enderror

  <label for="history_mark">History:</label><br>
  <input type="text" id="history_mark" name="history_mark" value=""><br>
  @error('history_mark')
    <div class="error">Required</div>
  @enderror
  <label for="term">Term:</label>
  <select name="term" id="term">
    <option value="One">One</option>
    <option value="Two">Two</option>
    <option value="Three">Three</option>
    <option value="Four">Four</option>
  </select><br>
  @error('term')
    <div class="error">Required</div>
  @enderror
  <input type="submit" value="Submit">
</form>
</body>
</html>