<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request)
	{
		$links = [
			'https://news.yandex.ru/auto.rss',
			'https://news.yandex.ru/auto_racing.rss',
			'https://news.yandex.ru/army.rss',
			'https://news.yandex.ru/gadgets.rss',
			'https://news.yandex.ru/index.rss',
			'https://news.yandex.ru/martial_arts.rss',
			'https://news.yandex.ru/communal.rss',
			'https://news.yandex.ru/health.rss',
			'https://news.yandex.ru/games.rss',
			'https://news.yandex.ru/internet.rss',
			'https://news.yandex.ru/cyber_sport.rss',
			'https://news.yandex.ru/movies.rss',
			'https://news.yandex.ru/cosmos.rss',
			'https://news.yandex.ru/culture.rss'
		];

		foreach($links as $link) {
            dispatch(new NewsParsing($link));
		}


		return "Parsing completed!";
	}
}
