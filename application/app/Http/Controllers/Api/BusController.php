<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busses = Bus::all();
        return response()->json($busses, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'plate_number' => 'required',
            'brand' => [Rule::in(['mercedes', 'fuso', 'scania']), 'required'],
            'seat' => 'numeric | min:1 | required',
            'price_per_day' => 'numeric | min:100000 | required',
        ];

        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        Bus::create($request->all());
        return response()->json("create bus success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        $rule = [
            'plate_number' => 'required',
            'brand' => [Rule::in(['mercedes', 'fuso', 'scania']), 'required'],
            'seat' => 'numeric | min:1 | required',
            'price_per_day' => 'numeric | min:100000 | required',
        ];
        
        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        if ($bus->update($request->all())) {
            return response()->json("Update bus success", 200);
        } else {
            return response()->json("Failed to update bus", 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        if ($bus->delete()) {
            return response()->json("Delete bus success", 200);
        } else {
            return response()->json("Failed to delete bus", 422);
        }
    }
}
