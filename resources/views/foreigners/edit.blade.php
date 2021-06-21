@extends('base')

<div>
    <a style="margin: 19px;" href="{{ route('foreigners.index')}}" class="btn btn-primary">Foreigners</a>
</div

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-4">Update a foreigner</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('foreigners.update', $foreigner->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $foreigner->name }} />
            </div>

            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" value={{ $foreigner->surname }} />
            </div>

            <div class="form-group">
                <label for="company_id">Company:</label>
                <select class="form-control" name="company_id" value="{{$user->company->id}}" readonly>
                    <option value="{{$user->company->id}}" selected>{{$user->company->name}}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="position_id">Position:</label>
                <select class="form-control" name="position_id">
                    <option hidden>Select Position</option>
                    @foreach($positions as $position)
                    <option value="{{$position->id}}" {{ $position->id == $foreigner->position->id ? 'selected' : '' }}>{{$position->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="country_id">Country:</label>
                <select class="form-control" name="country_id">
                    <option hidden>Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" {{ $country->id == $foreigner->country->id ? 'selected' : '' }}>{{$country->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="poliscompany">Polis company:</label>
                <input type="text" class="form-control" name="poliscompany" value={{ $foreigner->poliscompany }} />
            </div>

            
            <div class="btn-group" role="group">
                <button type="submit" class="align-self-end btn btn-lg btn-primary">Update</button>
                <a type="button" href="{{ route('foreigners.index')}}" class="btn btn-lg btn-secondary">To the list</a>
            </div>


        </form>
    </div>
</div>
@endsection
