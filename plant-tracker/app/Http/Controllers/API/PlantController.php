<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return response()->json([
            'status'=> 200,
            'plants'=>$plants,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:191',
            'species'=>'required|max:191',
            // 'info'=>'required|email|max:191',
            // 'image'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'validate_err'=> $validator->messages(),
            ],422);
        }
        else
        {
            $plant = new Plant;
            $plant->name = $request->input('name');
            $plant->species = $request->input('species');
            // $plant->info = $request->input('info');
            // $plant->image = $request->input('image');
            $plant->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Plant Added Successfully',
            ]);
        }

    }
}