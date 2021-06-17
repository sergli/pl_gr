@extends('base')

<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>


<div>
    <a style="margin: 19px;" href="{{ route('foreigners.create')}}" class="btn btn-primary">New foreigner</a>
</div>

@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">Foreigners</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Job Title</td>
                <td>City</td>
                <td>Country</td>
                <td colspan = 2>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($foreigners as $foreigner)
            <tr>
                <td>{{$foreigner->id}}</td>
                <td>{{$foreigner->name}} {{$foreigner->surname}}</td>
                <td>{{$foreigner->company_id}}</td>
                <td>{{$foreigner->ccode}}</td>
                <td>{{$foreigner->patentserie}}</td>
                <td>{{$foreigner->country_id}}</td>
                <td>
                    <a href="{{ route('foreigners.edit', $foreigner->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('foreigners.destroy', $foreigner->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection
