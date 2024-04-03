<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//je dois ajouter la validation 
//ajouter condition dans la fonction index pour verifier 
//utiliser les fonctions magic 
//changer la langue 
//changer le type de contenu par text et pas string 
//les messages erreurs doit etre minuscule et _ dans l espace 
//la validation si j'ai request dans les parametres si j'ai id j'ai pas besion de validation en peut selement ajouter une condition 
class ArticlesController extends Controller
{
    
    public function index()
    {
        //Vérifier si des articles existent 
        if (Article::count() === 0) {
            return response()->json(['message' => 'No article found'], 404);
        }
        $articles = Article::all();
        return response()->json($articles);
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|text',
            'publication_date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $article = Article::create($request->all());
        return response()->json([
            "message" => "Article added",
            "article" => $article
        ], 201);
    }
    public function show($id)
    {
        $article = Article::find($id);
        if($article) {
            return response()->json($article);
        }
        else
        {
            return response()->json([
                "message" => "Article not found"
            ],404);
        }
    }
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(["message" => "Article not found"], 404);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string',
            'content' => 'sometimes|text',
            'publication_date' => 'sometimes|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $article->update($request->all());
        return response()->json(['message' => 'Article modified'], 202);
    }
    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return response()->json(["message" => "Article deleted"], 202);
        } else {
            return response()->json(["message" => "Article not found"], 404);
        }
    }
} 
    /* 
    public function store(Request $request)
    {
        //$article = Article::create($request->all());
        $articles = new Article;
        $articles->titre = $request->titre;
        $articles->contenu = $request->contenu;
        $articles->datePublication = $request->datePublication;
        $articles->save();
        return response()->json([
            "message" => "Article Ajouter."
        ],201);
    }
    public function update(Request $request, $id)
    {
        //$article = Article::update($request->all());
        $articles = Article::find($id);
        if ($articles){
            
            $articles->titre = is_null($request->titre) ? $articles->titre : $request->titre;
            $articles->contenu = is_null($request->contenu) ? $articles->contenu : $request->contenu;
            $articles->datePublication = is_null($request->datePublication) ? $articles->datePublication : $request->datePublication;
            $articles->save();
                return response()->json([
                    'message'=> 'article_modifier'
                ],202);
        }else {
            return response()->json([
                "message" => "Article non trouver."
            ],404);
        }
    }
    public function destroy($id)
    {
        //article pas articles 
        $articles = Article::find($id);
        if($articles)  {
            
            $articles->delete();

            return response()->json([
                "message"=> "Articles supprimer."
            ],202);
        }else{
            return response()->json([
                "message" => "Article non trouver."
            ],404);
        }
    }*/

