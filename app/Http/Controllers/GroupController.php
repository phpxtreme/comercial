<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Provider;
use App\Repositories\GroupRepository;
use App\Repositories\ProviderRepository;
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
        /** @var GroupRepository $repository */
        $repository = new GroupRepository();

        $this->validate($request, [
            'name'     => 'required',
            'price'    => 'required',
            'provider' => 'required'
        ]);

        /** @var boolean $save */
        $save = $repository->save([
            'name'        => $request->input('name'),
            'price'       => $request->input('price'),
            'provider_id' => $request->input('provider'),
        ], true);

        return $save ?
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
        /** @var GroupRepository $groupRepository */
        $groupRepository = new GroupRepository();

        /** @var ProviderRepository $providerRepository */
        $providerRepository = new ProviderRepository();

        /** @var object $provider */
        $group = $groupRepository->find(['id' => $id], true);

        /** @var object $providers */
        $providers = $providerRepository->find()->all();

        return view('page.group.update', ['providers' => $providers, 'group' => $group]);
    }

    public function edit(Request $request, $id)
    {
        /** @var GroupRepository $repository */
        $repository = new GroupRepository();

        $this->validate($request, [
            'name'     => 'required',
            'price'    => 'required',
            'provider' => 'required'
        ]);

        /** @var boolean $update */
        $update = $repository->update(['id' => $id], [
            'name'        => $request->input('name'),
            'price'       => $request->input('price'),
            'provider_id' => $request->input('provider')
        ]);

        return $update ?
            redirect('group')->with('info', trans('response.saved')) :
            redirect('group')->with('error', trans('response.error'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        /** @var object $group */
        $group = Group::with('provider')
            ->where(['id' => $id])
            ->first();

        return view('page.group.show', ['group' => $group]);
    }
}
