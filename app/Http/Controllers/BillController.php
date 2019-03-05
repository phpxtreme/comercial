<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Currency;
use App\Models\Provider;
use App\Models\Shipping;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Bill $modelBill */
        $modelBill = new Bill();

        /** @var object $bills */
        $bills = $modelBill::with(['provider', 'shipping'])->get();

        return view('page.bill.index', ['bills' => $bills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /** @var Provider $providers */
        $providers = Provider::all();

        /** @var Shipping $shippings */
        $shippings = Shipping::all();

        /** @var Currency $currencies */
        $currencies = Currency::all();

        return view('page.bill.create', [
            'providers'  => $providers,
            'shippings'  => $shippings,
            'currencies' => $currencies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date'       => 'required',
            'provider'   => 'required',
            'identifier' => 'required',
            'shipping'   => 'required',
            'price'      => 'required',
            'currency'   => 'required',
        ]);

        $record = [
            'date'         => $request->input('date'),
            'provider_id'  => $request->input('provider'),
            'identifier'   => $request->input('identifier'),
            'shipping_id'  => $request->input('shipping'),
            'price'        => $request->input('price'),
            'currency_id'  => $request->input('currency'),
            'observations' => $request->input('observations')
        ];

        return Bill::create($record) ?
            redirect('bill')->with('info', trans('response.saved')) :
            redirect('bill')->with('error', trans('response.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
