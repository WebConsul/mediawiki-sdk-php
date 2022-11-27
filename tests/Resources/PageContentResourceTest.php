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
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetTitleRevisionSuccess(): void
    {
        $params   = ['title' => 'Jupiter'];
        $pageTitleResponse = $this->wiki->pageContent()->getTitle($params)->toArray();
        $params['revision'] = $pageTitleResponse['items'][0]['rev'];

        $response = $this->wiki->pageContent()->getTitleRevision($params);

        $this->assertInstanceOf(GetPageTitlesList::class, $response);
    }

    /**
     * @throws JsonException
     * @throws MediaWikiException
     */
    public function testGetTitleRevisionNotFound(): void
    {
        $params = ['title' => 'hflk;aHF', 'revision' => 1];
        $this->expectException(MediaWikiException::class);

        $this->wiki->pageContent()->getTitleRevision($params);
    }
}







