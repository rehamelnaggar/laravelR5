<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Start Nav bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Students</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('addStudent') }}">Add Student</a></li>
      <li><a href="{{ route('addStudent') }}">Student</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
  </div>
</nav>
<!-- End Nav bar -->
<div class="container" style="margin-left: 20px">
<h2>Edit Student</h2>

<form action="{{ route('updateStudents', $student->id) }}" method="POST">
  @csrf
  @method('put')
  <label for="studentName">Student name:</label><br>
  <p style="color:red">
  @error('studentName')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="studentName" name="studentName" class="form-control" value="{{ $student->studentName}}" ><br>
  <label for="age">Age:</label><br>
  <p style="color:red">
  @error('age')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="age" name="age" class="form-control" value="{{ $student->age}}"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>