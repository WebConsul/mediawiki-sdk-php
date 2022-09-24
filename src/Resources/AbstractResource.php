<?php

namespace MediawikiSdkPhp\Resources;

use MediawikiSdkPhp\Exceptions\MediaWikiException;
use MediawikiSdkPhp\MediaWikiAdapter;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Spatie\DataTransferObject\Exceptions\ValidationException;
use TypeError;

abstract class AbstractResource
{
    const API_TYPE = 'MEDIAWIKI'; //or WIKIMEDIA
    protected MediaWikiAdapter $adapter;

    public function __construct()
    {
        $this->adapter = new MediaWikiAdapter($this);
    }

    /**
     * @throws MediaWikiException
     */
    protected function validateParams(string $dtoClass, array $params): void
    {
        try {
            new $dtoClass($params);
        } catch (TypeError $e) {
            $error = [
                'reason'  => 'Type error',
                'code'    => $e->getCode(),
                'message' => $e->getMessage(),
            ];
            throw new MediaWikiException($error);
        } catch (UnknownProperties $e) {
            $error = [
                'reason'  => 'Request validation: Unknown properties',
                'code'    => $e->getCode(),
                'message' => $e->getMessage(),
            ];
            throw new MediaWikiException($error);
        } catch (ValidationException $e) {
            $error = [
                'reason'  => 'Invalid request parameter',
                'code'    => 422,
                'message' => $e->getMessage(),
            ];
            throw new MediaWikiException($error);
        }
    }
}
