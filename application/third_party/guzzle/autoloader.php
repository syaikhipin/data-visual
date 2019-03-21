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
$mapping = array('GuzzleHttp\\Client' => __DIR__ . '/GuzzleHttp/Client.php', 'GuzzleHttp\\ClientInterface' => __DIR__ . '/GuzzleHttp/ClientInterface.php', 'GuzzleHttp\\Cookie\\CookieJar' => __DIR__ . '/GuzzleHttp/Cookie/CookieJar.php', 'GuzzleHttp\\Cookie\\CookieJarInterface' => __DIR__ . '/GuzzleHttp/Cookie/CookieJarInterface.php', 'GuzzleHttp\\Cookie\\FileCookieJar' => __DIR__ . '/GuzzleHttp/Cookie/FileCookieJar.php', 'GuzzleHttp\\Cookie\\SessionCookieJar' => __DIR__ . '/GuzzleHttp/Cookie/SessionCookieJar.php', 'GuzzleHttp\\Cookie\\SetCookie' => __DIR__ . '/GuzzleHttp/Cookie/SetCookie.php', 'GuzzleHttp\\Exception\\BadResponseException' => __DIR__ . '/GuzzleHttp/Exception/BadResponseException.php', 'GuzzleHttp\\Exception\\ClientException' => __DIR__ . '/GuzzleHttp/Exception/ClientException.php', 'GuzzleHttp\\Exception\\ConnectException' => __DIR__ . '/GuzzleHttp/Exception/ConnectException.php', 'GuzzleHttp\\Exception\\GuzzleException' => __DIR__ . '/GuzzleHttp/Exception/GuzzleException.php', 'GuzzleHttp\\Exception\\RequestException' => __DIR__ . '/GuzzleHttp/Exception/RequestException.php', 'GuzzleHttp\\Exception\\SeekException' => __DIR__ . '/GuzzleHttp/Exception/SeekException.php', 'GuzzleHttp\\Exception\\ServerException' => __DIR__ . '/GuzzleHttp/Exception/ServerException.php', 'GuzzleHttp\\Exception\\TooManyRedirectsException' => __DIR__ . '/GuzzleHttp/Exception/TooManyRedirectsException.php', 'GuzzleHttp\\Exception\\TransferException' => __DIR__ . '/GuzzleHttp/Exception/TransferException.php', 'GuzzleHttp\\Handler\\CurlFactory' => __DIR__ . '/GuzzleHttp/Handler/CurlFactory.php', 'GuzzleHttp\\Handler\\CurlFactoryInterface' => __DIR__ . '/GuzzleHttp/Handler/CurlFactoryInterface.php', 'GuzzleHttp\\Handler\\CurlHandler' => __DIR__ . '/GuzzleHttp/Handler/CurlHandler.php', 'GuzzleHttp\\Handler\\CurlMultiHandler' => __DIR__ . '/GuzzleHttp/Handler/CurlMultiHandler.php', 'GuzzleHttp\\Handler\\EasyHandle' => __DIR__ . '/GuzzleHttp/Handler/EasyHandle.php', 'GuzzleHttp\\Handler\\MockHandler' => __DIR__ . '/GuzzleHttp/Handler/MockHandler.php', 'GuzzleHttp\\Handler\\Proxy' => __DIR__ . '/GuzzleHttp/Handler/Proxy.php', 'GuzzleHttp\\Handler\\StreamHandler' => __DIR__ . '/GuzzleHttp/Handler/StreamHandler.php', 'GuzzleHttp\\HandlerStack' => __DIR__ . '/GuzzleHttp/HandlerStack.php', 'GuzzleHttp\\MessageFormatter' => __DIR__ . '/GuzzleHttp/MessageFormatter.php', 'GuzzleHttp\\Middleware' => __DIR__ . '/GuzzleHttp/Middleware.php', 'GuzzleHttp\\Pool' => __DIR__ . '/GuzzleHttp/Pool.php', 'GuzzleHttp\\PrepareBodyMiddleware' => __DIR__ . '/GuzzleHttp/PrepareBodyMiddleware.php', 'GuzzleHttp\\RedirectMiddleware' => __DIR__ . '/GuzzleHttp/RedirectMiddleware.php', 'GuzzleHttp\\RequestOptions' => __DIR__ . '/GuzzleHttp/RequestOptions.php', 'GuzzleHttp\\RetryMiddleware' => __DIR__ . '/GuzzleHttp/RetryMiddleware.php', 'GuzzleHttp\\TransferStats' => __DIR__ . '/GuzzleHttp/TransferStats.php', 'GuzzleHttp\\UriTemplate' => __DIR__ . '/GuzzleHttp/UriTemplate.php', 'GuzzleHttp\\functions' => __DIR__ . '/GuzzleHttp/functions.php', 'GuzzleHttp\\functions_include' => __DIR__ . '/GuzzleHttp/functions_include.php', 'GuzzleHttp\\Promise\\AggregateException' => __DIR__ . '/GuzzleHttp/Promise/AggregateException.php', 'GuzzleHttp\\Promise\\CancellationException' => __DIR__ . '/GuzzleHttp/Promise/CancellationException.php', 'GuzzleHttp\\Promise\\Coroutine' => __DIR__ . '/GuzzleHttp/Promise/Coroutine.php', 'GuzzleHttp\\Promise\\EachPromise' => __DIR__ . '/GuzzleHttp/Promise/EachPromise.php', 'GuzzleHttp\\Promise\\FulfilledPromise' => __DIR__ . '/GuzzleHttp/Promise/FulfilledPromise.php', 'GuzzleHttp\\Promise\\Promise' => __DIR__ . '/GuzzleHttp/Promise/Promise.php', 'GuzzleHttp\\Promise\\PromiseInterface' => __DIR__ . '/GuzzleHttp/Promise/PromiseInterface.php', 'GuzzleHttp\\Promise\\PromisorInterface' => __DIR__ . '/GuzzleHttp/Promise/PromisorInterface.php', 'GuzzleHttp\\Promise\\RejectedPromise' => __DIR__ . '/GuzzleHttp/Promise/RejectedPromise.php', 'GuzzleHttp\\Promise\\RejectionException' => __DIR__ . '/GuzzleHttp/Promise/RejectionException.php', 'GuzzleHttp\\Promise\\TaskQueue' => __DIR__ . '/GuzzleHttp/Promise/TaskQueue.php', 'GuzzleHttp\\Promise\\TaskQueueInterface' => __DIR__ . '/GuzzleHttp/Promise/TaskQueueInterface.php', 'GuzzleHttp\\Promise\\functions' => __DIR__ . '/GuzzleHttp/Promise/functions.php', 'GuzzleHttp\\Promise\\functions_include' => __DIR__ . '/GuzzleHttp/Promise/functions_include.php', 'GuzzleHttp\\Psr7\\AppendStream' => __DIR__ . '/GuzzleHttp/Psr7/AppendStream.php', 'GuzzleHttp\\Psr7\\BufferStream' => __DIR__ . '/GuzzleHttp/Psr7/BufferStream.php', 'GuzzleHttp\\Psr7\\CachingStream' => __DIR__ . '/GuzzleHttp/Psr7/CachingStream.php', 'GuzzleHttp\\Psr7\\DroppingStream' => __DIR__ . '/GuzzleHttp/Psr7/DroppingStream.php', 'GuzzleHttp\\Psr7\\FnStream' => __DIR__ . '/GuzzleHttp/Psr7/FnStream.php', 'GuzzleHttp\\Psr7\\InflateStream' => __DIR__ . '/GuzzleHttp/Psr7/InflateStream.php', 'GuzzleHttp\\Psr7\\LazyOpenStream' => __DIR__ . '/GuzzleHttp/Psr7/LazyOpenStream.php', 'GuzzleHttp\\Psr7\\LimitStream' => __DIR__ . '/GuzzleHttp/Psr7/LimitStream.php', 'GuzzleHttp\\Psr7\\MessageTrait' => __DIR__ . '/GuzzleHttp/Psr7/MessageTrait.php', 'GuzzleHttp\\Psr7\\MultipartStream' => __DIR__ . '/GuzzleHttp/Psr7/MultipartStream.php', 'GuzzleHttp\\Psr7\\NoSeekStream' => __DIR__ . '/GuzzleHttp/Psr7/NoSeekStream.php', 'GuzzleHttp\\Psr7\\PumpStream' => __DIR__ . '/GuzzleHttp/Psr7/PumpStream.php', 'GuzzleHttp\\Psr7\\Request' => __DIR__ . '/GuzzleHttp/Psr7/Request.php', 'GuzzleHttp\\Psr7\\Response' => __DIR__ . '/GuzzleHttp/Psr7/Response.php', 'GuzzleHttp\\Psr7\\ServerRequest' => __DIR__ . '/GuzzleHttp/Psr7/ServerRequest.php', 'GuzzleHttp\\Psr7\\Stream' => __DIR__ . '/GuzzleHttp/Psr7/Stream.php', 'GuzzleHttp\\Psr7\\StreamDecoratorTrait' => __DIR__ . '/GuzzleHttp/Psr7/StreamDecoratorTrait.php', 'GuzzleHttp\\Psr7\\StreamWrapper' => __DIR__ . '/GuzzleHttp/Psr7/StreamWrapper.php', 'GuzzleHttp\\Psr7\\UploadedFile' => __DIR__ . '/GuzzleHttp/Psr7/UploadedFile.php', 'GuzzleHttp\\Psr7\\Uri' => __DIR__ . '/GuzzleHttp/Psr7/Uri.php', 'GuzzleHttp\\Psr7\\UriNormalizer' => __DIR__ . '/GuzzleHttp/Psr7/UriNormalizer.php', 'GuzzleHttp\\Psr7\\UriResolver' => __DIR__ . '/GuzzleHttp/Psr7/UriResolver.php', 'GuzzleHttp\\Psr7\\functions' => __DIR__ . '/GuzzleHttp/Psr7/functions.php', 'GuzzleHttp\\Psr7\\functions_include' => __DIR__ . '/GuzzleHttp/Psr7/functions_include.php', 'Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/Psr/Http/Message/MessageInterface.php', 'Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/Psr/Http/Message/RequestInterface.php', 'Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/Psr/Http/Message/ResponseInterface.php', 'Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/Psr/Http/Message/ServerRequestInterface.php', 'Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/Psr/Http/Message/StreamInterface.php', 'Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/Psr/Http/Message/UploadedFileInterface.php', 'Psr\\Http\\Message\\UriInterface' => __DIR__ . '/Psr/Http/Message/UriInterface.php');
spl_autoload_register(function ($class) use($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);
require __DIR__ . '/GuzzleHttp/functions.php';
require __DIR__ . '/GuzzleHttp/Psr7/functions.php';
require __DIR__ . '/GuzzleHttp/Promise/functions.php';

?>