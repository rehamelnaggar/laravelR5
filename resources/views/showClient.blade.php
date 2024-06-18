<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show {{ $client->clientName }} </title>
</head>
<body>
    <h1><strong>Client: </strong>{{ $client->clientName }}</h1>
    <hr>
    <h1><strong>Phone: </strong>{{ $client->phone }}</h1>
    <hr>
    <h1><strong>Email: </strong>{{ $client->email }}</h1>
    <hr>
    <h1><strong>Website: </strong>{{ $client->website }}</h1>
    <hr>
    <h1><strong>Address: </strong>{{ $client->address }}</h1>
    <hr>
    <h1><strong>City: </strong>{{ $client->city }}</h1>
    <hr>
    <p><img src="{{ asset('assets/images/'.$client->image) }}" alt=""></p>

</body>
</html>