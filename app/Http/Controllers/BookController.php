<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){


        $books = Book::with(['categories'])->paginate(5);
        return view('page.books', ['books' => $books]);
    }

    public function create() {

        $categories = Category::all();
        return view('page.book-add', ['categories' => $categories]);
    }

    public function store(Request $request) {

    
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $newname =  time() . '-' . $request->title . '.' . $extension;
            $request->file('image')->storeAs('public/cover-book', $newname); 
            $request['cover'] = $newname;
        }       

        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil di tambhakan!');   
        $newBooks = Book::create($request->all());
        $newBooks->categories()->sync($request->categories);
        return redirect('/books');
    }

    public function delete($slug){


        $books = Book::where('slug', $slug)->first();
        return view('page.book-delete', ['books' => $books]);

    }

    public function destroy($slug){

        $books = Book::where('slug', $slug)->first()->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil di hapus!');
        return redirect('/books');
    }

    public function deleted_book(){

        $books = Book::onlyTrashed()->paginate(5);
        return view('page.book-deleted', ['books' => $books]);
    }

    public function restore($slug){

        $books = Book::withTrashed()->where('slug', $slug)->restore();
        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil di restore!');
        return redirect('/books');

    }

    public function force_delete($slug){

        $books = Book::withTrashed()->where('slug', $slug)->forceDelete();
        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil di hapus permanen!');
        return redirect('/book-deleted');
    }

    public function edit($slug){

        $books = Book::with(['categories'])->where('slug', $slug)->first();
        $category = Category::all();
        return view('page.book-edit', ['books' => $books, 'category' => $category]);
    }

    public function update(Request $request, $slug){
        // dd($request->all(), $slug);

        $oldimage = Book::where('slug', $slug)->first()->cover;
        $delete_old_image = Storage::delete('public/cover-book/' . $oldimage);


        $validated = $request->validate([
            'title' => 'required|max:255',
            'book_code' => 'required|max:255',
            'cover' => 'max:255',
        ]);

        if ($request->file('image')) {
            $extension = $request->file('image')->extension();
            $newname =  time() . '-' . $request->title . '.' . $extension;
            $request->file('image')->storeAs('public/cover-book', $newname);
            $request['cover'] = $newname; 
        }

        
        $books = Book::where('slug', $slug)->first();
        $books->slug = null;
        $books->update($request->all());
        if ($request->categories != null) {
            $books->categories()->sync($request->categories);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil di ubah!');
        return redirect('/books');


    }
       
}
