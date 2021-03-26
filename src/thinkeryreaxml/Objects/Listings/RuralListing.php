<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class RuralListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);

        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setCategory($xml->ruralCategory->attributes()->name);
        }
    }
}
