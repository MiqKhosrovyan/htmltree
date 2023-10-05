@extends('layout')
@section('content')
    <div class="text">
        Search words <p>{{ $validated['search'] }}</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td class="body">{{ $data->title }}</td>
                    <td>{{ $data->body }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection

<style>
    .text {
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }

    .text p {
        color: red;
        text-decoration: underline;
    }
</style>
