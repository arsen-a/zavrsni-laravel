<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $succeded = [];
        $failed = 0;
        
        foreach ($request->all() as $index => $article) {
            $validator = Validator::make($article, [
                'title' => 'required',
                'price' => 'required|int',
                'image' => 'required|url',
                'shop_id' => 'required'
            ]);

            if ($validator->fails()) {
                $failed++;
            } else {
                array_push($succeded, $index);
                Article::create($article);
            }
        }

        if ($failed > 0) {
            return response()->json(['succeded' => $succeded, 'errors' => true, 'message' => 'Some articles failed to submit']);
        } else {
            return response()->json(['message' => 'All created successfully.', 'errors' => false], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::where('id', '=', $article->id)->delete();

        return response()->json(['message' => 'Article deleted successfully.'], 200);
    }
}
