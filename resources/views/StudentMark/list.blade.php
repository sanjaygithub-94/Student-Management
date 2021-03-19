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
<body>
<a href="{{url('/')}}">Back</a>
<a href="{{url('/add-student-marks')}}"> Add Marks</a>

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
    <a href="{{url('edit-student-marks/'.$student->id)}}"><button>Edit</button></a>
    <form action="{{url('delete-student-marks/'.$student->id)}}" method="POST">
      @csrf<button type="submit">Delete</button>
    </form>
    </td>
  </tr>
  @endforeach
</table>

</body>
</html>