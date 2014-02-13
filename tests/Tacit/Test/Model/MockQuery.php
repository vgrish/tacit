<?php
/*
 * This file is part of the Tacit package.
 *
 * Copyright (c) Jason Coward <jason@opengeek.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tacit\Test\Model;


use Tacit\Model\Query;

class MockQuery extends Query
{
    protected $primitive;

    public function __construct()
    {
        $this->primitive = new MockPersistentFinder();
    }
} 