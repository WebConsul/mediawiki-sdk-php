<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\GetFile;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class FileResourceTest extends TestCase
{
    protected function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetSuccess()
    {
        $params = ['title' => 'Zeev Suraski 2005 cropped.jpg'];

        $response = $this->wiki->file()->get($params);
        $this->assertInstanceOf(GetFile::class, $response);
    }

    public function testGetNotFound()
    {
        $params = ['title' => 'eryiueryuihuifhh'];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (eryiueryuihuifhh) does not exist');

        $this->wiki->file()->get($params);
    }
}
