<?php

namespace Overblog\GraphQLBundle\Tests\Integration\OverblogGraphQLBundle\Controller;

use Overblog\GraphiQLBundle\Tests\Integration\OverblogGraphQLBundle\TestCase;
use Symfony\Component\HttpFoundation\Response;

class GraphiQLControllerTest extends TestCase
{
    public function testSecondSchema()
    {
        $client = static::createClient();

        $client->request('GET', '/graphiql/second');
        $response = $client->getResponse();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
    }

    public function testDefaultSchema()
    {
        $client = static::createClient();

        $client->request('GET', '/graphiql');
        $response = $client->getResponse();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->stringContains('Loading...', $response->getContent());
    }
}
