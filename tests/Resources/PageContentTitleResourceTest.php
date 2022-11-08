<?php

namespace Resources;

use JsonException;
use MediawikiSdkPhp\DTO\Responses\GetPageTitlesList;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class PageContentTitleResourceTest extends TestCase
{
    public function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetSuccess()
    {
        $params   = ['title' => 'Main_Page'];
        $response = $this->wiki->pageContent()->title($params);

        $this->assertInstanceOf(GetPageTitlesList::class, $response);
    }

    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetNotFound()
    {
        $params = ['title' => 'hflk;aHF'];
        $this->expectException(MediaWikiException::class);

        $this->wiki->pageContent()->title($params);
    }
}