<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Comment::all();
        return response()->json($articles);
    }
    public function store(Request $request)
    {
        $comments = new Comment;
        
        $comments->contenuComment = $request->contenuComment;
        $comments->date = $request->date;
        $comments->save();
        return response()->json([
            "message" => "Commantaire Ajouter."
        ],201);
    }
    public function show($id)
    {
        $comments = Comment::find($id);
        if(!empty($comments)) {
            return response()->json($comments);
        }
        else
        {
            return response()->json([
                "message" => "Commantaire non trouver."
            ],404);
        }
    }
    public function update(Request $request, $id)
    {
        if (Comment::where('id',$id)->exists()){
            $comments = Comment::find($id);
            $comments->contenuComment = is_null($request->contenuComment) ? $comments->contenuComment : $request->contenuComment;
            $comments->date = is_null($request->date) ? $comments->date : $request->date;
            $comments->save();
                return response()->json([
                    'message'=> 'Commantaire modifier.'
                ],404);
        }else {
            return response()->json([
                "message" => "Commantaire non trouver."
            ],404);
        }
    }
    public function destroy($id)
    {
        if(Comment::where("id",$id)->exists())  {
            $comments = Comment::find($id);
            $comments->delete();

            return response()->json([
                "message"=> "Commantaires supprimer."
            ],202);
        }else{
            return response()->json([
                "message" => "Commantaires non trouver."
            ],404);
        }
    }
}
