<?php

namespace nass600\LyricsBundle\Model;

use nass600\LyricsBundle\Adapter\AdapterInterface;

/**
 * LyricsManager
 *
 * @package nass600LyricsBundle
 * @subpackage Model
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
class LyricsManager
{
	protected $adapter;

	public function __construct($adapter){
		$this->adapter = new $adapter;
	}

	/**
	 * Performs a search of the $query text against the web service and outputs the result in the given $format
	 *
	 * @param string $query
	 * @param string $format
	 * @return mixed
	 */
	public function searchLyrics($query, $format){
		$results = $this->adapter->searchLyrics($query, $format);

		echo "<pre>";
		var_dump($results);
		echo "</pre>";

		return $results;
	}

	/**
	 * Gets the lyrics through the adapter API given the track $id and outputs the result in the given $format
	 *
	 * @param string $id
	 * @param string $format
	 * @return mixed
	 */
	public function getLyrics($id, $format){
		$results = $this->adapter->getLyrics($id, $format);

		echo "<pre>";
		var_dump($results);
		echo "</pre>";

		return $results;
	}
}