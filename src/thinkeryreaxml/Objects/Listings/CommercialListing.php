<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class CommercialListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);

        if (!in_array($this->getStatus(), $this->inactive)) {
            if (isset($xml->commercialCategory)) {
                $this->setCategory($xml->commercialCategory->attributes() ? (string) $xml->commercialCategory->attributes()->name : null);
            }
        }
    }
}
