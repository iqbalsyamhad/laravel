<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return response(['articles' => ArticleResource::collection($articles), 'message' => 'Retrieved successfully'], 200);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:10',
            'content' => 'required|max:255'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $article = Article::create($data);

        return response([ 'article' => new ArticleResource($article), 'message' => 'Created successfully'], 200);
    }

    public function update($id)
    {
        $article = Article::find($id);
        $article->name = request('name');
        $article->content = request('content');
        $article->save();

        return response([ 'article' => new ArticleResource($article), 'message' => 'Retrieved successfully'], 200);
    }

    public function destroy($id)
    {
        Article::findOrFail($id)->delete();

        return response([ 'message' => 'Article deleted successfully'], 200);
    }

}
