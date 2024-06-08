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
        <th>Image</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Show</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <td>{{ $student->studentName }}</td>
        <td>{{ $student->age }}</td>
        <td>
            @if ($student->image)
              <img src="{{ asset('assets/images/' . $student->image) }}" alt="Student Image" width="50">
            @else
              No Image
            @endif
          </td>
          <td>{{ $student->active ? "Yes" : "No" }}</td>
          <td><a href="{{ route('editStudents', $student->id) }}" class="btn btn-warning">Edit</a></td>
          <td><a href="{{ route('showStudent', $student->id) }}" class="btn btn-info">Show</a></td>
          <td><form action="{{ route('delStudent')}}" method="post">
          @csrf
          @method('Delete')
            <input type="hidden" value="{{ $student->id }}" name="id">
            <input type="submit" onclick="return confirm('Are you sure to delete?')" value="Delete"class="btn btn-danger">
       </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>

</body>
</html>