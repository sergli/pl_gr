@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-5">Add a foreigner</h1>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('foreigners.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input type="text" class="form-control" name="surname"/>
                </div>

                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select class="form-control" name="company_id" value="{{$user->company->id}}" readonly>
                        <option value="{{$user->company->id}}" selected>{{$user->company->name}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="position_id">Position:</label>
                    <select class="form-control" name="position_id" required>
                        @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="country_id">Country:</label>
                    <select class="form-control" name="country_id" required>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="poliscompany">Polis company:</label>
                    <input type="text" class="form-control" name="poliscompany" value="" />
                </div>

                <div class="btn-group" role="group">
                    <button type="submit" class="align-self-end btn btn-lg btn-primary">Add foreigner</button>
                    <a type="button" href="{{ route('foreigners.index')}}" class="btn btn-lg btn-secondary">To the list</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
