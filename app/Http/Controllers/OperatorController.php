<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Country;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::get();
        // dd($data);
        return view('pages.Operator.add_operator', compact('countries'));
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
        $params = $request->all();
        $validated = $request->validate([
            'operator_name' => 'required',
            'country_id' => 'required',
            'domestic_call' => 'required',
            'domestic_sms' => 'required',
            'domestic_internet' => 'required',
            'international_call' => 'required',
            'international_sms' => 'required',
            'international_internet' => 'required',
        ]);
        $response = Operator::create($params);
        if($response){
            return redirect()->back()->with('success', 'Operator added');
        }else{
            return redirect()->back()->with('error', 'Failed to add the operator');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        $data = Operator::select('*','operators.id as operator_id')
        ->join('countries', 'countries.id', '=', 'operators.country_id')
        ->get();
        return view('pages.Operator.operator_list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Operator $operator)
    {
        $data = Operator::where('id',$id)->get();
        return view('pages.Operator.update_operator', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $country)
    {
        $params = $request->all();
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'driving_license' => 'required',
            'vehicle_number' => 'required',
        ]);
        $data=array(
            'name' => $params['name'],
            'address' => $params['address'],
            'contact' => $params['contact'],
            'driving_license' => $params['driving_license'],
            'vehicle_number' => $params['vehicle_number'],
        );
        try {
            Driver::where('id',$params['id'])->update($data);
            return redirect()->back()->with('success', 'Driver information updated');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $country)
    {
        //
    }
}
