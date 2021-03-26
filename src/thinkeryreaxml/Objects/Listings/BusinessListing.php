<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class BusinessListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);

        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setCategory($xml->businessCategory->name);
            $this->setAvailable($xml->currentLeaseEndDate);
            $this->setSaleType($xml->commercialListingType->attributes()->value);
            $this->setIncome((int) $xml->takings);
        }
    }
}
