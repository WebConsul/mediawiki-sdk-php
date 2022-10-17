<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\GetPageSummary;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class PageContentResourceTest extends TestCase
{
    public function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->pageContent()->summary($params);

        $this->assertInstanceOf(GetPageSummary::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetNotFound()
    {
        $params = ['title' => 'hflk;aHF'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $this->wiki->pageContent()->summary($params);
    }
}







