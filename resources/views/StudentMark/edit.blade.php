<!DOCTYPE html>
<html>
<body>

<a href="{{url('/student-marks')}}">Back</a>
<h2>Edit Student Mark</h2>

<form action="/update-student-marks/{{$studentDetails->id}}" method="POST">
@csrf

<label for="student_id">Student:</label>
  <select name="student_id" id="student_id">
  <option value="0">Please select</option>
    @if (!empty($students))
    @foreach ($students as $student)
    <option value="{{ $student['id'] }}" <?php if ($student['id'] == $studentDetails->student->id) echo 'selected'; ?>>{{ $student['name'] }}</option>
    @endforeach
    @endif
  </select><br>
  @error('student_id')
    <div class="error">Required</div>
  @enderror
  <label for="maths_mark">Maths:</label><br>
  <input type="text" id="maths_mark" name="maths_mark" value="{{$studentDetails->maths_mark}}"><br>
  @error('maths_mark')
    <div class="error">Required</div>
  @enderror

  <label for="science_mark">Science:</label><br>
  <input type="text" id="science_mark" name="science_mark" value="{{$studentDetails->science_mark}}"><br>
  @error('science_mark')
    <div class="error">Required</div>
  @enderror

  <label for="history_mark">History:</label><br>
  <input type="text" id="history_mark" name="history_mark" value="{{$studentDetails->history_mark}}"><br>
  @error('history_mark')
    <div class="error">Required</div>
  @enderror
  <label for="term">Term:</label>
  <select name="term" id="term">
    <option value="One" <?=$studentDetails->term == 'One' ? ' selected="selected"' : '';?>>One</option>
    <option value="Two" <?=$studentDetails->term == 'Two' ? ' selected="selected"' : '';?>>Two</option>
    <option value="Three" <?=$studentDetails->term == 'Three' ? ' selected="selected"' : '';?>>Three</option>
    <option value="Four" <?=$studentDetails->term == 'Four' ? ' selected="selected"' : '';?>>Four</option>
  </select><br>
  @error('term')
    <div class="error">Required</div>
  @enderror
  <input type="submit" value="Submit">
</form>
</body>
</html>