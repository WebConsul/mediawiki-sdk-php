<?php

use MediawikiSdkPhp\MediaWiki;
use MediawikiSdkPhp\Resources\FileResource;
use MediawikiSdkPhp\Resources\PageResource;
use MediawikiSdkPhp\Resources\RevisionResource;
use MediawikiSdkPhp\Resources\SearchResource;
use PHPUnit\Framework\TestCase;

class MediaWikiTest extends TestCase
{
    public function testConstructorWithDotEnvLoading()
    {
        new MediaWiki();
        $this->assertArrayHasKey('MEDIAWIKI_API_ROOT', $_ENV);
        $this->assertArrayHasKey('MEDIAWIKI_FILES_API_ROOT', $_ENV);
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
}
