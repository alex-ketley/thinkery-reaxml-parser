<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class BusinessListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);

        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setCategory((string) $xml->businessCategory->name);
            $this->setAvailable((string) $xml->currentLeaseEndDate);
            $this->setSaleType($xml->commercialListingType && $xml->commercialListingType->attributes() ? (string) $xml->commercialListingType->attributes()->value : null);
            $this->setIncome((int) $xml->takings);
        }
    }
}
