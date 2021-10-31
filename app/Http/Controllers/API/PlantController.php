<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    public function store(Request $request)
    {
        $plant = new Plant;
        $plant->name = $request->input('name');
        $plant->species = $request->input('species');
        $plant->info = $request->input('info');
        $plant->image = $request->input('image');
        $plant->save();

        return response()->json([
            'status'=> 200, 
            'message'=> 'Plant Saved',
            ])
    }
}
