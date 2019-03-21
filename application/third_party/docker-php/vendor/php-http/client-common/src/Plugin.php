<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
namespace Http\Client\Common;

use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
/**
 * A plugin is a middleware to transform the request and/or the response.
 *
 * The plugin can:
 *  - break the chain and return a response
 *  - dispatch the request to the next middleware
 *  - restart the request
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
interface Plugin
{
    /**
     * Handle the request and return the response coming from the next callable.
     *
     * @see http://docs.php-http.org/en/latest/plugins/build-your-own.html
     *
     * @param RequestInterface $request
     * @param callable         $next    Next middleware in the chain, the request is passed as the first argument
     * @param callable         $first   First middleware in the chain, used to to restart a request
     *
     * @return Promise Resolves a PSR-7 Response or fails with an Http\Client\Exception (The same as HttpAsyncClient).
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first);
}

?>