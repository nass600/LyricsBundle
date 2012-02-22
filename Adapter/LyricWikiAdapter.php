<?php

namespace nass600\LyricsBundle\Adapter;

class LyricWikiAdapter extends AbstractAdapter implements AdapterInterface
{
	const API_URL = "http://http://webservices.lyrdb.com/dev/function.php?parameters";

	public function searchLyrics(){

	}

	public function getLyrics(){

	}

	public function getUrl()
    {
        return str_replace("parameters", $this->getHtmlParameters(), self::API_URL);
    }
}