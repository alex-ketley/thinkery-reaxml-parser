<?php

use ThinkReaXMLParser\Objects\ListingAgent;
use Carbon\Carbon;

class ListingAgentTest extends PHPUnit_Framework_TestCase
{
    protected $stub;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->stub = simplexml_load_file("stubs/agent.xml");
    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function testCreateAgent()
    {
        $agent_id = 'TESTAGENT01';
        $agent = new ListingAgent($this->stub, $agent_id);

        $this->assertInstanceOf(ListingAgent::class, $agent);
        $this->assertSame("Bob Slidell", $agent->getName());
        $this->assertSame("123-456-7890", $agent->getTelephone());
        $this->assertSame("mobile", $agent->getTelephoneType());
        $this->assertSame("twitter.com/fakeurl", $agent->getTwitterURL());
        $this->assertSame("facebook.com/fakeurl", $agent->getFacebookURL());
        $this->assertSame("linkedin.com/fakeurl", $agent->getLinkedInURL());
    }
}
