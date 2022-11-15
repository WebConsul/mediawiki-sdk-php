<?php

namespace Resources;

use JsonException;
use MediawikiSdkPhp\DTO\Responses\GetPageSummary;
use MediawikiSdkPhp\DTO\Responses\GetPageTitlesList;
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
     * @throws JsonException
     */
    public function testGetSummarySuccess(): void
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->pageContent()->getSummary($params);

        $this->assertInstanceOf(GetPageSummary::class, $response);
    }

    /**
     * @throws MediaWikiException
     * @throws JsonException
     */
    public function testGetSummaryNotFound(): void
    {
        $params = ['title' => 'hflk;aHF'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Page or revision not found.');

        $this->wiki->pageContent()->getSummary($params);
    }

    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetTitleSuccess(): void
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->pageContent()->getTitle($params);

        $this->assertInstanceOf(GetPageTitlesList::class, $response);
    }

    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetTitleNotFound(): void
    {
        $params = ['title' => 'hflk;aHF'];
        $this->expectException(MediaWikiException::class);

        $this->wiki->pageContent()->getTitle($params);
    }


    /**
     * @return void
     * @throws MediaWikiException
     */
    public function testGetHtmlSuccess(): void
    {
        $params = [
            'title' => 'Jupiter',
            'redirect' => true,
            'stash' => false,
        ];

        $response = $this->wiki->pageContent()->getHtml($params);

        $this->assertStringContainsString('html', $response);
    }


    /**
     * @return void
     * @throws MediaWikiException
     */
    public function testGetHtmlNotFound(): void
    {
        $params = ['title' => 'qwe123qwe123'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Not found');

        $this->wiki->pageContent()->getHtml($params);
    }
}







