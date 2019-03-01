<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var Currency $currency */
        $currency = Currency::all();

        return view('page.currency.index', ['currencies' => $currency]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var Currency $model */
        $model = new Currency();

        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required'
        ]);

        /** @var array $record */
        $record = [
            'name'        => $request->input('name'),
            'description' => $request->input('description')
        ];

        foreach ($record as $key => $value) {
            $model->$key = $value;
        }

        return $model->save() ?
            redirect('currency')->with('info', trans('response.saved')) :
            redirect('currency')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        /** @var Currency $model */
        $model = new Currency();

        /** @var object $currency */
        $currency = $model->findOrFail($id);

        return view('page.currency.update', ['currency' => $currency]);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        /** @var Currency $model */
        $model = new Currency();

        $this->validate($request, [
            'name'        => 'required',
            'description' => 'required',
        ]);

        /** @var boolean $update */
        $update = $model->findOrFail($id)->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return $update ?
            redirect('currency')->with('info', trans('response.saved')) :
            redirect('currency')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        /** @var Currency $model */
        $model = new Currency();

        /** @var object $currency */
        $currency = $model->findOrFail($id);

        return view('page.currency.show', ['currency' => $currency]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        /** @var Currency $model */
        $model = new Currency();

        /** @var boolean $remove */
        $remove = $model->findOrFail($id)->delete();

        return $remove ?
            redirect('currency')->with('info', trans('response.removed')) :
            redirect('currency')->with('error', trans('response.error'));
    }
}
