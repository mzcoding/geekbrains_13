<?php

declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
	/**
	 * @param string $link
	 * @return $this
	 */
	public function load(string $link): self;

	/**
	 * @return array
	 */
	public function start(): void;
}