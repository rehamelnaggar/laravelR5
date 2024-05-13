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
    <h1><strong>Client: </strong>{{ $client->phone }}</h1>
    <hr>
    <h1><strong>Client: </strong>{{ $client->email }}</h1>
    <hr>
    <h1><strong>Client: </strong>{{ $client->website }}</h1>
    <hr>
</body>
</html>