@extends('layouts.app')

@section('content')

<div class="container">
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>{{$client->id}}</td>
        <td>{{$client->name}}</td>
        <td>{{$client->surname}}</td>
        <td>{{$client->phone}}</td>
        <td>{{$client->email}}</td>
    </tr>
</table>
<a href="{{route('client.pdfclient', [$client])}}" class="btn btn-primary">Export Client PDF</a>
</div>

@endsection
