<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class HomePageController extends Controller
{

    public function index()
    {
        return view('mainTable.index');
    }

    public function table(Request $request)
    {


        return view('mainTable.search');
    }

    public function category(Category $category)
    {
        $subcategories = Subcategory::join('category_subcategory', 'subcategories.id', '=', 'category_subcategory.subcategory_id')
            ->where('category_id', $category->id)
            ->paginate(9);

        return view('mainTable.category', compact('subcategories', 'category'));
    }



}