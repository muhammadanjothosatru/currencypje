<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Currency::orderBy('created_at','desc')->get();
        return view('currency.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Currency;
        $model->name = $request->name;
        $model->rate = $request->rate;
        $model->save();

        return redirect('currency');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Currency::find($id);
        return view('currency.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Currency::find($id);
        $model->name = $request->name;
        $model->rate = $request->rate;
        $model->save();

        return redirect('currency');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Currency::find($id);
        $data->delete();
        return redirect('currency');
    }

    public function trash()
    {
        $deleted_currency = Currency::onlyTrashed()->get();
        return view('trash.index', compact('deleted_currency'));
    }

    public function restore($id)
    {
        Currency::withTrashed()->find($id)->restore();
        return redirect('currency')->withSuccess('Currency restored!');
    }

    public function forcedelete($id)
    {
        Currency::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->withSuccess('Currency deleted!');
    }
}
