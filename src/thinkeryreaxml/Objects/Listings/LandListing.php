<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class LandListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);

        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setCategory($xml->landCategory && $xml->landCategory->attributes() ? (string) $xml->landCategory->attributes()->name : null);
        }
    }
}
