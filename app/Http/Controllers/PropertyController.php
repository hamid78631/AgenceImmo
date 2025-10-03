<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property ; 
use App\Http\Requests\SearchPropertiesRequest ; 

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        $query = Property::query();

        if($request->has('price')){
            $query = $query->where('price' , '>=' , $request->input('price'));
        }

        
        return view('property.index' , [
            'properties' => $query->paginate(16) ,
            'input' => $request->validated()
        ]);
    }

    public function show( string $slug , Property $property){

    }
}
