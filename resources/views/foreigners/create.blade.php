@extends('base')

<div>
    <a style="margin: 19px;" href="{{ route('foreigners.index')}}" class="btn btn-primary">Foreigners</a>
</div

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-4">Add a foreigner</h1>
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
                    <select class="form-control" name="company_id" required>
                        <option value="" disabled selected>Select Company</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="position_id">Position:</label>
                    <select class="form-control" name="position_id" required>
                        <option value="" disabled selected>Select Position</option>
                        @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="country_id">Country:</label>
                    <select class="form-control" name="country_id" required>
                        <option value="" disabled selected>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="poliscompany">Polis company:</label>
                    <input type="text" class="form-control" name="poliscompany" value="" />
                </div>

                <button type="submit" class="btn btn-primary">Add foreigner</button>
            </form>
        </div>
    </div>
</div>
@endsection
