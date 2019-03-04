<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Group;
use App\Models\Item;
use App\Models\Measurement;
use App\Models\Provider;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var Provider $modelProvider */
        $modelProvider = new Provider();

        /** @var object $providers */
        $providers = $modelProvider::all();

        return view('page.item.index', ['providers' => $providers]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProviderGroups($id)
    {
        /** @var Group $model */
        $model = new Group();

        /** @var object $groups */
        $groups = $model->where(['provider_id' => $id])->get();

        return $groups;
    }

    /**
     * @param Request $request
     *
     * @return object
     */
    public function getGroupItems(Request $request)
    {
        /** @var Item $modelItem */
        $modelItem = new Item();

        /** @var integer $group */
        $group = $request->only('group');

        /** @var object $items */
        $items = $modelItem->with(['measurement'])
            ->where(['group_id' => $group])->get();

        return redirect()->back()->with('items', $items);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        /** @var Provider $modelProvider */
        $modelProvider = new Provider();

        /** @var Measurement $modelMeasurement */
        $modelMeasurement = new Measurement();

        /** @var Currency $modelCurrency */
        $modelCurrency = new Currency();

        return view('page.item.create', [
            'providers'    => $modelProvider::all(),
            'measurements' => $modelMeasurement::all(),
            'currencies'   => $modelCurrency::all(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var Item $model */
        $model = new Item();

        $this->validate($request, [
            'provider'    => 'required',
            'group'       => 'required',
            'description' => 'required',
            'quantity'    => 'required',
            'measurement' => 'required',
            'currency'    => 'required',
            'price'       => 'required',
        ]);

        /** @var array $record */
        $record = [
            'group_id'       => $request->input('group'),
            'description'    => $request->input('description'),
            'model'          => $request->input('model'),
            'quantity'       => $request->input('quantity'),
            'measurement_id' => $request->input('measurement'),
            'currency_id'    => $request->input('currency'),
            'price'          => $request->input('price'),
        ];

        foreach ($record as $key => $value) {
            $model->$key = $value;
        }

        return $model->save() ?
            redirect('item')->with('info', trans('response.saved')) :
            redirect('item')->with('error', trans('response.error'));
    }
}