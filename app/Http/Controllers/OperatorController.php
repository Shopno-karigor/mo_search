<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Operator.add_operator');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        $data = Operator::select('*')
        ->join('countries', 'countries.id', '=', 'operators.country_id')
        ->get();
        return view('pages.Operator.operator_list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $country)
    {
        //
    }
}
