<?php

namespace Qa\UserBundle\Entity;

/**
 * @orm:Entity
 * @orm:Table(name="openid")
 */
class Openid
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
     * @orm:Column(type="string", length="255")
     *
     * @var string $title
     */
    protected $title;
 
    /**
     * @orm:Column(type="string", length="255")
     *
     * @var string $url
     */
    protected $url;

    /**
     * @orm:Column(type="boolean", name="is_primary")
     *
     * @var string $isPrimary
     */
    protected $isPrimary;

    /**
     * @orm:Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    protected $createdAt;

	/**
	 * @orm:ManyToOne(targetEntity="User", inversedBy="openids")
	 * @orm:JoinColumn(name="user_id", referencedColumnName="id")
	 *
	 * @var User $user
	 */
	protected $user;
 
    //...
    
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isPrimary
     *
     * @param boolean $isPrimary
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;
    }

    /**
     * Get isPrimary
     *
     * @return boolean $isPrimary
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
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
     * Set user
     *
     * @param Qa\UserBundle\Entity\User $user
     */
    public function setUser(\Qa\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Qa\UserBundle\Entity\User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Constructs a new instance of Openid.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
}