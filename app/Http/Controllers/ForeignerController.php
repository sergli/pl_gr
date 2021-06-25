<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Foreigner;
use Illuminate\Support\Facades\Auth;

class ForeignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $foreigners = Foreigner::all()->where('company_id', $user->company->id);

        return view('foreigners.index', compact('foreigners', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->user();
        $companies = \App\Models\Company::all()->unique('name');
        $countries = \App\Models\Country::all()->unique('name');
        $positions = \App\Models\Position::all()->unique('name');

        return view('foreigners.create', compact('user', 'companies', 'countries', 'positions'));
    }

    protected function getAllValidationRules() : array
    {
        return [
            'name'              => 'required',
            'surname'           => 'required',
            'company_id'        => 'required|numeric',
            'country_id'        => 'required|numeric',
            'position_id'       => 'required|numeric',
            'patentdate'        => 'nullable|date|date_format:Y-m-d',
            'patentenddate'     => 'nullable|date|date_format:Y-m-d|after_or_equal:patentdate',
            'patentnextpaydate' => 'nullable|date|date_format:Y-m-d|after_or_equal:patentdate',
            'patentserie'       => 'nullable|string',
            'patentnumber'      => 'nullable|numeric',
            'polisdate'         => 'nullable|date|date_format:Y-m-d',
            'polisenddate'      => 'nullable|date|date_format:Y-m-d|after_or_equal:polisdate',
            'poliscompany'      => 'nullable|string',
            'polisnumber'       => 'nullable|numeric',
            'dateinwork'        => 'nullable|date|date_format:Y-m-d',
            'dateoutwork'       => 'nullable|date|date_format:Y-m-d|after_or_equal:dateinwork',
            'regdate'           => 'nullable|date|date_format:Y-m-d',
            'regenddate'        => 'nullable|date|date_format:Y-m-d|after_or_equal:regdate',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->getAllValidationRules();
        $attributes = array_map(function($attribute) use ($request) {
            return $request->get($attribute);
        }, array_keys($rules));

        $request->validate($rules);
        $Foreigner = new Foreigner($attributes);
        $Foreigner->save();

        return redirect('/foreigners')->with('success', 'Foreigner saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $foreigner = Foreigner::find($id);

        $user = $request->user();
        $companies = \App\Models\Company::all()->unique('name');
        $countries = \App\Models\Country::all()->unique('name');
        $positions = \App\Models\Position::all()->unique('name');

        return view('foreigners.edit', compact('user', 'foreigner', 'companies', 'countries', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation_rules = $this->getAllValidationRules();
        // company is not editable
        unset($validation_rules['company_id']);
        $attributes = array_keys($validation_rules);

        $request->validate($validation_rules);
        $foreigner = Foreigner::find($id);
        foreach ($attributes as $attribute) {
            $foreigner->{$attribute} = $request->get($attribute);
        }
        $foreigner->save();

        return redirect('/foreigners')->with('success', 'Foreigner updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foreigner = Foreigner::find($id);
        $foreigner->delete();

        return redirect('/foreigners')->with('success', 'Foreigner deleted!');
    }
}
