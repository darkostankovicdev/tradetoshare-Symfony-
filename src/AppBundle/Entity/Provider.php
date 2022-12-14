<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="string", columnDefinition="enum('facebook', 'google', 'twitter', 'vkontakte', 'instagram', 'pinterest', 'flickr', 'imgur', 'tumblr', 'foursquare', 'yahoo', 'odnoklassniki', 'wordpress', 'reddit', 'youtube')") */
    protected $name;

    /** @ORM\Column(type="string", length=255) */
    protected $provider_id;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    protected $access_token;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="providers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $user;

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
     * Set name
     *
     * @param string $name
     *
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

     /**
     * Set accessToken
     *
     * @param string $accessToken
     *
     * @return Provider
     */
    public function setAccessToken($accessToken)
    {
        $this->access_token = $accessToken;

        return $this;
    }

    /**
     * Get accessToken
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Provider
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set providerId
     *
     * @param string $providerId
     *
     * @return Provider
     */
    public function setProviderId($providerId)
    {
        $this->provider_id = $providerId;

        return $this;
    }

    /**
     * Get providerId
     *
     * @return string
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }
}
