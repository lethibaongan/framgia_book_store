<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Slide;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        $data['book'] = Book::listnewbook()->limit(config('index.number.number_newbook_index'))->get();

        
        $data['category'] = Category::listcategory();
        $data['publisher'] = Publisher::listpublisher();
        $data['slide'] = Slide::listslide()->get();

        return view('index', $data);
    }

    public function show_new_book()
    {
        $data['new_book'] = Book::listnewbook()->limit(config('index.number.number_newbook'))->get();
        $data['category'] = Category::listcategory();
        $data['publisher'] = Publisher::listpublisher();
        
        return view('newbooks', $data);
    }
}
