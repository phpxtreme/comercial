<?php

namespace App\Http\Controllers;

use App\Repositories\ProviderRepository;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        /** @var object $providers */
        $providers = $repository->find();

        return view('page.provider.index', ['providers' => $providers]);
    }

    public function insert(Request $request)
    {
        /** @var ProviderRepository $repository */
        $repository = new ProviderRepository();

        $this->validate($request, [
            'name' => 'required'
        ]);

        /** @var boolean $create */
        $create = $repository->create([
            'name' => $request->input('name')
        ], true);

        return $create ?
            redirect('provider')->with('info', trans('response.saved')) :
            redirect('provider')->with('error', trans('response.error'));
    }
}
