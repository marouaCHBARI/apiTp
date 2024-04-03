<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        if ($comments->isEmpty()) {
            return response()->json(['message' => 'No comments found'], 404);
        }
        return response()->json($comments);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content_comment' => 'required|text',
            'date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $comment = Comment::create([
            'content_comment' => $request->contenuComment,
            'date' => $request->date,
        ]);
        return response()->json(["message" => "Comment added",], 201);
    }
    public function show($id)
    {
        $comment = Comment::find($id);
        if(!empty($comment)) {
            return response()->json($comment);
        }
        else
        {
            return response()->json(["message" => "Comment not found"],404);
        }
    }
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(["message" => "Comment not found"], 404);
        }
        $validator = Validator::make($request->all(), [
            'content_comment' => 'sometimes|text',
            'date' => 'sometimes|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $comment->update($request->all());
        return response()->json(['message' => 'Comment modified'], 200);
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(Comment::where("id",$id)->exists())  {
            $comment->delete();
            return response()->json(["message"=> "Comments deleted"],202);
        }else{
            return response()->json(["message" => "Comment not found"],404);
        }
    }

}

    /*
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
    }*/

