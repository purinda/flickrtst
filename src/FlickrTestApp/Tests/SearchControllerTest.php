<?php

namespace FlickrTestApp\Tests;

use  FlickrTestApp\Controller\SearchController;

class SearchControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testPrevLink()
    {
        $current_page = 101;
        $expected_page = 100;

        $link = SearchController::buildPrevLink($current_page, 'jurassic world');
        $this->assertEquals('/search/?query=jurassic+world&page=' . $expected_page, $link);
    }

    public function testNextLink()
    {
        $current_page = 101;
        $expected_page = 102;

        $link = SearchController::buildNextLink(1000, $current_page, 'jurassic world');

        $this->assertEquals('/search/?query=jurassic+world&page=' . $expected_page, $link);
    }

}
