<?php

namespace Qa\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @orm:Entity
 * @orm:Table(name="user")
 */
class User
{
    /**
     * @orm:Id
     * @orm:Column(type="integer")
     * @orm:GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;
 
    /**
     * @orm:Column(type="string", length="255", name="name")
     *
     * @var string $name
     */
    protected $name;
 
    /**
     * @orm:Column(type="string", length="255")
     *
     * @var string $email
     */
    protected $email;

    /**
     * @orm:Column(type="string", length="255")
     *
     * @var string $avatar
     */
    protected $avatar;
 
    /**
     * @orm:Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    protected $createdAt;
 
    /**
     * @orm:OneToMany(targetEntity="Qa\QuestionBundle\Entity\Question", mappedBy="user")
     * @orm:OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $questions
     */
    protected $questions;

    /**
     * @orm:OneToMany(targetEntity="Openid", mappedBy="user")
     *
     * @var ArrayCollection $openids
     */
    protected $openids;
 
    //..

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * Get avatar
     *
     * @return string $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add openids
     *
     * @param Qa\UserBundle\Entity\Openid $openids
     */
    public function addOpenids(\Qa\UserBundle\Entity\Openid $openids)
    {
        $this->openids[] = $openids;
    }

    /**
     * Get openids
     *
     * @return Doctrine\Common\Collections\Collection $openids
     */
    public function getOpenids()
    {
        return $this->openids;
    }

    /**
     * Constructs a new instance of User
     */
    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->openids = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

}