<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan disini

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->published_at = $request->published_at;
        $news->save();

        return redirect()->route('news.index')->with('success', 'News created successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan disini

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->published_at = $request->published_at;
        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
