<?php

namespace App\Http\Controllers\Admin;

use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubcategoriesRequest;
use App\Http\Requests\Admin\UpdateSubcategoriesRequest;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('subcategory_access')) {
            return abort(401);
        }
        if (request('show_deleted') == 1) {
            if (! Gate::allows('subcategory_delete')) {
                return abort(401);
            }
            $subcategories = Subcategory::onlyTrashed()->get();
        } else {
            $subcategories = Subcategory::all();
        }
        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('subcategory_create')) {
            return abort(401);

        }

        $categories = \App\Category::pluck('name', 'id');

        return view('admin.subcategories.create', compact( 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcategoriesRequest $request)
    {
        if (! Gate::allows('subcategory_create')) {
            return abort(401);
        }

        $subcategory = Subcategory::create($request->all());
        $subcategory->categories()->sync(array_filter((array)$request->input('categories')));


        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('subcategory_edit')) {
            return abort(401);
        }
        $subcategory = Subcategory::findOrFail($id);

        return view('admin.subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoriesRequest $request, $id)
    {
        if (! Gate::allows('subcategory_edit')) {
            return abort(401);
        }
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('subcategory_delete')) {
            return abort(401);
        }
        $subcategories = Subcategory::findOrFail($id);
        $subcategories->delete();

        return redirect()->route('admin.subcategories.index');
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('subcategory_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Subcategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
    public function restore($id)
    {
        if (! Gate::allows('subcategory_delete')) {
            return abort(401);
        }
        $subcategory = Subcategory::onlyTrashed()->findOrFail($id);
        $subcategory->restore();

        return redirect()->route('admin.subcategories.index');
    }
    public function perma_del($id)
    {
        if (! Gate::allows('subcategory_delete')) {
            return abort(401);
        }
        $subcategory = Subcategory::onlyTrashed()->findOrFail($id);
        $subcategory->forceDelete();

        return redirect()->route('admin.subcategories.index');
    }
}
