@extends('layout')
@section('content')
    <div class="container">
        <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="InputSearch">Search Text</label>
                <input name="search" type="text" class="form-control @error('search') is-invalid @enderror" id="InputSearch"
                    placeholder="Enter word">

            </div>
            @error('search')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="countOfWord">Count Number of Between word </label>
                <input name="countOfWord" type="number" class="form-control @error('countOfWord') is-invalid @enderror"
                    id="countOfWord" placeholder="Enter Count">

            </div>
            @error('countOfWord')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
