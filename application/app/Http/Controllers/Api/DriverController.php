<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        return response()->json($driver, 200);
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
            'name' => 'required',
            'age' => 'numeric | min:18',
            'id_number' => 'unique:drivers|min:16',
        ];

        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        Driver::create($request->all());
        return response()->json("create driver success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $rule = [
            'name' => 'required',
            'age' => 'numeric | min:18',
            'id_number' => 'unique:drivers|min:16',
        ];

        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        if ($driver->update($request->all())) {
            return response()->json("Update driver success", 200);
        } else {
            return response()->json("Failed to update driver", 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        if ($driver->delete()) {
            return response()->json("Delete driver success", 200);
        } else {
            return response()->json("Failed to delete driver", 422);
        }
    }
}
