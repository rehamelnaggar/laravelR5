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
<h2>Edit Client</h2>

<form action="{{ route('updateClients', $client->id) }}" method="POST">
    @csrf
    @method('put')
    <label for="clientName">Client name:</label><br>
    <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $client->clientName }}"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}"><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}"><br><br>
    <label for="website">website:</label><br>
    <input type="text" id="website" name="website" class="form-control" value="{{ $client->website }}"><br><br>

    <label for="city">City:</label><br>
    <p style="color: red">
      @error('city')
        {{ $message }}
      @enderror
    </p>
    <select name="city" id="city" class="form-control">
      <option value="">Please Select City</option>
      <option value="Cairo" {{ old('city') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
      <option value="Giza" {{ old('city') == 'Giza' ? 'selected' : '' }}>Giza</option>
      <option value="Alex" {{ old('city') == 'Alex' ? 'selected' : '' }}>Alex</option>
    </select>
    <br><br>
    <label for="active">Active:</label><br>
    <input type="checkbox" id="active" name="active" class="form-check-input" {{ old('active') ? 'checked' : '' }}><br>

    <p><img src="{{ asset('assets/images/' . $client->image)  }}" alt=""></p>
    <label for="image">Image:</label><br>
    <input type="file" id="image" name="image" class="form-control"><br><br>

    <input type="submit" value="Submit">
  </form> 
</div>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>