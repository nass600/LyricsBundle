<?php

namespace nass600\LyricsBundle\Provider;

class LyrDB
{
	const API_URL = "http://webservices.lyrdb.com/dev/function.php?parameters&output=json";

    protected $parameters = array();

	public function searchLyrics(){
		$url = str_replace('function', 'lookup', $this->getUrl());
		echo "<pre>";
		var_dump($url);
		echo "</pre>";
		die;
		return "search";
	}

	public function getLyrics(){
		return "get";
	}

	public function setParameters(array $params)
    {
        foreach ($params as $pName => $pValue) {
            $this->setParameter($pName, $pValue);
        }
    }

	public function setParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }

	public function getParameters()
    {
        return $this->parameters;
    }

	public function getUrl()
    {
        return str_replace("parameters", $this->getHtmlParameters(), self::API_URL);
    }

	/**
     * This method returns params formatted (html)
     *
     * @return string
     */
    protected function getHtmlParameters()
    {
        $glue = "&";
        $htmlParams = "";

        $parameters = $this->getParameters();
        foreach ($parameters as $name => $value) {
            $htmlParams .= $name . '=' . str_replace(" ", '+', $value) . $glue;
        }

        return substr($htmlParams, 0, -strlen($glue));
    }
}