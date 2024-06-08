<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  @include('includes.navs')
<div class="container">
  <h2>Students Data</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Age</th>
        <th>restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trash as $student)
      <tr>
        <td>{{ $student->studentName }}</td>
        <td>{{ $student->age }}</td>
        <td><a href="{{ route('restoreStudents',$student->id)}}">Restore</a></td>
        <td>
        <form action="{{ route('foceDelete')}}" method="post">
          @csrf
          @method('Delete')
            <input type="hidden" value="{{ $student->id }}" name="id">
            <input type="submit" onclick="return confirm('Are you sure to delete?')" value="Delete" value="Delete"class="btn btn-danger">
       </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>