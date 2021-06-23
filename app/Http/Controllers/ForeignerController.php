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
        $positions =  \App\Models\Position::all()->unique('name');

        return view('foreigners.create', compact('user', 'companies', 'countries', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'              => 'required',
                'surname'           => 'required',
                'company_id'        => 'required|numeric',
                'country_id'        => 'required|numeric',
                'position_id'       => 'required|numeric',
                // patent
                'patentdate'        => 'nullable|date',
                'patentenddate'     => 'nullable|date',
                'patentnextpaydate' => 'nullable|date',
                'patentserie'       => 'string',
                'patentnumber'      => 'numeric',
                // polis
                'polisdate'         => 'nullable|date|date_format:Y-m-d',
                'polisenddate'      => 'nullable|date|date_format:Y-m-d|after_or_equal:polisdate',
                'poliscompany'      => 'string',
                'polisnumber'       => 'numeric',
                //
                'dateinwork'        => 'nullable|date|date_format:Y-m-d',
                'dateoutwork'       => 'nullable|date|date_format:Y-m-d|after_or_equal:dateinwork',
                // reg dates
                'regdate'           => 'nullable|date|date_format:Y-m-d',
                'regenddate'        => 'nullable|date|date_format:Y-m-d|after_or_equal:regdate',
            ]
        );
        $Foreigner = new Foreigner(
            [
                'name'              => $request->get('name'),
                'surname'           => $request->get('surname'),
                'company_id'        => $request->get('company_id'),
                'country_id'        => $request->get('country_id'),
                'position_id'       => $request->get('position_id'),
                // pagent
                'patentdate'        => $request->get('patentdate'),
                'patentenddate'     => $request->get('patentenddate'),
                'patentnextpaydate' => $request->get('patentnextpaydate'),
                'patentserie'       => $request->get('patentserie'),
                'patentnumber'      => $request->get('patentnumber'),
                // polis
                'polisdate'         => $request->get('polisdate'),
                'polisenddate'      => $request->get('polisenddate'),
                'poliscompany'      => $request->get('poliscompany'),
                'polisnumber'       => $request->get('polisnumber'),
                //
                'dateinwork'        => $request->get('dateinwork'),
                'dateoutwork'       => $request->get('dateoutwork'),
                // reg date
                'regdate'           => $request->get('regdate'),
                'regenddate'        => $request->get('regenddate'),
            ]
        );
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
        $request->validate([
            'name'         => 'required',
            'surname'      => 'required',
            //'company_id'   => 'required',
            'country_id'   => 'required|numeric',
            'position_id'  => 'required|numeric',
            // patent
            'patentdate'        => 'nullable|date|date_format:Y-m-d',
            'patentenddate'     => 'nullable|date|date_format:Y-m-d|after_or_equal:patentdate',
            'patentnextpaydate' => 'nullable|date|date_format:Y-m-d|after_or_equal:patentdate',
            'patentserie'       => 'nullable|string',
            'patentnumber'      => 'nullable|numeric',
            // polis
            'polisdate'     => 'nullable|date|date_format:Y-m-d',
            'polisenddate'  => 'nullable|date|date_format:Y-m-d|after_or_equal:polisdate',
            'poliscompany'  => 'nullable|string',
            'polisnumber'   => 'nullable|numeric',
            //
            'dateinwork'     => 'nullable|date|date_format:Y-m-d',
            'dateoutwork'    => 'nullable|date|date_format:Y-m-d|after_or_equal:dateinwork',
            // reg dates
            'regdate'         => 'nullable|date|date_format:Y-m-d',
            'regenddate'      => 'nullable|date|date_format:Y-m-d|after_or_equal:regdate',
        ]);

        $foreigner = Foreigner::find($id);
        $foreigner->name =  $request->get('name');
        $foreigner->surname = $request->get('surname');

        // company_id is not editable
        //$foreigner->company_id = $request->get('company_id');
        $foreigner->position_id = $request->get('position_id');
        $foreigner->country_id = $request->get('country_id');

        $foreigner->patentdate        = $request->get('patentdate');
        $foreigner->patentenddate     = $request->get('patentenddate');
        $foreigner->patentnextpaydate = $request->get('patentnextpaydate');
        $foreigner->patentnumber      = $request->get('patentnumber');
        $foreigner->patentserie       = $request->get('patentserie');

        $foreigner->polisdate        = $request->get('polisdate');
        $foreigner->polisenddate     = $request->get('polisenddate');
        $foreigner->polisnumber      = $request->get('polisnumber');
        $foreigner->poliscompany     = $request->get('poliscompany');

        $foreigner->dateinwork       = $request->get('dateinwork');
        $foreigner->dateoutwork      = $request->get('dateoutwork');

        $foreigner->regdate          = $request->get('regdate');
        $foreigner->regenddate       = $request->get('regenddate');

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
