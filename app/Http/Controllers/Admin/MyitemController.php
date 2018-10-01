<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMyitemRequest;
use App\Http\Requests\Admin\UpdateMyitemRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class MyitemController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('item_access')) {
            return abort(401);
        }
        return view('admin.myitem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('item_create')) {
            return abort(401);




        }
        $cities = \App\City::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $categories = \App\Subcategory::pluck('name', 'id');

        return view('admin.myitem.create', compact('cities', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMyitemRequest $request)
    {
        if (! Gate::allows('item_create')) {
            return abort(401);
        }

        $request = $this->saveFiles($request);
        $myitem = Item::create($request->all());
        $myitem->categories()->sync(array_filter((array)$request->input('categories')));

        return redirect()->route('admin.myitem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
