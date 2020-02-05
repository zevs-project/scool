<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\InfoArticle;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $category_name = $request->category ? $request->category : "items";
        $category_id = InfoArticle::getCategoryId($category_name);

        $articles = Article::where('category_id', $category_id)->paginate(10);
        $articles = $articles ? $articles : [];
        $like_articles = InfoArticle::getLikeArticle();


        
        $response_list = [
            'articles' => $articles,
            "subcategories" => InfoArticle::getSubcategories(),
            "latest_post" => InfoArticle::getLatestArticle(4),
            "like_articles" => $like_articles,
        ];

        return \json_encode($response_list);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
