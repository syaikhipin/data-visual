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
namespace Monolog\Processor;

use Monolog\TestCase;
class ProcessIdProcessorTest extends TestCase
{
    /**
     * @covers Monolog\Processor\ProcessIdProcessor::__invoke
     */
    public function testProcessor()
    {
        $processor = new ProcessIdProcessor();
        $record = $processor($this->getRecord());
        $this->assertArrayHasKey('process_id', $record['extra']);
        $this->assertInternalType('int', $record['extra']['process_id']);
        $this->assertGreaterThan(0, $record['extra']['process_id']);
        $this->assertEquals(getmypid(), $record['extra']['process_id']);
    }
}

?>