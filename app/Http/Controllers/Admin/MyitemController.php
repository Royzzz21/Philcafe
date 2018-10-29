<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Company;
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
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index()
    {
        if (! Gate::allows('item_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('item_delete')) {
                return abort(401);
            }
            $companies = Company::onlyTrashed()->get();
        } else {
              $user_id = Auth::user()->id;
              $companies = Company::where('user_id', $user_id)->get();
        }

        return view('admin.myitem.index', compact('companies'));
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
        $subcategories = \App\Subcategory::pluck('name', 'id');

        return view('admin.myitem.create', compact('cities', 'subcategories'));
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
        $myitem = Company::create($request->all());
        $myitem->subcategories()->sync(array_filter((array)$request->input('categories')));

        return redirect()->route('admin.myitem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if (! Gate::allows('item_view')) {
          return abort(401);
      }
      $company = Company::findOrFail($id);

      return view('admin.myitem.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (! Gate::allows('item_edit')) {
          return abort(401);
      }

      $cities = \App\City::pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
      $categories = \App\Subcategory::pluck('name', 'id');

      $company = Company::findOrFail($id);

      return view('admin.myitem.edit', compact('company', 'cities', 'categories'));
    }

    /**
     * Update Company in storage.
     *
     * @param  \App\Http\Requests\UpdateItemsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMyitemRequest $request, $id)
    {
      if (! Gate::allows('company_edit')) {
          return abort(401);
      }
      $request = $this->saveFiles($request);
      $company = Company::findOrFail($id);
      $company->update($request->all());
      $company->subcategories()->sync(array_filter((array)$request->input('categories')));

      return redirect()->route('admin.myitem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (! Gate::allows('item_delete')) {
          return abort(401);
      }
      $company = Company::findOrFail($id);
      $company->delete();

      return redirect()->route('admin.myitem.index');
    }

    /**
     * Delete all selected Company at once.
     *
     * @param Request $request
     */
     public function massDestroy(Request $request)
     {
         if (! Gate::allows('item_delete')) {
             return abort(401);
         }
         if ($request->input('ids')) {
             $entries = Company::whereIn('id', $request->input('ids'))->get();

             foreach ($entries as $entry) {
                 $entry->delete();
             }
         }
     }
     /**
      * Restore Company from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function restore($id)
      {
          if (! Gate::allows('item_delete')) {
              return abort(401);
          }
          $company = Company::onlyTrashed()->findOrFail($id);
          $company->restore();

          return redirect()->route('admin.myitem.index');
      }
      /**
       * Permanently delete Company from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function perma_del($id)
      {
          if (! Gate::allows('item_delete')) {
              return abort(401);
          }
          $company = Company::onlyTrashed()->findOrFail($id);
          $company->forceDelete();

          return redirect()->route('admin.myitem.index');
      }
}
