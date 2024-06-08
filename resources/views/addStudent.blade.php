<!DOCTYPE html>
<html>
<head>
    <title>Insert Student</title>
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
                <li class="active"><a href="{{ route('addStudent') }}">Add</a></li>
                <li><a href="{{ route('students') }}">Students</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>
    <!-- End Nav bar -->

    <div class="container" style="margin-left: 20px">
        <h2>Insert Student</h2>

        <form action="{{ route('insertStudent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="studentName">Student Name:</label>
                <input type="text" id="studentName" name="studentName" class="form-control" value="{{ old('studentName') }}">
                @error('studentName')
                <p style="color:red">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" class="form-control" value="{{ old('age') }}">
                @error('age')
                <p style="color:red">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="active">Active:</label>
                <input type="checkbox" id="active" name="active" class="form-check-input" {{ old('active') ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
                @error('image')
                <p style="color:red">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>