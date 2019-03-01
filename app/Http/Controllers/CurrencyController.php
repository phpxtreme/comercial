<?php

namespace App\Http\Controllers;

use App\Models\Currency;

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
}
