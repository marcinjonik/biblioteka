<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home_user');
    }

    public function home_admin()
    {
        return view('home_admin');
    }

    public function admin_panel()
    {
        return view('admin.panel');
    }

    public function user_panel()
    {
        return view('user.panel');
    }

    public function admin_books()
    {
        $books = Book::join('authors','books.author_id', '=', 'authors.id')
            ->join('categories','books.category_id', '=', 'categories.id')
            ->get(['books.id', 'books.name', 'books.availability', 'authors.first_name', 'authors.last_name', 'categories.name as category_name']);
        return view('admin.book', ['book' => $books]);
    }

    public function admin_books_save(Request $request)
    {
        $book = new Book();

        $book->name = $request->inputName;
        $book->author_id = $request->inputAuthorID;
        $book->category_id = $request->inputCategoryID;
        if($request->inputAvailability == 'Tak'){
        $book->availability = '1';
        }
        else if($request->inputAvailability == 'Nie'){
            $book->availability = '0';
        }

        $book->save();

        return redirect()->route('admin.books');
    }

    public function admin_books_edit($id){
        $book = Book::find($id);

        return view('admin.edit_book', ['book' => $book]);
    }

    public function admin_books_update($id, Request $request){
        $book = Book::find($id);

        $book->name = $request->inputName;
        $book->author_id = $request->inputAuthorID;
        $book->category_id = $request->inputCategoryID;
        if($request->inputAvailability == 'Tak'){
        $book->availability = '1';
        }
        else if($request->inputAvailability == 'Nie'){
            $book->availability = '0';
        }

        $book->save();

        return redirect()->route('admin.books');
    }

    public function admin_books_delete($id){
        $book = Book::destroy($id);

        return redirect()->route('admin.books');
    }

    public function admin_authors()
    {
        $authors = Author::all();
        return view('admin.author', ['author' => $authors]);
    }

    public function admin_authors_save(Request $request)
    {
        $author = new Author();

        $author->first_name = $request->inputFirstName;
        $author->last_name = $request->inputLastName;

        $author->save();

        return redirect()->route('admin.authors');
    }

    public function admin_authors_edit($id){
        $author = Author::find($id);

        return view('admin.edit_author', ['author' => $author]);
    }

    public function admin_authors_update($id, Request $request){
        $author = Author::find($id);

        $author->first_name = $request->inputFirstName;
        $author->last_name = $request->inputLastName;

        $author->save();

        return redirect()->route('admin.authors');
    }

    public function admin_authors_delete($id){
        $author = Author::find($id);

        $author->author_books()->delete();
        $author->delete();

        return redirect()->route('admin.authors');
    }

    public function admin_categories()
    {
        $categories = Category::all();
        return view('admin.category', ['category' => $categories]);
    }

    public function admin_categories_save(Request $request)
    {
        $category = new Category();

        $category->name = $request->inputName;

        $category->save();

        return redirect()->route('admin.categories');
    }

    public function admin_categories_edit($id){
        $category = Category::find($id);

        return view('admin.edit_category', ['category' => $category]);
    }

    public function admin_categories_update($id, Request $request){
        $category = Category::find($id);

        $category->name = $request->inputName;

        $category->save();

        return redirect()->route('admin.categories');
    }

    public function admin_categories_delete($id){
        $category = Category::find($id);

        $category->category_books()->delete();
        $category->delete();

        return redirect()->route('admin.categories');
    }

    public function admin_borrows()
    {
        $borrows = Borrow::join('users','borrows.user_id', '=', 'users.id')
            ->join('books','borrows.book_id', '=', 'books.id')
            ->get(['borrows.id', 'users.name as user_name', 'books.name as book_name', 'borrows.borrow_date', 'borrows.return_date']);

        return view('admin.borrow', ['borrow' => $borrows]);
    }

    public function admin_borrows_edit($id){
        $borrow = Borrow::find($id);

        return view('admin.edit_borrow', ['borrow' => $borrow ]);
    }

    public function admin_borrows_update($id, Request $request){
        $borrow = Borrow::find($id);
        $id=$borrow->book_id;
        $book = Book::find($id);

        $book->availability = '1';

        $borrow->borrow_date = $request->inputBorrowDate;
        $borrow->return_date = $request->inputReturnDate;

        $book->save();
        $borrow->save();

        return redirect()->route('admin.borrows');
    }

    public function user_books()
    {
        $books = Book::join('authors','books.author_id', '=', 'authors.id')
            ->join('categories','books.category_id', '=', 'categories.id')
            ->get(['books.id', 'books.name', 'books.availability', 'authors.first_name', 'authors.last_name', 'categories.name as category_name']);
        return view('user.book', ['book' => $books]);
    }

    public function user_borrow()
    {
        $books = Book::join('authors','books.author_id', '=', 'authors.id')
            ->join('categories','books.category_id', '=', 'categories.id')
            ->where('books.availability', '=', '1' )
            ->get(['books.id', 'books.name', 'authors.first_name', 'authors.last_name', 'categories.name as category_name']);
        return view('user.borrow', ['book' => $books]);
    }

    public function user_borrows_edit($id){
        $book= Book::find($id);

        return view('user.edit_borrow', ['book' => $book]);
    }

    public function user_borrows_update($id, Request $request){
        $borrow = new Borrow();
        $book = Book::find($id);

        $book->availability = '0';

        $borrow->book_id = $id;
        $borrow->user_id = $request->inputUserID;
        $borrow->borrow_date = date('Y-m-d');

        $borrow->save();
        $book->save();

        return redirect()->route('user.borrow');
    }

    public function user_borrows($id)
    {
        $borrows = Borrow::join('users','borrows.user_id', '=', 'users.id')
            ->join('books','borrows.book_id', '=', 'books.id')
            ->where('user_id', $id)
            ->get(['borrows.id', 'books.name as book_name', 'borrows.borrow_date', 'borrows.return_date']);

        return view('user.borrows', ['borrow' => $borrows]);
    }
}
