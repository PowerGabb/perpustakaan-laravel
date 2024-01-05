<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::paginate(5);
        return view('page.category', ['category' => $category]);
    }

    public function create(){

        return view('page.add-category');
    }

    public function store(Request $request){
        

        $validate = $request->validate([
            'name' => 'required|unique:categories',
        ]);



        $category = Category::create([
            'name' => $request->name,
        ]);

        Session::flash('status', 'success');
        Session::flash('message', 'Category Berhasil Di Simpan');
        return redirect('/categories');


    }

    public function edit($slug){

        $category = Category::where('slug', $slug)->first();
        return view('page.category-edit', ["category" => $category]);
    }

    public function update(Request $request, $slug){
        
        // dd($request->all(), $slug);
        $validate = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        

        $updatecategory = Category::where('slug', $slug)->first();
        $updatecategory->slug = null;
        $updatecategory->update($request->all());
        Session::flash('status', 'success');
        Session::flash('message', 'Category Berhasil Di Update');
        return redirect('/categories');

        

    }

    public function delete($slug){

        $category = Category::where('slug', $slug)->first();
        return view('page.delete-category', ["category" => $category]);
    }

    public function destroy($slug){
        
        $delete = Category::where('slug', $slug)->first()->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'Category Berhasil Di Delete');
        return redirect('/categories');

    }

    public function deleted_category(){

        $category = Category::onlyTrashed()->paginate(5);
        return view('page.category-deleted-list', ['category' => $category]);
    }

    public function restore($slug){

        $restore = Category::onlyTrashed()->where('slug', $slug)->restore();
        Session::flash('status', 'success');
        Session::flash('message', 'Category Berhasil Di Restore');
        return redirect('/categories');
    }
}
