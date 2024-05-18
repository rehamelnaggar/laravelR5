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
  <label for="clientName">client name:</label><br>
  <p style="color:red">
  @error('clientName')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $client->clientName}}" ><br>
  <label for="phone">Phone:</label><br>
  <p style="color:red">
  @error('phone')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone}}"><br><br>
  <label for="email">email:</label><br>
  <p style="color:red">
  @error('email')
  {{ $message }}
  @enderror
  </p>
  <input type="email" id="email" name="email" class="form-control" value="{{ $client->email}}" ><br><br>
  <label for="website">website:</label><br>
  <p style="color:red">
  @error('website')
  {{ $message }}
  @enderror
  </p>
  <input type="text" id="website" name="website" class="form-control" value="{{ $client->website}}"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>