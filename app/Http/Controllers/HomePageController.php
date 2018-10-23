<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Company;

class HomePageController extends Controller
{

    public function index()
    {
        return view('mainTable.index');
    }
    public function table(Request $request)
    {

        $companies = Company::filterByRequest($request)->paginate(9);

        return view('mainTable.search', compact('companies'));
    }

    public function category(Subcategory $subcategory)
    {
        $subcategories = Subcategory::join('category_subcategory', 'subcategories.id', '=', 'category_subcategory.subcategory_id')
            ->where('category_id', $subcategory->id)
            ->paginate(9);
        $companies = Company::join('category_company', 'companies.id', '=', 'category_company.company_id')
            ->where('subcategory_id', $subcategory->id)
            ->paginate(9);

        return view('mainTable.category', compact('subcategories', 'subcategory', 'companies'));
    }
    public function company(Company $company)
    {
        return view('mainTable.company', compact ('company'));
    }


}
