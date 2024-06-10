<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->get();
        return view('news.home', ['news' => $news]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'published_at' => 'required|date',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('news.create')->withInput()->withErrors($validator);
        }

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->published_at = $request->published_at;
        $news->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $imageName);
            $news->image = $imageName;
            $news->save();
        }

        return redirect()->route('news.index')->with('success', 'News Added Successfully');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'published_at' => 'required|date',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('news.edit', $id)->withInput()->withErrors($validator);
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->published_at = $request->published_at;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $imageName);
            $news->image = $imageName;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News Updated Successfully');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            File::delete(public_path('uploads/news/' . $news->image));
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News Deleted Successfully');
    }
}
