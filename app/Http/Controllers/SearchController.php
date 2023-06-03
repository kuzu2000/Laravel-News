<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $results = News::where('title', 'like', '%'.$query.'%')
        ->orWhere('category_name', 'like', '%'.$query.'%')
        ->get();

        

    return view('news.pages.search', ['query' => $query ,'news' => $results]);
}


}