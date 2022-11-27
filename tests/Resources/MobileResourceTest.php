<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\Mobile\GetMobile;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class MobileResourceTest extends TestCase
{
    protected function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    public function testGetSections(): void
    {
        $params = ['title' => 'Jupiter'];

        $response = $this->wiki->mobile()->getSections($params);

        $this->assertInstanceOf(GetMobile::class, $response);
    }

    public function testGetSectionsNotFound(): void
    {
        $params = ['title' => 'hflk;aHF'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Page or revision not found.');

        $this->wiki->mobile()->getSections($params);
    }

    public function testGetSectionsByRevision(): void
    {
        $params = ['title' => 'Jupiter', 'revision' => 1124023924];

        $response = $this->wiki->mobile()->getSectionsByRevision($params);

        $this->assertInstanceOf(GetMobile::class, $response);
    }

    public function testGetSectionsByRevisionNotFound(): void
    {
        $params = ['title' => 'hflk;aHF', 'revision' => 123];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);

        $this->wiki->mobile()->getSectionsByRevision($params);
    }
}
