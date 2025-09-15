<?php

namespace ThinkReaXMLParser\Objects\Listings;

use SimpleXMLElement;

class HolidayRentalListing extends Listing
{
    public function __construct(SimpleXMLElement $xml)
    {
        parent::__construct($xml);
        $this->setIsRental(true);
        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setCategory($xml->holidayCategory && $xml->holidayCategory->attributes() ? (string) $xml->holidayCategory->attributes()->name : null);
        }
    }
}
