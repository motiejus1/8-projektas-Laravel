@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($clients as $client)
            <tr>
                <td> {{$client->id }}</td>
                <td> {{$client->name }}</td>
                <td> {{$client->surname }}</td>
                <td> {{$client->phone }}</td>
                <td> {{$client->email }}</td>
                <td>
                    <a href="{{route('client.show',[$client])}}" class="btn btn-secondary">
                        Show
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="{{route('client.pdf')}}"> Export Clients table to PDF </a>
</div>
@endsection
