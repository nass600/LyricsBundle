LyricsBundle
==================

The LyricsBundle offers access to several web services that offer music track lyrics data abstracting their API's
through a common interface. Allows you to search for lyrics and get and manipulate them.


Installation
------------

Add LyricsBundle to your vendor/bundles/ directory.

Add the following lines in your ``deps`` file:

    [LyricsBundle]
      git =https://github.com/nass600/LyricsBundle.git
      target=/bundles/nass600/LyricsBundle
      version=master

Run the vendors script:

    ./bin/vendors install

Add the nass600 namespace to your `app/autoload.php`:

    // app/autoload.php
    $loader->registerNamespaces(array(
        // your other namespaces
        'nass600' => __DIR__.'/../vendor/bundles',
    );


Add PachubeBundle to your `app/AppKernel.php`:

    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...
            new Nass600\LyricsBundle\nass600LyricsBundle(),
        );
    }

Configuration
-------------

Add the lyrics class adapter to your app/config.yml:

	nass600_lyrics:
        provider: Nass600\LyricsBundle\Adapter\LyrDBAdapter


By default is set to use the LyrDB API for offering the best API related to lyrics services so you don't have to put
this configuration entry unless you want to use other API's


Usage
-----

### SearchLyrics

Just access the service and search for a certain track and put an output format

	$this->get('nass600.lyrics.manager')->searchLyrics("MICHAEL JACKSON Don't stop til get enough", "json");

### GetLyrics

Using the service, get the lyrics via passing the corresponding track id according to the web service in use and an
output format

	$this->get('nass600.lyrics.manager')->getLyrics("170987", 'text');

License
-------

This bundle is under de GNU license. See the complete license in:

    LICENSE

Authors
-------

- Ignacio Velázquez Gómez

Credits
-------

The bundle gets the information of the following free web services:

	LyrDB (http://www.lyrdb.com)

TODO
----

- Unit testing
