<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /** @var Measurement $measurements */
        $measurements = Measurement::orderBy('name')->get();

        return view('page.measurement.index', ['measurements' => $measurements]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        /** @var Measurement $model */
        $model = new Measurement();

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
            redirect('measurement')->with('info', trans('response.saved')) :
            redirect('measurement')->with('error', trans('response.error'));
    }
}
