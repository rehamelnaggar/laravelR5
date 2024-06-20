<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ __('messages.direction') }}">
<head>
  <title>{{ __('messages.clients_data') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      text-align: {{ __('messages.alignment') }};
    }
    .table {
      direction: {{ __('messages.direction') }};
    }
    .navbar-nav {
      float: {{ __('messages.alignment') == 'right' ? 'right' : 'left' }};
    }
    .navbar-nav.navbar-right {
      float: {{ __('messages.alignment') == 'right' ? 'right' : 'left' }};
    }
  </style>
</head>
<body>
  @include('includes.nav') 
  <div class="container">
    <h2>{{ __('messages.clients_data') }}</h2>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>{{ __('messages.client_name') }}</th>
          <th>{{ __('messages.phone') }}</th>
          <th>{{ __('messages.email') }}</th>
          <th>{{ __('messages.website') }}</th>
          <th>{{ __('messages.address') }}</th>
          <th>{{ __('messages.city') }}</th>
          <th>{{ __('messages.image') }}</th>
          <th>{{ __('messages.active') }}</th>
          <th>{{ __('messages.edit') }}</th>
          <th>{{ __('messages.show') }}</th>
          <th>{{ __('messages.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($clients as $client)
        <tr>
          <td>{{ $client->clientName }}</td>
          <td>{{ $client->phone }}</td>
          <td>{{ $client->email }}</td>
          <td>{{ $client->website }}</td>
          <td>{{ $client->address }}</td>
          <td>{{ $client->city }}</td>
          <td>
            @if ($client->image)
              <img src="{{ asset('assets/images/' . $client->image) }}" alt="Client Image" width="50">
            @else
              No Image
            @endif
          </td>
          <td>{{ $client->active ? __('messages.active') : 'No' }}</td>
          <td><a href="{{ route('editClients', $client->id) }}" class="btn btn-warning">{{ __('messages.edit') }}</a></td>
          <td><a href="{{ route('showClient', $client->id) }}" class="btn btn-info">{{ __('messages.show') }}</a></td>
          <td>
            <form action="{{ route('delClient', $client->id) }}" method="post">
              @csrf
              @method('DELETE')
              <input type="submit" onclick="return confirm('Are you sure to delete?')" value="{{ __('messages.delete') }}" class="btn btn-danger">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $clients->links() }} 
  </div>
</body>
</html>