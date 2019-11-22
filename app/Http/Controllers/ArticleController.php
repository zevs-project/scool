<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory as Subcategory;
use App\Category as Category;
use App\Author as Author;
use App\Article as Article; 

class ArticleController extends Controller {
    
    
    protected function getSubcategories() {
        return Subcategory::all();
    }

    protected function getCategoryId(string $category_name) {

        $category_isset = Category::where("name", $category_name)->exists();

        if($category_isset) {
            $category_id = Category::where("name", $category_name)->get(["id"]);
            return $category_id[0]->id;
        } 
        return 1;
    }

    protected function getLatestArticle($quantity) {
        $res = Article::orderBy("created_at","desc'")->take($quantity)->get();
        return $res;
    }

    protected function getLikeArticle() {
        $article_count = count(Article::get(["id"]));
        $quantity_like_article = 3;
        $like_article_list = [];

        if($article_count < 3) {
            $articles = Article::all();
            return $articles; 
        }
        while (count($like_article_list) < $quantity_like_article) {
            $rand_id = mt_rand(1, $article_count);
            if(in_array($rand_id, $like_article_list)) continue;
            $like_article_list[] = $rand_id;
        }
        $articles = Article::whereIn("id", $like_article_list)->get();
        return $articles;

    }

    public function delete(Request $request) {
    
        if($request->isMethod("post")) {  
        }

        if($request->ajax()) {

            $id = $request->id_row;

            $row = Article::where("id", $id);
            $res = $row->delete();
            $response = [
                "result"=>$res,
                "remove"=>"adsa"
            ]; 
            return json_encode($response);   
        }
        
    }

    public function update(Request $request) {}

    public function create(array $list_rows) {}

    public function read() {
        $articles = Article::all()->toArray();
       
        return view("crud.read", [
            "values"=>$articles,
            "table"=>"articles"
        
        ]);
    }

    public function show(Request $request) {
        $relationships = [];
        $authors = Author::get(["id", "last_name"])->toArray();
        $subcategories = Subcategory::get(["id", "name"])->toArray();
        $categories = Category::get(["id", "name"])->toArray();

        $relationships["category_id"] = $categories;
        $relationships["subcategory_id"] = $subcategories;
        $relationships["author_id"] = $authors;

        $articles = Article::where("id", $request->id_row)->get()->toArray();
       
        return view("crud.update", [
            "fields"=> $articles[0],
            "relationships"=> $relationships
        ]);

    }
 
}

