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
      <li class="active"><a href="{{ route('addStudent') }}">add</a></li>
      <li><a href="{{ route('Students') }}">Students</a></li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
  </div>
</nav>
<!-- End Nav bar -->
<div class="container" style="margin-left: 20px">
<h2>Insert Student</h2>

<form action="{{ route('insertStudent') }}" method="POST">
  @csrf
  <label for="studentName">student name:</label><br>
  <input type="text" id="studentName" name="studentName" value="insert name"><br>
  <label for="age">Age:</label><br>
  <input type="text" id="age" name="age" value="insert age"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>