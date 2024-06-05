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
                <li><a href="{{ route('clients') }}">Clients</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
        </div>
    </nav>
    <!-- End Nav bar -->

    <div class="container" style="margin-left: 20px">
        <h2>Edit Client</h2>
        
        
        <form action="{{ route('updateClients', $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="clientName">Client Name:</label>
                <p style="color: red">
                    @error('clientName')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" id="clientName" name="clientName" class="form-control" value="{{ $client->clientName }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <p style="color: red">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <p style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
                <input type="email" id="email" name="email" class="form-control" value="{{ $client->email }}" required>
            </div>

            <div class="form-group">
                <label for="website">Website:</label>
                <p style="color: red">
                    @error('website')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" id="website" name="website" class="form-control" value="{{ $client->website }}" required>
            </div>

            <div class="form-group">
                <label for="address">address:</label>
                <p style="color: red">
                    @error('address')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" id="address" name="address" class="form-control" value="{{ $client->address }}" required>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <p style="color: red">
                    @error('city')
                        {{ $message }}
                    @enderror
                </p>
                <select name="city" id="city" class="form-control" required>
                    <option value="">Please Select City</option>
                    <option value="Cairo" {{ $client->city == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                    <option value="Giza" {{ $client->city == 'Giza' ? 'selected' : '' }}>Giza</option>
                    <option value="Alex" {{ $client->city == 'Alex' ? 'selected' : '' }}>Alex</option>
                </select>
            </div>

            <div class="form-group">
                <label for="active">Active:</label>
                <input type="checkbox" id="active" name="active" class="form-check-input" {{ $client->active ? 'checked' : '' }}>
            </div>

            <div class="form-group">
                @if($client->image)
                    <p>
                        <img src="{{ asset('assets/images/' . $client->image) }}" alt="Client Image" width="150">
                    </p>
                @endif
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
       
    </div>

</body>
</html>