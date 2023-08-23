<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Operator;

class IndexController extends Controller
{
    public function index_index(){
        return view('pages.index');
    }
    public function index_welcome(){
        return view('welcome');
    }
    public function index_search(){
        $countries = Country::get();
        $operators = Operator::get();
        return view('pages.Search.search', compact('countries','operators'));
    }
    public function search(Request $request){
        $params = $request->all();
        $validated = $request->validate([
            'country_id' => 'required',
        ]);  
        if(isset($params['operator_id'])){
            $data = Operator::where('operators.id',$params['operator_id'])
            ->join('countries', 'countries.id', '=', 'operators.country_id')
            ->get();
        }else{
            $data = Operator::where('operators.country_id',$params['country_id'])
            ->join('countries', 'countries.id', '=', 'operators.country_id')
            ->get();
        }
        
        return view('pages.Search.search_result', compact('data'));
    }
    // Errors
    public function index_error_404(){ return view('admin.pages.Errors.404');}
    public function index_error_500(){ return view('admin.pages.Errors.500');}
}
