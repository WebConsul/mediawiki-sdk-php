<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\GetFilesOnPage;
use MediawikiSdkPhp\DTO\Responses\GetLanguages;
use MediawikiSdkPhp\DTO\Responses\GetPage;
use MediawikiSdkPhp\DTO\Responses\GetPageHistory;
use MediawikiSdkPhp\DTO\Responses\GetPageHistoryCounts;
use MediawikiSdkPhp\DTO\Responses\GetPageHtml;
use MediawikiSdkPhp\DTO\Responses\GetPageOffline;
use MediawikiSdkPhp\DTO\Responses\GetPageWithSource;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class PageResourceTest extends TestCase
{
    public function setUp(): void
    {
        $this->wiki = new MediaWiki();
        parent::setUp();
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->get($params);

        $this->assertInstanceOf(GetPage::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->get($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetOfflineSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getOffline($params);

        $this->assertInstanceOf(GetPageOffline::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetOfflineNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getOffline($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetSourceSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getSource($params);

        $this->assertInstanceOf(GetPageWithSource::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetSourceNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getSource($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetHtmlSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getHtml($params);

        $this->assertInstanceOf(GetPageHtml::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetHtmlNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getHtml($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetLanguagesSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getLanguages($params);

        $this->assertInstanceOf(GetLanguages::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetLanguagesNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getLanguages($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetFilesSuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getFiles($params);

        $this->assertInstanceOf(GetFilesOnPage::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetFilesNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getFiles($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetHistorySuccess()
    {
        $params   = ['title' => 'Jupiter'];
        $response = $this->wiki->page()->getHistory($params);

        $this->assertInstanceOf(GetPageHistory::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetHistoryNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF'];
        $this->wiki->page()->getHistory($params);
    }
    /**
     * @throws MediaWikiException
     */
    public function testGetHistoryCountsSuccess()
    {
        $params   = ['title' => 'Jupiter', 'type'=>'edits', 'from'=>384955912, 'to'=>406217369];
        $response = $this->wiki->page()->getHistoryCounts($params);

        $this->assertInstanceOf(GetPageHistoryCounts::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testGetHistoryCountsNotFound()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('The specified title (hflk;aHF) does not exist');

        $params = ['title' => 'hflk;aHF', 'type'=>'edits'];
        $this->wiki->page()->getHistoryCounts($params);
    }
}
