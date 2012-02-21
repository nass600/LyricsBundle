<?php

namespace nass600\LyricsBundle\Provider;


interface ProviderInterface
{
    public function searchLyrics();

    public function getLyrics();
}