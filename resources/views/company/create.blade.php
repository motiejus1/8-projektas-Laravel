@extends('layouts.app')

@section('content')
<div class="container">

    @if ($errors->any())
    {{-- klaidu bus daugau nei 1 --}}

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif


    {{-- kai if'as; jeigu klaida title egizsituoja, vykdomas kazkoks tai kodas --}}
    {{-- atsiranda kintamasis $message -  klaidos zinute --}}
    @error('title')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror

    @error('description')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror

    @error('type_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror

    {{-- is-invalid - input parauduonoja --}}
    {{-- @error('title') -veikia kaip if'a --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Company') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                    <span role="alert" class="invalid-feedback">
                                        {{-- <strong>*{{$message}}</strong> --}}
                                        <img src=""/>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autofocus>

                                @error('description')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                                @error('logo')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="type_id">
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('number') is-invalid @enderror" name="number"/>
                                @error('number')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Qty') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control @error('qty') is-invalid @enderror" name="qty"/>
                                @error('qty')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="max_qty" class="col-md-4 col-form-label text-md-right">{{ __('Max Qty') }}</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control @error('max_qty') is-invalid @enderror" name="max_qty"/>
                                @error('max_qty')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Startdate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date"/>
                                @error('start_date')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Enddate') }}</label>

                            <div class="col-md-6">
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" name="end_date"/>
                                @error('end_date')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                            @enderror
                            </div>


                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
