<?php

use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use MediawikiSdkPhp\Resources\MediaWiki\FileResource;
use MediawikiSdkPhp\Resources\MediaWiki\PageResource;
use MediawikiSdkPhp\Resources\MediaWiki\RevisionResource;
use MediawikiSdkPhp\Resources\MediaWiki\SearchResource;
use MediawikiSdkPhp\Resources\WikiMedia\PageContentResource;
use PHPUnit\Framework\TestCase;

class MediaWikiTest extends TestCase
{
    public function testConstructorWithDotEnvLoading()
    {
        new MediaWiki();
        $this->assertArrayHasKey('MEDIAWIKI_HOST', $_ENV);
        $this->assertArrayHasKey('COMMONS_HOST', $_ENV);
    }

    public function testGetFileResource()
    {
        $wiki     = new MediaWiki();
        $resource = $wiki->file();
        $this->assertInstanceOf(FileResource::class, $resource);
    }

    public function testGetPageResource()
    {
        $wiki     = new MediaWiki();
        $resource = $wiki->page();
        $this->assertInstanceOf(PageResource::class, $resource);
    }

    public function testGetPageContentResource()
    {
        $wiki     = new MediaWiki();
        $resource = $wiki->pageContent();
        $this->assertInstanceOf(PageContentResource::class, $resource);
    }

    public function testGetRevisionResource()
    {
        $wiki     = new MediaWiki();
        $resource = $wiki->revision();
        $this->assertInstanceOf(RevisionResource::class, $resource);
    }

    public function testGetSearchResource()
    {
        $wiki     = new MediaWiki();
        $resource = $wiki->search();
        $this->assertInstanceOf(SearchResource::class, $resource);
    }

    public function testGetNoneExistingResource()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified resource (tickets) does not exist');

        $wiki     = new MediaWiki();
        $wiki->tickets();
    }
}
