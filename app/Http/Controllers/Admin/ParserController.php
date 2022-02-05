<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $service)
	{
		dd(
			$service->load('https://news.yandex.ru/movies.rss')
				    ->start()
		);
	}
}
