# MediaWiki SDK (PHP)

This project enables PHP developers to use

- the [MediaWiki REST API](https://www.mediawiki.org/wiki/API:REST_API/Reference)
- the [Wikimedia REST API](https://en.wikipedia.org/api/rest_v1/)
  in their PHP code.

## Installation

You can install the package via composer:

```bash
composer require ekut/mediawiki-sdk-php
```

* **Note**: This package only supports `php:^8.0`.

## Usage

In general, we use the SDK by this way:

```php
  $wiki = new \MediawikiSdkPhp\MediaWiki();
  $params = ['foo'=>'bar'];
  /** @var \Spatie\DataTransferObject\DataTransferObject $res */
  $res = $wiki->{ResourceName()}->{ActionName($params)}
  /** @var array $data */
  $data = $res->toArray();
```

Default language is English. If we want to use another language, we can set it in MediaWiki constructor:

```php
  $wiki = new \MediawikiSdkPhp\MediaWiki('ru');
```

Real examples: see bellow. Error handling: see bellow.

### Configuration (.env)

The package use `vlucas/phpdotenv` for set environment variables. All you need to do is
fulfill `.env` file in root project folder with two variables/values:

```dotenv
MEDIAWIKI_HOST="https://www.wikipedia.org/"
COMMONS_HOST="https://commons.wikimedia.org/"
```

### Available Resources and Actions

### MediaWiki REST API

* file
    * get
* page
    * create - @ToDo
    * update - @ToDo
    * get
    * getOffline
    * getSource
    * getHtml
    * getLanguages
    * getFiles
    * getHistory
    * getHistoryCounts
* revision
    * get
    * compare
* search
    * pages
    * autocompletePageTitle

### Wikimedia REST API
* pageContent
  * getPageSummary
  * getPageTitle
* mobile
  * getSections
* feed - @ToDo
* transforms - @ToDo
* math - @ToDo
* citation - @ToDo
* readingLists - @ToDo
* recommendation - @ToDo
* offline - @ToDo
* talkPages - @ToDo

## MediaWiki REST API

### file

#### get

Returns information about a file, including links to download the file in thumbnail, preview, and original formats.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'The_Blue_Marble.jpg'];
  $res = $wiki->file()->get($params); 
```

### page

#### create

Creates a wiki page. The response includes a location header containing the API endpoint to fetch the new page.

This endpoint is designed to be used with the OAuth extension authorization process. Callers using cookie-based
authentication instead must add a CSRF token to the request body. To get a CSRF token, see the Action API.

```dotenv
@ToDo
```

#### update

Updates or creates a wiki page. This endpoint is designed to be used with the OAuth extension authorization process.
Callers using cookie-based authentication instead must add a CSRF token to the request body. To get a CSRF token, see
the Action API.

To update a page, you need the page's latest revision ID and the page source. First call the get page source endpoint,
and then use the source and latest.id to update the page. If latest.id doesn't match the page's latest revision, the API
resolves conflicts automatically when possible. In the event of an edit conflict, the API returns a 409 error.

To create a page, omit latest.id from the request.

```dotenv
@ToDo
```

#### get

Returns the standard page object for a wiki page,
including the API route to fetch the latest content in HTML, the license, and information about the latest revision.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->get($params); 
```

#### getOffline

Returns information about a wiki page, including the license, latest revision, and latest content in HTML.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getOffline($params); 
```

#### getSource

Returns the content of a wiki page in the format specified by the content_model property, the license, and information
about the latest revision.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getSource($params); 
```

#### getHtml

Returns the latest content of a wiki page in HTML.

```dotenv
@ToDo = MediawikiResponse. 
```

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getHtml($params); 
```

#### getLanguages

Searches connected wikis for pages with the same topic in different languages.
Returns an array of page language objects that include the name of the language, the language code, and the translated
page title.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getLanguages($params); 
```

#### getFiles

Returns information about media files used on a wiki page.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getFiles($params); 
```

#### getHistory

Returns information about the latest revisions to a wiki page, in segments of 20 revisions, starting with the latest
revision.

The response includes API routes for the next oldest, next newest, and latest revision segments, letting you scroll
through page history.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter'];
  $res = $wiki->page()->getHistory($params); 
```

#### getHistoryCounts

Returns data about a page's history.

```php
  $wiki = new MediaWiki();
  $params = ['title'=>'Jupiter', 'type' => 'edits', 'from' => 384955912, 'to'=>406217369];
  $res = $wiki->page()->getHistoryCounts($params); 
```

### revision

#### get

Returns details for an individual revision.

```php
  $wiki = new MediaWiki();
  $params = ['id'=>1084994628];
  $res = $wiki->revision()->get($params); 
```

#### compare

Returns data that lets you display a line-by-line comparison of two revisions.
Only text-based wiki pages can be compared.

```php
  $wiki = new MediaWiki();
  $params = ['from' => 384955912, 'to' => 406217369];
  $res = $wiki->revision()->compare($params); 
```

### search

#### pages

Searches wiki page titles and contents for the provided search terms, and returns matching pages.

```php
  $wiki = new MediaWiki();
  $params = ['q' => 'Jupiter', 'limit' => 5];
  $res = $wiki->search()->pages($params); 
```

#### autocompletePageTitle

Searches wiki page titles, and returns matches between the beginning of a title and the provided search terms.
You can use this action for a typeahead search that automatically suggests relevant pages by title.

```php
  $wiki = new MediaWiki();
  $params = ['q' => 'Jupiter', 'limit' => 5];
  $res = $wiki->search()->autocompletePageTitle($params); 
```


## Wikimedia REST API

### Page Content

#### getPageSummary

```php
  $wiki = new MediaWiki();
  $params = ['title' => 'Jupiter'];
  $res = $wiki->pageContent()->getSummary($params); 
```

#### getPageTitle

```php
  $wiki = new MediaWiki();
  $params = ['title' => 'Jupiter'];
  $res = $wiki->pageContent()->getTitle($params); 
```

### Mobile

#### getSections

Retrieve the latest HTML for a page title optimised for viewing with native mobile applications. 
Note that the output is split by sections.

```php
  $wiki = new MediaWiki();
  $params = ['title' => 'Jupiter'];
  $res = $wiki->mobile()->getSections($params);
```

## Request parameters validation

For validation the package use `spatie/data-transfer-object` and `ekut/spatie-dto-validators`.

Input array `$params` for each action will be validated with related `{...Request}` class (extends DataTransferObject).
All Request DTOs are strict. It means: if `$params` contains some unknown property, MediaWikiException will be thrown.
See [Request classes](src\DTO\Requests) in code tree.

## Error Handling

Any none-successful request (status >= 400) will throw MediaWikiException.

```php
try{
    $res = $wiki->{ResourceName()}->{ActionName($params)}
} catch (\MediawikiSdkPhp\Exceptions\MediaWikiException $e) {
    echo $e->getCode();
    echo $e->getMessage();
    echo $e->getReason();
}
```

It extends main PHP Exception class and contains one additional method:

```php
  $e->getReason();
```

### Development

Need **Docker** and **Docker-Compose**.

Init developer environment:

```
make init
```

Run tests:

```
make sdk-test
```

Run bash shell:

```
make sdk-shell
```
