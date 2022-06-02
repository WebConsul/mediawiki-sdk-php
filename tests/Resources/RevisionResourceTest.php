<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\CompareRevisions;
use MediawikiSdkPhp\DTO\Responses\RevisionObject;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class RevisionResourceTest extends TestCase
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
        $params   = ['id' => 1084994628];
        $response = $this->wiki->revision()->get($params);

        $this->assertInstanceOf(RevisionObject::class, $response);
    }

    public function testGetNotFound()
    {
        $wiki   = new MediaWiki();
        $params = ['id' => 434409762];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified revision (434409762) does not exist');

        $wiki->revision()->get($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testCompareSuccess()
    {
        $params   = ['from' => 384955912, 'to' => 406217369];
        $response = $this->wiki->revision()->compare($params);

        $this->assertInstanceOf(CompareRevisions::class, $response);
    }

    public function testCompareNotFound()
    {
        $params = ['from' => 434409762, 'to' => 406217369];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The revision specified by the from parameter does not exist.');

        $this->wiki->revision()->compare($params);
    }

    public function testCompareCanNotBeCompared()
    {
        $params = ['from' => 1084994628, 'to' => 1079937515];
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('The specified revisions belong to different pages; refusing to compare them.');

        $this->wiki->revision()->compare($params);
    }
}
