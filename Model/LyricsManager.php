<?php

namespace nass600\LyricsBundle\Model;

class LyricsManager
{
	protected $provider;

	public function __construct($provider){
		$this->provider = new $provider;
	}

	public function searchLyrics(){
		echo "<pre>";
		\Doctrine\Common\Util\Debug::dump($this->provider);
		echo "</pre>";
		die;
	}

	public function getLyrics(){

	}
}