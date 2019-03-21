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
namespace Http\Client\Common\HttpClientPool;

use Http\Client\Common\Exception\HttpClientNotFoundException;
use Http\Client\Common\HttpClientPool;
/**
 * RoundRobinClientPool will choose the next client in the pool.
 *
 * @author Joel Wurtz <joel.wurtz@gmail.com>
 */
final class RoundRobinClientPool extends HttpClientPool
{
    /**
     * {@inheritdoc}
     */
    protected function chooseHttpClient()
    {
        $last = current($this->clientPool);
        do {
            $client = next($this->clientPool);
            if (false === $client) {
                $client = reset($this->clientPool);
                if (false === $client) {
                    throw new HttpClientNotFoundException('Cannot choose a http client as there is no one present in the pool');
                }
            }
            // Case when there is only one and the last one has been disabled
            if ($last === $client && $client->isDisabled()) {
                throw new HttpClientNotFoundException('Cannot choose a http client as there is no one enabled in the pool');
            }
        } while ($client->isDisabled());
        return $client;
    }
}

?>