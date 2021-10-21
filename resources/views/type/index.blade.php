@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <tr>


            {{-- id, Id, ID (case-insensitive) --}}
            {{-- title, Title, TITLE (case-sensitive) --}}
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink('title')</th>
            <th>@sortablelink('description')</th>
        </tr>

        @foreach ($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->title}}</td>
                <td>{{$type->description}}</td>
            </tr>
        @endforeach
    </table>
    {!! $types->appends(Request::except('page'))->render() !!}
</div>
@endsection
