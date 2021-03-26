<?php

namespace ThinkReaXMLParser\Objects\Listings;

class RentalListing extends Listing
{
    protected $bond;

    public function __construct(\SimpleXMLElement $xml)
    {
        parent::__construct($xml);
        $this->setIsRental(true);

        if (!in_array($this->getStatus(), $this->inactive)) {
            $this->setPrice($xml->rent);
            if (count($xml->category)) {
                $this->setCategory($xml->category->attributes()->name);
            }
            if (count($xml->rent)) {
                $this->setPaymentFreq($xml->rent->attributes()->period);
                $this->setDisplayPrice($xml->rent->attributes()->display);
            }
            if ($xml->bond) {
                $this->setBond($xml->bond);
            }
            $this->setAvailable($xml->dateAvailable);
        }
    }

    /**
     * @param string $bond
     **/
    public function setBond($bond)
    {
        $this->bond = $bond;
    }

    /**
     * @return string
     **/
    public function getBond()
    {
        return $this->bond;
    }
}
