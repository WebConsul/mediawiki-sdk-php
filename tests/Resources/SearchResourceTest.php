<?php

namespace Resources;

use MediawikiSdkPhp\DTO\Responses\SearchResults;
use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWiki;
use PHPUnit\Framework\TestCase;

class SearchResourceTest extends TestCase
{
    protected function setUp(): void
    {
        $this->wiki = new MediaWiki();

        parent::setUp();
    }

    /**
     * 200 Success: Results found. Returns a pages object containing an array of search results.
     *
     * @throws MediaWikiException
     *
     */
    public function testSearchPagesSuccess()
    {
        $params   = ['q' => 'Jupiter', 'limit' => 5];
        $response = $this->wiki->search()->pages($params);

        $this->assertInstanceOf(SearchResults::class, $response);
    }

    /**
     * 200 Success: No results found. Returns a pages object containing an empty array.
     *
     * @throws MediaWikiException
     */
    public function testSearchPagesSuccessNoResultsFound()
    {
        $params   = ['q' => 'lakdhjf;lkJFKL', 'limit' => 5];
        $response = $this->wiki->search()->pages($params);

        $this->assertInstanceOf(SearchResults::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testSearchPagesIncorrectLimit()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(
            "Validation errors:\n\t - `MediawikiSdkPhp\DTO\Requests\SearchRequest->limit`: This value should be less than or equal to 100."
        );

        $params = ['q' => 'Jupiter', 'limit' => 1000];
        $this->wiki->search()->pages($params);
    }

    /**
     * 200 Success: Results found. Returns a pages object containing an array of search results.
     *
     * @throws MediaWikiException
     *
     */
    public function testAutocompletePageTitleSuccess()
    {
        $params   = ['q' => 'Jupiter', 'limit' => 5];
        $response = $this->wiki->search()->autocompletePageTitle($params);

        $this->assertInstanceOf(SearchResults::class, $response);
    }

    /**
     * 200 Success: No results found. Returns a pages object containing an empty array.
     *
     * @throws MediaWikiException
     */
    public function testAutocompletePageTitleSuccessNoResultsFound()
    {
        $params   = ['q' => 'lakdhjf;lkJFKL', 'limit' => 5];
        $response = $this->wiki->search()->autocompletePageTitle($params);

        $this->assertInstanceOf(SearchResults::class, $response);
    }

    /**
     * @throws MediaWikiException
     */
    public function testAutocompletePageTitleIncorrectLimit()
    {
        $this->expectException(MediaWikiException::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage(
            "Validation errors:\n\t - `MediawikiSdkPhp\DTO\Requests\SearchRequest->limit`: This value should be less than or equal to 100."
        );

        $params = ['q' => 'Jupiter', 'limit' => 1000];
        $this->wiki->search()->autocompletePageTitle($params);
    }

    /**
     * @throws MediaWikiException
     */
    public function testAutocompletePageTitleOnRussianSuccess()
    {
        $this->wiki = new MediaWiki('ru');
        $params   = ['q' => 'Юпитер', 'limit' => 5];
        $response = $this->wiki->search()->autocompletePageTitle($params);

        $this->assertInstanceOf(SearchResults::class, $response);
    }
}
