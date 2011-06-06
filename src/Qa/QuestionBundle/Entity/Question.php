<?php

namespace Qa\QuestionBundle\Entity;

use Doctrine\ORM\Mapping as orm;
use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * @orm\Entity(repositoryClass="Qa\QuestionBundle\Repository\QuestionRepository")
 * @orm\Table(name="question")
 * @orm\HasLifecycleCallbacks
 */
class Question
{
    /**
     * @orm\Id
     * @orm\Column(type="integer")
     * @orm\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;
 
    /**
     * @orm\Column(type="string", length="255")
     *
     * @var string $title
     */
    protected $title;
 
    /**
     * @orm\Column(type="string", length="255")
     *
     * @var string $slug
     */
    protected $slug;
 
    /**
     * @orm\Column(type="text")
     *
     * @var string $content
     */
    protected $content;

    /**
     * @orm\Column(type="integer", nullable="true")
     *
     * @var integer $views
     */
    protected $views;
 
    /**
     * @orm\Column(type="datetime", name="created_at")
     *
     * @var DateTime $createdAt
     */
    protected $createdAt;
 
    /**
     * @orm\Column(type="datetime", name="updated_at", nullable="true")
     *
     * @var DateTime $updatedAt
     */
    protected $updatedAt;
 
    /**
     * @orm\ManyToOne(targetEntity="Qa\UserBundle\Entity\User", inversedBy="questions")
     * @orm\JoinColumn(name="user_id", referencedColumnName="id")
     *
     * @var User $user
     */
    protected $user;
 
    /**
     * @orm\ManyToMany(targetEntity="Tag")
     * @orm\JoinTable(name="question_has_tag",
     *     joinColumns={@orm\JoinColumn(name="question_id", referencedColumnName="id")},
     *     inverseJoinColumns={@orm\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $tags
     */
    protected $tags;
 
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set views
     *
     * @param integer $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * Get views
     *
     * @return integer $views
     */
    public function getViews()
    {
        return $this->views;
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
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Add tags
     *
     * @param Qa\QuestionBundle\Entity\Tag $tags
     */
    public function addTags(\Qa\QuestionBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Constructs a new instance of Post.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->tags = new ArrayCollection();
    }
 
    /**
     * Invoked before the entity is updated.
     *
     * @orm\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get question object
     *
     * @return string $title
     */
    public function __toString()
    {
	    return $this->getTitle();
    }
}