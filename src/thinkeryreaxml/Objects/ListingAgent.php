<?php

namespace ThinkReaXMLParser\Objects;

use JsonSerializable;

class ListingAgent implements JsonSerializable
{
    protected $order = 1;
    protected $agentID;
    protected $name;
    protected $telephone;
    protected $email;
    protected $twitterURL;
    protected $facebookURL;
    protected $linkedInURL;

    public function __construct(\SimpleXMLElement $agent, $agent_id = false)
    {
        $this->order = (int) $agent->attributes()->id ?: 1;
        $this->setName((string) $agent->name);
        foreach ($agent->telephone as $telephone) {
            $this->addTelephone($telephone);
        }
        $this->setEmail((string) $agent->email);
        $this->setTwitterURL((string) $agent->twitterURL);
        $this->setFacebookURL((string) $agent->facebookURL);
        $this->setLinkedInURL((string) $agent->linkedInURL);

        if ($agent->agentid) {
            $this->setAgentID((string) $agent->agentid);
        } elseif ($agent_id) {
            $this->setAgentID($agent_id);
        }
    }

    public function jsonSerialize()
    {
        return [
            'order' => $this->getOrder(),
            'agentId' => $this->getAgentId(),
            'name' => $this->getName(),
            'telephone' => $this->getTelephone(),
            'email' => $this->getEmail(),
            'twitterURL' => $this->getTwitterURL(),
            'facebookURL' => $this->getFacebookURL(),
            'linkedInURL' => $this->getLinkedInURL()
        ];
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getAgentID()
    {
        return $this->agentID;
    }

    /**
     * @param mixed $agentID
     */
    public function setAgentID($agentID)
    {
        $this->agentID = $agentID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return (object) $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function addTelephone($telephone)
    {
        if (!empty((string) $telephone) && empty($this->telephone[(string) $telephone->attributes()->type])) {
            $this->telephone[(string) $telephone->attributes()->type] = (string) $telephone;
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTwitterURL()
    {
        return $this->twitterURL;
    }

    /**
     * @param mixed $twitterURL
     */
    public function setTwitterURL($twitterURL)
    {
        $this->twitterURL = $twitterURL;
    }

    /**
     * @return mixed
     */
    public function getFacebookURL()
    {
        return $this->facebookURL;
    }

    /**
     * @param mixed $facebookURL
     */
    public function setFacebookURL($facebookURL)
    {
        $this->facebookURL = $facebookURL;
    }

    /**
     * @return mixed
     */
    public function getLinkedInURL()
    {
        return $this->linkedInURL;
    }

    /**
     * @param mixed $linkedInURL
     */
    public function setLinkedInURL($linkedInURL)
    {
        $this->linkedInURL = $linkedInURL;
    }
}
