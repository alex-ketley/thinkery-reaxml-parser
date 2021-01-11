<?php

namespace ThinkReaXMLParser\Objects;

class ImageObject extends MediaMember
{
    public function setOrdering($ordering)
    {
        $this->ordering = $this->getIntFromLetters($ordering);
        return $this;
    }

    public static function getIntFromLetters($id)
    {
        $id = strtoupper($id);
        $val = 0;
        for ($i = 0; $i < strlen($id); $i++) {
            $delta = ord($id[$i]) - 64;
            $val = $val * 26 + $delta;
        }
        // they use m for the main picture, then revert to a-z for others. Why? Who knows.
        if ($val == 13) {
            $val = 1;
        } elseif ($val < 13) {
            $val += 1;
        }
        return $val;
    }
}
