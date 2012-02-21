<?php

namespace nass600\LyricsBundle\Model;

class LyricsManager
{
	protected $provider;

	public function __construct($provider){
		$this->provider = new $provider;
	}

	public function searchLyrics($query){
		$this->provider->setParameter('q', $query);
		$results = $this->provider->searchLyrics();

		return $results;
	}

	public function getLyrics(){
		$results = $this->provider->getLyrics();

		return $results;
	}
}