<?php

namespace App\Http\Controllers;

use App\Repositories\ProviderRepository;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        /** @var object $providers */
        $providers = $repository->find();

        return view('page.provider.index', ['providers' => $providers]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        $this->validate($request, [
            'name' => 'required'
        ]);

        /** @var boolean $save */
        $save = $repository->save([
            'name' => $request->input('name')
        ], true);

        return $save ?
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
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        /** @var object $provider */
        $provider = $repository->find(['id' => $id], true);

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
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        $this->validate($request, [
            'name' => 'required'
        ]);

        /** @var boolean $update */
        $update = $repository->update(['id' => $id], [
            'name' => $request->input('name')
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
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        /** @var object $provider */
        $provider = $repository->find(['id' => $id], true);

        return view('page.provider.show', ['provider' => $provider]);
    }

    public function remove($id)
    {
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        /** @var boolean $remove */
        $remove = $repository->remove(['id' => $id]);

        return $remove ?
            redirect('provider')->with('info', trans('response.removed')) :
            redirect('provider')->with('error', trans('response.error'));
    }
}
