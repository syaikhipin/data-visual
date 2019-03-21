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
/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GraphAware\Common;

use GraphAware\Common\Connection\BaseConfiguration;
use GraphAware\Common\Driver\ConfigInterface;
use GraphAware\Common\Driver\DriverInterface;
interface GraphDatabaseInterface
{
    /**
     * @param string             $uri
     * @param BaseConfiguration|null $config
     *
     * @return DriverInterface
     */
    public static function driver($uri, ConfigInterface $config = null);
}

?>