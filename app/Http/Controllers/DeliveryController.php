<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;
use App\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();

        return view('backend.delivery.index',compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::all();

        return view('backend.delivery.create',compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'place' => 'required|max:255',
                'price' => 'required|numeric',               
            ]);

        $delivery = Delivery::create(['place' => $request->place,
                     'price' => $request->price,
                     ]);

        if(count($request->days) > 0 ){
            $delivery->days()->sync($request->days);
        }

        alert()->success('Success', 'You create a place');

        return redirect()->back();
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
    public function edit($id)
    {
        $delivery = Delivery::findOrFail($id);

        $del_days  = [];

        foreach ($delivery->days()->get() as $key => $day) {
           $del_days[] = $day->id;
        }

        $days = Day::all();
        
        return view('backend.delivery.edit',compact('days','delivery','del_days'));
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
        $this->validate($request,[
                'place' => 'required|max:255',
                'price' => 'required|numeric',               
            ]);
        
        $delivery = Delivery::findOrFail($id);

        $delivery->place =  $request->place;
        $delivery->price = $request->price;
        $delivery->save();                     

        if(count($request->days) > 0 ){
            $delivery->days()->sync($request->days);
        }
        else
        {
            $delivery->days()->sync([]);
        }
        

        alert()->success('Success', 'Delivery update done');

        return redirect()->to('/gotg/delivery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Delivery::destroy($id);

        alert()->error('Notice', 'Places deleted!');

        return redirect()->route('delivery.index');
    }
}
