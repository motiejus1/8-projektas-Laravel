@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('company.index')}}" method="GET">
        @csrf
        <select name="collumnname">
            <option value="id">ID</option>
            <option value="title">Title</option>
            <option value="description">Description</option>
            <option value="type_id">Type</option>

        </select>

        <select name="sortby">
            <option value="asc">ASC</option>
            <option value="desc">DESC</option>
        </select>

        <button type="submit">SORT</button>

    </form>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
        </tr>
        @foreach ($companies as $company)
            <tr>
                <td> {{$company->id }}</td>
                <td> {{$company->title }}</td>
                <td> {!!$company->description !!}</td>
                <td> {{$company->companyType->title }}</td>
            </tr>
        @endforeach
    </table>

    {{-- {{ $companies->links() }} --}}

    {!! $companies->appends(Request::except('page'))->render() !!}
</div>
@endsection
