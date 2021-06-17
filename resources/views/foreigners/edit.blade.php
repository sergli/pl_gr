@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a foreigner</h1>

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

                <label for="first_name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $foreigner->name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Surname:</label>
                <input type="text" class="form-control" name="surname" value={{ $foreigner->surname }} />
            </div>

            <div class="form-group">
                <label for="email">Company_id:</label>
                <input type="text" class="form-control" name="company_id" value={{ $foreigner->company_id }} />
            </div>
            <div class="form-group">
                <label for="city">Ccode:</label>
                <input type="text" class="form-control" name="ccode" value={{ $foreigner->ccode }} />
            </div>
            <div class="form-group">
                <label for="country">Country_id:</label>
                <input type="text" class="form-control" name="country_id" value={{ $foreigner->country_id }} />
            </div>
            <div class="form-group">
                <label for="job_title">Polis number:</label>
                <input type="text" class="form-control" name="job_title" value={{ $foreigner->polisnumber }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
