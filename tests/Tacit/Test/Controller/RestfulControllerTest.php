<?php
/*
 * This file is part of the Tacit package.
 *
 * Copyright (c) Jason Coward <jason@opengeek.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tacit\Test\Controller;

/**
 * Test Restful controllers.
 *
 * @package Tacit\Test\Controller
 */
class RestfulControllerTest extends ControllerTestCase
{
    /**
     * Test a very basic RESTful GET request.
     *
     * @group controller
     */
    public function testGet()
    {
        $this->mockEnvironment([
            'PATH_INFO' => '/'
        ]);

        $response = $this->tacit->invoke();

        $this->assertEquals(
            array_intersect_assoc(
                ['message' => 'mock me do you?'],
                json_decode($response->getBody(), true)
            ),
            ['message' => 'mock me do you?']
        );
    }

    /**
     * Test a very simple RESTful POST request from JSON.
     *
     * @group controller
     */
    public function testPostFromJson()
    {
        $bodyRaw = ['message' => 'mock me do you mocker?'];

        $this->mockEnvironment([
            'PATH_INFO' => '/',
            'REQUEST_METHOD' => 'POST',
            'CONTENT_TYPE' => 'application/json',
            'slim.input' => '{"target":"mocker"}'
        ]);

        $response = $this->tacit->invoke();

        $this->assertEquals(
            array_intersect_assoc(
                $bodyRaw,
                json_decode($response->getBody(), true)
            ),
            $bodyRaw
        );
    }

    /**
     * Test a very simple RESTful POST request.
     *
     * @group controller
     */
    public function testPostFromForm()
    {
        $bodyRaw = ['message' => 'mock me do you mocker?'];

        $this->mockEnvironment([
            'PATH_INFO' => '/',
            'REQUEST_METHOD' => 'POST',
            'CONTENT_TYPE' => 'application/x-www-form-urlencoded',
            'slim.input' => 'target=mocker'
        ]);

        $response = $this->tacit->invoke();

        $this->assertEquals(
            array_intersect_assoc(
                $bodyRaw,
                json_decode($response->getBody(), true)
            ),
            $bodyRaw
        );
    }
}
