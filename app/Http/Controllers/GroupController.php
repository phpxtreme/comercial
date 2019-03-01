<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Provider;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        /** @var Provider $providers */
        $providers = Provider::with('groups')->get();

        return view('page.group.index', ['providers' => $providers]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        /** @var Provider $providers */
        $providers = Provider::with('groups')->get();

        return view('page.group.create', ['providers' => $providers]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var Group $model */
        $model = new Group();

        $this->validate($request, [
            'name'     => 'required',
            'price'    => 'required',
            'provider' => 'required'
        ]);

        /** @var array $record */
        $record = [
            'name'        => $request->input('name'),
            'price'       => $request->input('price'),
            'provider_id' => $request->input('provider'),
        ];

        foreach ($record as $key => $value) {
            $model->$key = $value;
        }

        return $model->save() ?
            redirect('group')->with('info', trans('response.saved')) :
            redirect('group')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        /** @var Group $modelGroup */
        $modelGroup = new Group();

        /** @var Provider $modelProvider */
        $modelProvider = new Provider();

        /** @var object $group */
        $group = $modelGroup->find($id);

        /** @var object $providers */
        $providers = $modelProvider->all();

        return view('page.group.update', ['providers' => $providers, 'group' => $group]);
    }

    public function edit(Request $request, $id)
    {
        /** @var Group $model */
        $model = new Group();

        $this->validate($request, [
            'name'     => 'required',
            'price'    => 'required',
            'provider' => 'required'
        ]);

        /** @var boolean $update */
        $update = $model->find($id)->update([
            'name'        => $request->input('name'),
            'price'       => $request->input('price'),
            'provider_id' => $request->input('provider')
        ]);

        return $update ?
            redirect('group')->with('info', trans('response.saved')) :
            redirect('group')->with('error', trans('response.error'));
    }

    public function show($id)
    {
        /** @var Group $model */
        $model = new Group();

        /** @var object $group */
        $group = $model->findOrFail($id);

        return view('page.group.show', ['group' => $group]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function remove($id)
    {
        /** @var Group $model */
        $model = new Group();

        /** @var boolean $remove */
        $remove = $model->findOrFail($id)->delete();

        return $remove ?
            redirect('group')->with('info', trans('response.removed')) :
            redirect('group')->with('error', trans('response.error'));
    }
}
