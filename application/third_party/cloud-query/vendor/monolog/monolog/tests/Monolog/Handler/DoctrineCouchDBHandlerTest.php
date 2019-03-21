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
/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Monolog\Handler;

use Monolog\TestCase;
use Monolog\Logger;
class DoctrineCouchDBHandlerTest extends TestCase
{
    protected function setup()
    {
        if (!class_exists('Doctrine\\CouchDB\\CouchDBClient')) {
            $this->markTestSkipped('The "doctrine/couchdb" package is not installed');
        }
    }
    public function testHandle()
    {
        $client = $this->getMockBuilder('Doctrine\\CouchDB\\CouchDBClient')->setMethods(array('postDocument'))->disableOriginalConstructor()->getMock();
        $record = $this->getRecord(Logger::WARNING, 'test', array('data' => new \stdClass(), 'foo' => 34));
        $expected = array('message' => 'test', 'context' => array('data' => '[object] (stdClass: {})', 'foo' => 34), 'level' => Logger::WARNING, 'level_name' => 'WARNING', 'channel' => 'test', 'datetime' => $record['datetime']->format('Y-m-d H:i:s'), 'extra' => array());
        $client->expects($this->once())->method('postDocument')->with($expected);
        $handler = new DoctrineCouchDBHandler($client);
        $handler->handle($record);
    }
}

?>