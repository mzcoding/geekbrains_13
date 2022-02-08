<?php

declare(strict_types=1);

namespace App\Services;

use XmlParser;
use App\Contracts\Parser;
use Laravie\Parser\Document as BaseDocument;

class ParserService implements Parser
{
	/**
	 * @var BaseDocument
	 */
	protected BaseDocument $load;
	protected string $fileName;

	/**
	 * @param string $link
	 * @return Parser
	 */
	public function load(string $link): Parser
	{
		$this->load = XmlParser::load($link);
		$this->fileName = $link;
		return $this;
	}

	/**
	 * @return void
	 */
	public function start(): void
	{
		$data =  $this->load->parse([
			'title' => [
				'uses' => 'channel.title'
			],
			'link' => [
				'uses' => 'channel.link'
			],
			'description' => [
				'uses' => 'channel.description'
			],
			'image' => [
				'uses' => 'channel.image.url'
			],
			'news' => [
				'uses' => 'channel.item[title,link,guid,description,pubDate]'
			]
		]);

		$explode = explode("/", $this->fileName);
		$name = end($explode);
		\Storage::append('parsing/' . $name, json_encode($data));
	}
}