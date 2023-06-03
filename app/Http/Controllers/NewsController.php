<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Markdown\Facades\Markdown;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $news = News::latest()->filter(request(['category']))->get();
        // $categoryHeader = Category::find(request('category'));

        $heading = News::latest()->first();
        $newArticles = News::latest()->skip(1)->take(3)->get();
        $news = News::all();
        $sports = News::where('category_id', 2)->take(3)->get();

        return view('news.pages.main', [
            'heading' => $heading,
            'newArticles' => $newArticles,
            'news' => $news,
            'sports' => $sports
        ]);
    }

    public function search() {
        $news = News::latest()->filter(request('search'))->get();    
        return view('news.pages.search', compact('news'));
    }

    public function newsList($name)
    {
        //
        $news = News::where('category_name', $name)->get();
        $categoryHeader = Category::where('name', $name)->first();

        return view('news.pages.news-list', compact(['news', 'categoryHeader']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name', 'desc')->take(4)->get();
        $subcategoryCategories = Category::whereNotNull('parent_id')->get();

        return view('Admin.pages.add-news', compact('categories', 'subcategoryCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  
        try{
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('news/image', $request->image,$imageName);
            $news = new News();
            $news->title = $request->title;
            $news->user_id = auth()->id();
            $news->category_id = $request->category_id;
            $news->category_name = $request->category_name;
            $news->description = Markdown::convert($request->description)->getContent();
            $news->news_type = $request->news_type;
            $news->image = $imageName;
            $news->save();
            
            $category = new Category();
            $category->name = $request->category_name;
            $category->parent_id = $request->category_id;
            $category->save();

            return redirect('/');
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while creating a news!!'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
        return view('news.pages.news-detail', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        return view('news.news-edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $request->validate([
            'title'=>'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);

        try{

            $news->fill($request->post())->update();

            if($request->hasFile('image')){

                // remove old image
                if($news->image){
                    $exists = Storage::disk('public')->exists("news/image/{$news->image}");
                    if($exists){
                        Storage::disk('public')->delete("news/image/{$news->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('news/image', $request->image,$imageName);
                $news->image = $imageName;
                $news->save();
            }

            return redirect('/');

        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating a news!!'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        try {

            if($news->image){
                $exists = Storage::disk('public')->exists("news/image/{$news->image}");
                if($exists){
                    Storage::disk('public')->delete("news/image/{$news->image}");
                }
            }

            $news->delete();

            return redirect('/');
            
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a news!!'
            ]);
        }
    }
}