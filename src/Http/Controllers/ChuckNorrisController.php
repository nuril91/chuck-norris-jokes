<?php


namespace Nuril91\ChuckNorrisJokes\Http\Controllers;


use Nuril91\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return view('chuck-norris::joke', [
            'joke' => ChuckNorris::getRandomJoke()
        ]);
    }
}