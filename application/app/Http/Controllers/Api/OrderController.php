<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with('driver')->with('bus')->get();
        return response()->json($order, 200);
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





    public function validDate($startDate, $endDate, $newDate, $newEnd)
    {
        if ($startDate < $newDate && $endDate > $newDate && $startDate < $newEnd && $endDate > $newEnd) {
            return true;
        } else {
            return false;
        }
    }

    public function getDriver($date)
    {
        $allDriver = Driver::with('orders')->get();
        foreach ($allDriver as $driver) {

            // Validasi jika tidak ada order
            // return count($bus->orders);

            if (count($driver->orders) == 0) {
                return $driver;
            }

            // Validasi jika order bakal di check
            foreach ($driver->orders as $orderDriver) {
                $data = [
                    strtotime($orderDriver->start_rent_date),
                    strtotime($orderDriver['start_rent_date']) + $orderDriver['total_rent_days'],
                    strtotime($date['start_rent_date']),
                    strtotime($date['start_rent_date']) + $date['total_rent_days']
                ];

                if ($this->validDate($data[0], $data[1], $data[2], $data[3])) {
                    return $driver;
                }
            }
        }
        return false;
    }

    public function getBus($date)
    {
        $allBus = Bus::with('orders')->get();
        foreach ($allBus as $bus) {

            // Validasi jika tidak ada order
            if (count($bus->orders) == 0) {
                return $bus;
            }

            // Validasi jika order bakal di check
            foreach ($bus->orders as $orderBus) {
                $data = [
                    strtotime($orderBus->start_rent_date),
                    strtotime($orderBus['start_rent_date']) + $orderBus['total_rent_days'],
                    strtotime($date['start_rent_date']),
                    strtotime($date['start_rent_date']) + $date['total_rent_days']
                ];

                if ($this->validDate($data[0], $data[1], $data[2], $data[3])) {
                    return $bus;
                }
            }
        }
        return false;
    }

    public function store(Request $request)
    {
        $date = $request->only('start_rent_date', 'total_rent_days');
        $bus = $this->getBus($date);
        $driver = $this->getDriver($date);

        if ($bus === false || $driver === false) {
            return response()->json("There's no driver or bus available at this momment!", 401);
        }


        $rule = [
            'contact_name' => 'required',
            'contact_phone' => 'numeric | required',
            'start_rent_date' => 'date|after:tomorrow|required',
            'total_rent_days' => 'required',
        ];

        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        $newOrder = $request->all();
        $newOrder['bus_id'] = $bus->id;
        $newOrder['driver_id'] = $driver->id;

        Order::create($newOrder);
        return response()->json("create order success", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $date = $request->only('start_rent_date', 'total_rent_days');
        $bus = $this->getBus($date);
        $driver = $this->getDriver($date);

        if ($bus === false || $driver === false) {
            return response()->json("There's no driver or bus available at this momment!", 401);
        }

        $rule = [
            'contact_name' => 'required',
            'contact_phone' => 'numeric | required',
            'start_rent_date' => 'date|after:tomorrow|required',
            'total_rent_days' => 'required',
        ];

        $valid = Validator::make($request->all(), $rule);

        if ($valid->fails()) {
            return response()->json("Invalid field", 422);
        }

        $newOrder = $request->all();
        $newOrder['bus_id'] = $bus->id;
        $newOrder['driver_id'] = $driver->id;

        if ($bus->update($newOrder)) {
            return response()->json("Update order success", 200);
        } else {
            return response()->json("Failed to update bus", 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if ($order->delete()) {
            return response()->json("Delete order success", 200);
        } else {
            return response()->json("Failed to delete order", 422);
        }
    }
}
