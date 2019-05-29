<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Fixtures\Provider;

use WBW\Library\Pexels\Model\AbstractResponse;
use WBW\Library\Pexels\Provider\APIProvider;

/**
 * Test API provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Fixtures\Provider
 */
class TestAPIProvider extends APIProvider {

    /**
     * {@inheritDoc}
     */
    public function beforeReturnResponse(AbstractResponse $response) {
        return parent::beforeReturnResponse($response);
    }
}
