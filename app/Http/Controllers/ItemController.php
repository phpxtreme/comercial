<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Provider;

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
}
