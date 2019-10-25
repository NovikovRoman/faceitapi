```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use FaceitApi\Exception\ExceptionForbidden;
use FaceitApi\Exception\ExceptionNotFound;
use FaceitApi\Exception\ExceptionTemporarilyUnavailable;
use FaceitApi\Exception\ExceptionTooManyRequests;
use FaceitApi\Exception\ExceptionUnauthorized;
use FaceitApi\FaceitClient;
use FaceitApi\Service\Data\Search;
use GuzzleHttp\Exception\GuzzleException;

$client = new FaceitClient('our_api_key');

$p = new Search($client);

try {
    $res = $p->players('alex');
    print_r($res);

} catch (ExceptionForbidden $e) {
    die($e->getMessage());

} catch (ExceptionNotFound $e) {
    die($e->getMessage());

} catch (ExceptionTemporarilyUnavailable $e) {
    die($e->getMessage());

} catch (ExceptionTooManyRequests $e) {
    die($e->getMessage());

} catch (ExceptionUnauthorized $e) {
    die($e->getMessage());

} catch (GuzzleException $e) {
    die($e->getMessage());

}
```