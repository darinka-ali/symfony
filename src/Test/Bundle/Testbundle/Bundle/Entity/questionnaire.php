<?php

namespace Test\Bundle\Testbundle\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * questionnaire
 */
class questionnaire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var boolean
     */
    private $sex;

    /**
     * @var boolean
     */
    private $lookingfor;

    /**
     * @var string
     */
    private $body;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return questionnaire
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return questionnaire
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set sex
     *
     * @param boolean $sex
     * @return questionnaire
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set lookingfor
     *
     * @param boolean $lookingfor
     * @return questionnaire
     */
    public function setLookingfor($lookingfor)
    {
        $this->lookingfor = $lookingfor;

        return $this;
    }

    /**
     * Get lookingfor
     *
     * @return boolean 
     */
    public function getLookingfor()
    {
        return $this->lookingfor;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return questionnaire
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }
}
