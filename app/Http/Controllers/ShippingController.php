<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var Shipping $modelShipping */
        $modelShipping = new Shipping();

        /** @var object $shippings */
        $shippings = $modelShipping::all();

        return view('page.shipping.index', ['shippings' => $shippings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.shipping.create');
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
            'name' => 'required'
        ]);

        return Shipping::create($request->all()) ?
            redirect('shipping')->with('info', trans('response.saved')) :
            redirect('shipping')->with('error', trans('response.error'));
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
        $shipping = Shipping::findOrFail($id);

        return view('page.shipping.show', ['shipping' => $shipping]);
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
        $shipping = Shipping::findOrFail($id);

        return view('page.shipping.edit', compact('shipping'));
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
        $model = new Shipping();

        $this->validate($request, [
            'name' => 'required'
        ]);

        return $model->findOrFail($id)->update($request->all()) ?
            redirect('shipping')->with('info', trans('response.saved')) :
            redirect('shipping')->with('error', trans('response.error'));
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
        return Shipping::findOrFail($id)->delete() ?
            redirect('shipping')->with('info', trans('response.removed')) :
            redirect('shipping')->with('error', trans('response.error'));
    }
}
