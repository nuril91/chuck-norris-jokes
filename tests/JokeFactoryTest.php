<?php

namespace Nuril91\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Nuril91\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{"type": "success", "value": {"id": 280, "joke": "When Chuck Norris works out on the Total Gym, the Total Gym feels like it\'s been raped.", "categories": [] } }')
        ]);

        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('When Chuck Norris works out on the Total Gym, the Total Gym feels like it\'s been raped.', $joke);
    }
}
