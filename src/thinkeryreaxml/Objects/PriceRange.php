<?php

namespace ThinkReaXMLParser\Objects;

class PriceRange
{
    protected $min;
    protected $max;

    public function __construct($min, $max)
    {
        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * @return mixed
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param mixed $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return mixed
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param mixed $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }
}
