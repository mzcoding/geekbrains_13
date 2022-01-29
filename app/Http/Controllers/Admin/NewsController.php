<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$news = News::query()
			->whereHas('category', function ($query) {
				$query->where('id', '<', 10);
			})
			->with('category')
			//->select(News::$availableFields)
			->paginate(5);

        return view('admin.news.index', [
			'newsList' => $news
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = Category::all();
        return view('admin.news.create', [
			'categories' => $categories
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string', 'min:5']
		]);



		$created = News::create(
			$request->only(['category_id', 'title', 'author', 'status', 'description']) + [
				'slug' => \Str::slug($request->input('title'))
			]
		);

		if($created) {
			return redirect()->route('admin.news.index')
				     ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись')
			->withInput();

    }

	/**
	 * Display the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function show(News $news)
    {
        //
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
			'news' => $news
		]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function update(Request $request, News $news)
    {

		$updated = $news->fill($request->only(['category_id', 'title', 'author', 'status', 'description']) + [
				'slug' => \Str::slug($request->input('title'))
			])->save();

		if($updated) {
			return redirect()->route('admin.news.index')
				->with('success', 'Запись успешно обновлена');
		}

		return back()->with('error', 'Не удалось обновить запись')
			->withInput();
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param News $news
	 * @return \Illuminate\Http\Response
	 */
    public function destroy(News $news)
    {
        //
    }
}
