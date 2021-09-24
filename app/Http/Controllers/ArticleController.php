<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getArticle()
    {
        $articles = Article::all();
        return view('article/articlelist', compact('articles'));
    }

    public function getOneArticle($id)
    {
        $article = Article::find($id);
        return view('article/articleupdate', compact('article'));
    }

    public function createArticle()
    {
        $article = new Article();
        $article->name = request('name');
        $article->content = request('content');
        $article->save();

        return redirect('/article');
    }

    public function deleteArticle($id)
    {
        Article::findOrFail($id)->delete();

        return redirect('/article');
    }

    public function updateArticle($id)
    {
        $article = Article::find($id);
        $article->name = request('name');
        $article->content = request('content');
        $article->save();

        return redirect('/article');
    }
}
