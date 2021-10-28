<h1>Client export </h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    @foreach ($clients as $client)
        <tr>
            <td> {{$client->id }}</td>
            <td> {{$client->name }}</td>
            <td> {{$client->surname }}</td>
            <td> {{$client->phone }}</td>
            <td> {{$client->email }}</td>
        </tr>
    @endforeach
</table>
