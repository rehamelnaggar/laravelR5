<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert Client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <li><a href="{{ route('clients') }}">Clients</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
    </div>
  </nav>
  <!-- End Nav bar -->

  <div class="container" style="margin-left: 20px">
    <h2>Insert Client</h2>

    <form action="{{ route('insertClient') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="clientName">Client name:</label>
        <input type="text" id="clientName" name="clientName" class="form-control" value="{{ old('clientName') }}" required>
        @error('clientName')
          <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
        @error('phone')
          <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
          <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
  <label for="website">Website:</label><br>
  <p style="color:red">
    @error('website')
    <p style="color:red">{{ $message }}</p>
    @enderror
  </p>
  <input type="url" id="website" name="website" class="form-control" value="{{ old('website') }}" pattern="https?://.*">
</div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
        @error('address')
          <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="city">City:</label>
        <select name="city" id="city" class="form-control">
          <option value="">Select city</option>
          <option value="1" {{ old('city') == '1' ? 'selected' : '' }}>Cairo</option>
          <option value="2" {{ old('city') == '2' ? 'selected' : '' }}>Giza</option>
          <option value="3" {{ old('city') == '3' ? 'selected' : '' }}>Alex</option>
        </select>
        @error('city')
          <p style="color:red">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="active">Active:</label><br>
        <input type="checkbox" id="active" name="active" class="form-check-input" {{ old('active') ? 'checked' : '' }}>
      </div>

      <div class="form-group">
        <label for="image">Image:</label><br>
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