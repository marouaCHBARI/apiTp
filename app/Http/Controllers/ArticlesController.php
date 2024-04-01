<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }
    public function store(Request $request)
    {
        $articles = new Article;
        $articles->titre = $request->titre;
        $articles->contenu = $request->contenu;
        $articles->datePublication = $request->datePublication;
        $articles->save();
        return response()->json([
            "message" => "Article Ajouter."
        ],201);
    }
    public function show($id)
    {
        $articles = Article::find($id);
        if(!empty($articles)) {
            return response()->json($articles);
        }
        else
        {
            return response()->json([
                "message" => "Article non trouver."
            ],404);
        }
    }
    public function update(Request $request, $id)
    {
        if (Article::where('id',$id)->exists()){
            $articles = Article::find($id);
            $articles->titre = is_null($request->titre) ? $articles->titre : $request->titre;
            $articles->contenu = is_null($request->contenu) ? $articles->contenu : $request->contenu;
            $articles->datePublication = is_null($request->datePublication) ? $articles->datePublication : $request->datePublication;
            $articles->save();
                return response()->json([
                    'message'=> 'Article modifier.'
                ],202);
        }else {
            return response()->json([
                "message" => "Article non trouver."
            ],404);
        }
    }
    public function destroy($id)
    {
        if(Article::where("id",$id)->exists())  {
            $articles = Article::find($id);
            $articles->delete();

            return response()->json([
                "message"=> "Articles supprimer."
            ],202);
        }else{
            return response()->json([
                "message" => "Article non trouver."
            ],404);
        }
    }
}
