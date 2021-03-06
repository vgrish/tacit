<?php
/*
 * This file is part of the Tacit package.
 *
 * Copyright (c) Jason Coward <jason@opengeek.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tacit\Transform;

use League\Fractal\TransformerAbstract;
use Tacit\Controller\Exception\RestfulException;

class RestfulExceptionTransformer extends TransformerAbstract
{
    public function transform(RestfulException $resource)
    {
        return [
            'status' => $resource->getStatus(),
            'code' => $resource->getCode(),
            'message' => $resource->getMessage(),
            'description' => $resource->getDescription(),
            'property' => $resource->getProperty()
        ];
    }
}
