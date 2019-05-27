<?php

/*
 * This file is part of the pexels-library package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\Pexels\Tests\Model\Response;

use WBW\Library\Pexels\Model\Photo;
use WBW\Library\Pexels\Model\Response\PhotosResponse;
use WBW\Library\Pexels\Tests\AbstractTestCase;

/**
 * Photos response test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Library\Pexels\Tests\Model\Response
 */
class PhotosResponseTest extends AbstractTestCase {

    /**
     * Tests the addPhoto() method.
     *
     * @return void
     */
    public function testAddPhoto() {

        // Set a Photo mock.
        $photo = new Photo();

        $obj = new PhotosResponse();

        $obj->addPhoto($photo);
        $this->assertSame($photo, $obj->getPhotos()[0]);
    }

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new PhotosResponse();

        $this->assertNull($obj->getNextPage());
        $this->assertNull($obj->getPage());
        $this->assertNull($obj->getPerPage());
        $this->assertCount(0, $obj->getPhotos());
        $this->assertNull($obj->getTotalResults());
        $this->assertNull($obj->getUrl());
    }

    /**
     * Tests the setNextPage() method.
     *
     * @return void
     */
    public function testSetNextPage() {

        $obj = new PhotosResponse();

        $obj->setNextPage("nextPage");
        $this->assertEquals("nextPage", $obj->getNextPage());
    }

    /**
     * Tests the setTotalResults() method.
     *
     * @return void
     */
    public function testSetTotalResults() {

        $obj = new PhotosResponse();

        $obj->setTotalResults(236);
        $this->assertEquals(236, $obj->getTotalResults());
    }
}