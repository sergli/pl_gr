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
    <div class="col-sm-6">

        <div id="current_user_table" class="row p-2 table-responsive-sm">
            <table class="table table-sm table-dark">
                <caption class="text-right" style="caption-side: top">Current user</caption>
                <tr>
                    <th scope="row">ID</th> <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Full name</th> <td>{{$user->name}} {{$user->surname}}</td>
                </tr>
                <tr>
                    <th scope="row">Email</th> <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Role @ company</th> <td>{{$user->role->name}} @ <span class="text-success">{{$user->company->name}}</span></td>
                </tr>
            </table>
        </div>

        <div id="foreigners_table" class="row p-2 table-responsive-sm">
        <table class="table table-bordered table-hover text-nowrap">
            <caption class="text-right" style="caption-side: top">Foreigners</caption>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">position @ company</th>
                <th scope="col">Country</th>
                <th scope="col">Patent</th>
                <th scope="col">Policy</th>
                <th scope="col">Reg. dates</th>
                <th scope="col">Work dates</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($foreigners as $foreigner)
            <tr>

                <td>{{$foreigner->id}}</td>
                <td class="text-wrap">{{$foreigner->name}} {{$foreigner->surname}}</td>
                <td>{{$foreigner->position->name}} @ <span @if($foreigner->company->id === $user->company->id) class="text-success"@endif > {{$foreigner->company->name}}</span></td>
                <td class="text-wrap">{{$foreigner->country->name}}</td>

                <td>@include('foreigners.patent')</td>
                <td>@include('foreigners.policy')</td>

                <td>
                    @if ($foreigner->regdate || $foreigner->regenddate)
                    <table class="table table-sm table-borderless table-striped text-nowrap" >
                        <tr>
                            <th scope="row">start</th>
                            <td @if($foreigner->isNearExpiry('regdate')) class="table-danger" @endif > {{$foreigner->regdate}}</td>
                        </tr>
                        <tr>
                            <th scope="row">end</th>
                            <td @if($foreigner->isNearExpiry('regenddate')) class="table-danger" @endif > {{$foreigner->regenddate}}</td>
                        </tr>
                    </table>
                    @endif
                </td>

                <td>
                    @if ($foreigner->dateoutwork || $foreigner->dateinwork)
                    <table class="table table-sm table-borderless table-striped text-nowrap" >
                        <tr>
                            <th scope="row">start</th>
                            <td @if($foreigner->isNearExpiry('dateinwork')) class="table-danger" @endif > {{$foreigner->dateinwork}}</td>
                        </tr>
                        <tr>
                            <th scope="row">end</th>
                            <td @if($foreigner->isNearExpiry('dateoutwork')) class="table-danger" @endif >{{$foreigner->dateoutwork}}</td>
                        </tr>
                    </table>
                    @endif
                </td>

                <td>
                    <div class="row-cols-lg-1">
                        <div class="btn-group btn-group-vertical" role="group">
                            <a href="{{ route('foreigners.edit', $foreigner->id)}}" class="btn btn-outline-success btn-lg">Edit</a>
                            <form action="{{ route('foreigners.destroy', $foreigner->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-lg" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>

            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
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
