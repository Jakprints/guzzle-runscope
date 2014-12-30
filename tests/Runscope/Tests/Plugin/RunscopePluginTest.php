<?php

namespace Runscope\Tests\Plugin;

use GuzzleHttp\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Event\BeforeEvent;
use Guzzle\Tests\GuzzleTestCase;
use Runscope\Plugin\RunscopePlugin;

/**
 * @covers Runscope\Plugin\RunscopePlugin
 */
class RunscopePluginTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function testOnBeforeSend()
    {
        $plugin = new RunscopePlugin('bucketKeyHere');
        $this->assertNotEmpty($plugin->getEvents());
        $event = new BeforeEvent(new Transaction(new Client(), new Request('GET', 'https://api.github.com')));
        $plugin->onBeforeSend($event);
    }
}
