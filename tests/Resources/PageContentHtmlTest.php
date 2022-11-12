<?php

namespace Resources;

use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class PageContentHtmlTest extends TestCase
{
    public function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    public function testGetSuccess()
    {
        $params = [
            'title' => 'Main_Page',
            'redirect' => true,
            'stash' => false,
        ];

        $response = $this->wiki->pageContent()->html($params);

        $this->assertStringContainsString('html', $response);
    }


    public function testGetNotFound()
    {
        $params = ['title' => 'qwe123qwe123'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Not found');

        $this->wiki->pageContent()->html($params);
    }
}