<?php

namespace nass600\LyricsBundle\Adapter;

/**
 * LyrDBAdapter
 *
 * @package nass600LyricsBundle
 * @subpackage Adapter
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
class LyrDBAdapter extends AbstractAdapter implements AdapterInterface
{
	const API_URL = "http://webservices.lyrdb.com/dev/function.php?parameters";

	const SEARCH_FUNCTION = "lookup";

	const GET_FUNCTION = "getlyr";

	protected $validFormats = array('text', 'xml', 'json');

	public function searchLyrics($query, $format)
	{
		$this->setParameter('q', $query);
		$this->setParameter('agent', 'trial');
		$this->setOutputFormat($format);

		$url = str_replace('function', self::SEARCH_FUNCTION, $this->getUrl());

		$data = $this->getFeed($url);

		return $data;
	}

	public function getLyrics($id, $format)
	{
		$this->setParameter('q', $id);
		$this->setParameter('agent', 'trial');
		$this->setOutputFormat($format);

		$url = str_replace('function', self::GET_FUNCTION, $this->getUrl());

		$data = $this->getFeed($url);

		return $data;
	}

	public function getUrl()
    {
        return str_replace("parameters", $this->getHttpParameters(), self::API_URL);
    }

	/**
	 * Sets the output parameter for the url
	 *
	 * @param string $format
	 * @throws \Exception
	 */
	public function setOutputFormat($format)
	{
		if (!in_array($format, $this->validFormats))
			throw new \Exception('Invalid output format');

		$this->setParameter('output', $format);
	}
}