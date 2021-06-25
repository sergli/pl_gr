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
            <fieldset class="border border-primary p-2">
                <legend class="w-auto">Basic</legend>

            <div class="row p-2">
                <div class="input-group col-sm-8">
                    <label for="name" class="input-group-text col-sm-3">Name</label>
                    <input type="text" placeholder="Name" class="form-control" name="name" id="name" value="{{ $foreigner->name }}" />
                    <label for="surname" class="input-group-text col-sm-3" hidden>Surname</label>
                    <input type="text" placeholder="Surname" class="form-control" name="surname" id="surname" value="{{ $foreigner->surname }}" />
                </div>
                <div class="w-100"></div>
                <div class="input-group col-sm-8">
                    <label for="email" class="input-group-text col-sm-3">Email</label>
                    <input type="text" placeholder="Email" class="form-control" name="email" id="email" value="{{ $foreigner->email }}" />
                </div>
                <div class="w-100"></div>
                <div class="input-group col-sm-8">
                    <label class="input-group-text col-sm-3" for="country_id">Country</label>
                    <select class="form-select form-control" name="country_id" id="country_id">
                        <option hidden>Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}" {{ $country->id == $foreigner->country->id ? 'selected="selected"' : '' }}>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </fieldset>

            <fieldset class="border border-primary p-2">
                <legend class="w-auto">Position @ company</legend>
                <div class="row p-2">
                <div class="input-group col-sm-8">
                    <label for="position_id" class="input-group-text col-sm-3" hidden>Position</label>
                    <select class="form-select form-control" name="position_id" id="position_id">
                        <option hidden>Position</option>
                        @foreach($positions as $position)
                        <option value="{{$position->id}}" {{ $position->id == $foreigner->position->id ? 'selected="selected"' : '' }}>{{$position->name}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text">@</span>
                    <label for="company_id" class="input-group-text col-sm-3" hidden>Company</label>
                    <select class="form-select form-control" name="company_id" id="company_id">
                        <option hidden>Company</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}" {{ $company->id == $foreigner->company->id ? 'selected="selected"' : '' }}>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                </div>
            </fieldset>

            <fieldset class="border border-primary p-2">
                <legend class="w-auto">Patent</legend>
                <div class="row p-2">
                    <div class="input-group col-sm-8">
                        <label for="patentnumber" class="input-group-text col-sm-3">Patent</label>
                        <label for="patentserie" class="input-group-text col-sm-3" hidden>Serie</label>
                        <input type="text" placeholder="Serie" class="form-control" name="patentserie" id="patentserie" value="{{ $foreigner->patentserie }}" />
                        <span class="input-group-text">@</span>
                        <input type="number" placeholder="Number" class="form-control" name="patentnumber" id="patentnumber" value="{{ $foreigner->patentnumber }}" />
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >Start</span>
                        <input type="date" class="form-control" placeholder="Start" name="patentdate" id="patentdate" aria-label="patentdate" value="{{ $foreigner->patentdate }}"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >End</span>
                        <input type="date" class="form-control" name="patentenddate" id="patentenddate" aria-label="patentenddate" value="{{ $foreigner->patentenddate }}"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >Next pay</span>
                        <input type="date" class="form-control" name="patentnextpaydate" id="patentnextpaydate" aria-label="patentnextpaydate" value="{{ $foreigner->patentnextpaydate }}"/>
                    </div>
                    <div class="w-100">
                </div>
            </fieldset>

            <fieldset class="border border-primary p-2">
                <legend  class="w-auto">Policy</legend>
                <div class="row p-2">
                    <div class="input-group col-sm-8">
                        <label for="polisnumber" class="input-group-text col-sm-3">Number</label>
                        <label for="poliscompany" class="input-group-text col-sm-3" hidden>Company</label>
                        <input type="number" placeholder="Number" class="form-control" name="polisnumber" id="polisnumber" value="{{ $foreigner->polisnumber }}" />
                        <span class="input-group-text">@</span>
                        <input type="text" placeholder="Company" class="form-control" name="poliscompany" id="poliscompany" value="{{ $foreigner->poliscompany }}" />
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >Start</span>
                        <input type="date" class="form-control" placeholder="Start" name="polisdate" id="polisdate" aria-label="polisdate" value="{{ $foreigner->polisdate }}"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >End</span>
                        <input type="date" class="form-control" name="polisenddate" id="polisenddate" aria-label="polisenddate" value="{{ $foreigner->polisenddate }}"/>
                    </div>
                </div>
            </fieldset>

            <fieldset class="border border-primary p-2">
                <legend  class="w-auto">Registration</legend>
                <div class="row p-2">
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >Start</span>
                        <input type="date" class="form-control" name="regdate" id="regdate" aria-label="regdate" value="{{ $foreigner->regdate }}"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >End</span>
                        <input type="date" class="form-control" name="regenddate" id="regenddate" aria-label="regenddate" value="{{ $foreigner->regenddate }}" />
                    </div>
                </div>
            </fieldset>

            <fieldset class="border border-primary p-2">
                <legend  class="w-auto">Work days</legend>
                <div class="row p-2">
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >Start</span>
                        <input type="date" class="form-control" name="dateinwork" id="dateinwork" aria-label="dateinwork" value="{{ $foreigner->dateinwork }}"/>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-sm-8">
                        <span class="input-group-text col-sm-3" >End</span>
                        <input type="date" class="form-control" name="dateoutwork" id="dateoutwork" aria-label="dateoutwork" value="{{ $foreigner->dateoutwork }}" />
                    </div>
                </div>
            </fieldset>


            <div class="btn-group p-2" role="group">
                <button type="submit" class="align-self-end btn btn-lg btn-primary">Update</button>
                <a type="button" href="{{ route('foreigners.index')}}" class="btn btn-lg btn-secondary">To the list</a>
            </div>


        </form>
    </div>
</div>
@endsection
