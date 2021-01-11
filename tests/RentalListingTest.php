<?php

use ThinkReaXMLParser\Objects\FloorplanObject;
use ThinkReaXMLParser\Objects\ImageObject;
use ThinkReaXMLParser\Objects\Listings\RentalListing;

class RentalListingTest extends PHPUnit_Framework_TestCase
{
    protected $xml;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->xml = simplexml_load_file("stubs/rentallisting.xml");
    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function testRentalListingsParser()
    {
        $parsed = new RentalListing($this->xml);

        $this->assertSame('rental', $parsed->getType());
        $this->assertSame('ABCD1234', $parsed->getUniqueId());
        $this->assertSame('XNWXNW', $parsed->getAgents()[0]->getAgentID());
        $this->assertSame('Mr. John Doe', $parsed->getAgents()[0]->getName());
        $this->assertInstanceOf(RentalListing::class, $parsed);
        $this->assertInstanceOf(ImageObject::class, $parsed->getMedia()->getImages()[0]);
        $this->assertSame('http://www.realestate.com.au/tmp/imageM.jpg', $parsed->getMedia()->getImages()[0]->getUrl());
        $this->assertSame(1, $parsed->getMedia()->getImages()[0]->getOrdering());
        $this->assertTrue($parsed->getIsRental());
        $this->assertCount(2, $parsed->getMedia()->getImages());
        $this->assertInstanceOf(FloorplanObject::class, $parsed->getMedia()->getFloorplans()[0]);
        $this->assertSame('http://www.realestate.com.au/tmp/floorplan1.gif', $parsed->getMedia()->getFloorplans()[0]->getUrl());
        $this->assertCount(2, $parsed->getMedia()->getFloorplans());
        $this->assertSame('current', $parsed->getStatus());
        $this->assertSame('SHOW STOPPER!!!', $parsed->getTitle());
        $this->assertSame('House', $parsed->getCategory());
        $this->assertSame('Yarra', $parsed->getMunicipality());
        $this->assertSame('Yarra', $parsed->getAddress()->getMunicipality());
        $this->assertSame('350', $parsed->getPrice());
        $this->assertFalse($parsed->getDisplayPrice());
        $this->assertInstanceOf(\Carbon\Carbon::class, $parsed->getModified());
    }
}
