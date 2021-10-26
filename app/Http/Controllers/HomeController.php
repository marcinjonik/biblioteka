<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

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
        return view('admin.book', ['ksiazki' => $books]);
    }
}
