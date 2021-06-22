@extends('base')

<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">PL Group</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')


@section('main')
<div class="row">
    <div class="col-sm-12">

        <h1 class="display-5">Current user</h1>
        <table class="table table-dark">
            <tr>
                <td>ID</td> <td>{{$user->id}}</td>
            </tr>
            <tr>
                <td>Name</td> <td>{{$user->name}} {{$user->surname}}</td>
            </tr>
            <tr>
                <td>Email</td> <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Company</td> <td>{{$user->company->name}}</td>
            </tr>
            <tr>
                <td>Role</td> <td>{{$user->role}}</td>
            </tr>
        </table>

        <h1 class="display-5">Foreigners</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Surname</td>
                <td>Company</td>
                <td>Position</td>
                <td>Country</td>
                <td>Polis company</td>
                <td colspan=2>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($foreigners as $foreigner)
            <tr>
                <td>{{$foreigner->id}}</td>
                <td>{{$foreigner->name}}</td>
                <td>{{$foreigner->surname}}</td>
                <td>{{$foreigner->company->name}}</td>
                <td>{{$foreigner->position->name}}</td>
                <td>{{$foreigner->country->name}}</td>
                <td>{{$foreigner->poliscompany}}</td>
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
<div class="btn-group" role="group">
    <a type="button" href="{{ route('foreigners.create')}}" class="align-self-end btn btn-lg btn-primary">Add foreigner</a>
        <a class="btn btn-lg btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
</div>
@endsection
