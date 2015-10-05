<?php

namespace SGT\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsMedia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class NewsMedia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
   * @ORM\ManyToOne(targetEntity="SGT\NewsBundle\Entity\News", inversedBy="newsMedia")
   * @ORM\JoinColumn(nullable=false)
   */
    private $news;

    /**
   * @ORM\ManyToOne(targetEntity="SGT\MediaBundle\Entity\Media", inversedBy="newsMedia")
   * @ORM\JoinColumn(nullable=false)
   */
    private $media;


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
     * Set type
     *
     * @param string $type
     * @return NewsMedia
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set news
     *
     * @param \SGT\NewsBundle\Entity\News $news
     * @return NewsMedia
     */
    public function setNews(\SGT\NewsBundle\Entity\News $news)
    {
        $this->news = $news;

        $news->setNewsMedia($this);

        return $this;
    }

    /**
     * Get news
     *
     * @return \SGT\NewsBundle\Entity\News 
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set media
     *
     * @param \SGT\MediaBundle\Entity\Media $media
     * @return NewsMedia
     */
    public function setMedia(\SGT\MediaBundle\Entity\Media $media)
    {
        $this->media = $media;
        $media->setNewsMedia($this);

        return $this;
    }

    /**
     * Get media
     *
     * @return \SGT\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
}
