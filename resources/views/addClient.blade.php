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
      <a class="navbar-brand" href="#">Clients</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('addClient') }}">Add</a></li>
      <li><a href="{{ route('clients') }}">Clients</a>/li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>
  </div>
</nav>
<!-- End Nav bar -->
<div class="container" style="margin-left: 20px">
<h2>Insert Client</h2>

<form action="{{ route('insertClient') }}" method="POST"enctype="multipart/form-data">
  @csrf
  <label for="clientName">client name:</label><br>
  <p style="color:red">
  @error('clientName')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="clientName" name="clientName" value="{{ old('clientName') }}"><br>
  <label for="phone">Phone:</label><br>
  <p style="color:red">
  @error('phone')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="phone" name="phone" value="{{ old('phone') }}"><br><br>
  <label for="email">email:</label><br>
  <p style="color:red">
  @error('email')
  {{ $message }}
  @enderror
  </p>
  <input type="email" id="email" name="email"  value="{{ old('email') }}"><br><br>
  <label for="website">website:</label><br>
  <p style="color:red">
  @error('website')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="website" name="website"  value="{{ old('website') }}"><br><br>
  <label for="city">City:</label><br>
  <p style="color:red">
  @error('city')
  {{ $message }}
  @enderror
  </p>
  <select name="city" id="city" class="form-control">
                    <option value="">select city</option>
                    <option value="Cairo" {{ old('city') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                    <option value="Giza" {{ old('city') == 'Giza' ? 'selected' : '' }}>Giza</option>
                    <option value="Alex" {{ old('city') == 'Alex' ? 'selected' : '' }}>Alex</option>
                </select>

    <br><br>
    <label for="active">Active:</label>
    <input type="checkbox" id="active" name="active" class="form-check-input" {{ old('active') ? 'checked' : '' }}><br>
    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image" class="form-control"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>