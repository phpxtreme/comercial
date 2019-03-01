<?php

namespace App\Http\Controllers;

use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        /** @var Group $groups */
        $groups = Group::with('provider')->get();

        return view('page.group.index', ['groups' => $groups]);
    }
}
