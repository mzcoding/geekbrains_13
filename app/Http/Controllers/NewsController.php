<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	public function index()
	{
		$news = News::query()->select(
			News::$availableFields
		)->get();


		return view('news.index', [
			'newsList' => $news
		]);
	}

	public function show(News $news)
	{
		return view('news.show', [
			'news' => $news
		]);
	}
}
