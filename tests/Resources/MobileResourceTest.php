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
}
