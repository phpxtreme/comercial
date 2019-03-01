<?php

namespace App\Http\Controllers;

use App\Models\Provider;

class GroupController extends Controller
{
    public function index()
    {
        /** @var Provider $providers */
        $providers = Provider::with('groups')->get();

        return view('page.group.index', ['providers' => $providers]);
    }

    public function create()
    {
        /** @var Provider $providers */
        $providers = Provider::with('groups')->get();

        return view('page.group.create', ['providers' => $providers]);
    }
}
