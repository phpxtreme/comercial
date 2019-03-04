<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var object $providers */
        $providers = Provider::orderBy('name', 'ASC')->get();

        return view('page.provider.index', ['providers' => $providers]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var Provider $model */
        $model = new Provider();

        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required'
        ]);

        /** @var array $record */
        $record = [
            'name'  => $request->input('name'),
            'price' => $request->input('price')
        ];

        foreach ($record as $key => $value) {
            $model->$key = $value;
        }

        return $model->save() ?
            redirect('provider')->with('info', trans('response.saved')) :
            redirect('provider')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        /** @var Provider $model */
        $model = new Provider();

        /** @var object $provider */
        $provider = $model->findOrFail($id);

        return view('page.provider.update', ['provider' => $provider]);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        /** @var Provider $model */
        $model = new Provider();

        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
        ]);

        /** @var boolean $update */
        $update = $model->findOrFail($id)->update([
            'name'  => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return $update ?
            redirect('provider')->with('info', trans('response.saved')) :
            redirect('provider')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        /** @var Provider $model */
        $model = new Provider();

        /** @var object $provider */
        $provider = $model->findOrFail($id);

        return view('page.provider.show', ['provider' => $provider]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        /** @var Provider $model */
        $model = new Provider();

        /** @var boolean $remove */
        $remove = $model->findOrFail($id)->delete();

        return $remove ?
            redirect('provider')->with('info', trans('response.removed')) :
            redirect('provider')->with('error', trans('response.error'));
    }
}
