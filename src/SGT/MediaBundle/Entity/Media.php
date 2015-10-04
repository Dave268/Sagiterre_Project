<?php

namespace SGT\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;

/**
 * media
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SGT\MediaBundle\Entity\MediaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Media
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
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique = true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="url_mini", type="string", length=255, nullable = true)
     */
    private $urlMini;

    /**
     * @var string
     *
     * @ORM\Column(name="url_medium", type="string", length=255, nullable = true)
     */
    private $urlMedium;

    /**
     * @var string
     *
     * @ORM\Column(name="url_maxi", type="string", length=255, nullable = true)
     */
    private $urlMaxi;

    /**
     * @var string
     *
     * @ORM\Column(name="url_slide", type="string", length=255, nullable = true)
     */
    private $urlSlide;

    /**
     * @var string
     *
     * @ORM\Column(name="url_icon", type="string", length=255, nullable = true)
     */
    private $urlIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255, nullable = true)
     */
    private $format;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime")
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="datetime", nullable=true)
     */
    private $dateUpdate;

    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    public function __construct()
    {
        $this->dateAdd = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setDateUpdate(new \DateTime());
    }


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
     * Set alt
     *
     * @param string $alt
     * @return media
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return media
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set urlMini
     *
     * @param string $urlMini
     * @return media
     */
    public function setUrlMini($urlMini)
    {
        $this->urlMini = $urlMini;

        return $this;
    }

    /**
     * Get urlMini
     *
     * @return string 
     */
    public function getUrlMini()
    {
        return $this->urlMini;
    }

    /**
     * Set urlMedium
     *
     * @param string $urlMedium
     * @return media
     */
    public function setUrlMedium($urlMedium)
    {
        $this->urlMedium = $urlMedium;

        return $this;
    }

    /**
     * Get urlMedium
     *
     * @return string 
     */
    public function getUrlMedium()
    {
        return $this->urlMedium;
    }

    /**
     * Set urlMaxi
     *
     * @param string $urlMaxi
     * @return media
     */
    public function setUrlMaxi($urlMaxi)
    {
        $this->urlMaxi = $urlMaxi;

        return $this;
    }

    /**
     * Get urlMaxi
     *
     * @return string 
     */
    public function getUrlMaxi()
    {
        return $this->urlMaxi;
    }

    /**
     * Set urlSlide
     *
     * @param string $urlSlide
     * @return media
     */
    public function setUrlSlide($urlSlide)
    {
        $this->urlSlide = $urlSlide;

        return $this;
    }

    /**
     * Get urlSlide
     *
     * @return string 
     */
    public function getUrlSlide()
    {
        return $this->urlSlide;
    }

    /**
     * Set urlIcon
     *
     * @param string $urlIcon
     * @return media
     */
    public function setUrlIcon($urlIcon)
    {
        $this->urlIcon = $urlIcon;

        return $this;
    }

    /**
     * Get urlIcon
     *
     * @return string 
     */
    public function getUrlIcon()
    {
        return $this->urlIcon;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return media
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return media
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime 
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return media
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return media
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

    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) 
        {
            return;
        }

        $extension = pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);;


        

        if(strtolower($extension) == 'jpg' OR strtolower($extension) == 'jpeg' OR strtolower($extension) == 'png')
        {
            $this->format = 'image';
            $path = $this->getUploadDirImages() . "image" . date('omj');
            if(!file_exists(__DIR__ . "/../../../../web/" . $path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            $this->file->move(__DIR__ . "/../../../../web/" . $path . "/", $this->name . "." . $extension);

            $source = imagecreatefromjpeg(__DIR__ . "/../../../../web/" . $path . "/" . $this->name . "." . $extension);
            $mini  = imagecreatetruecolor(120, imagesy($source)/(imagesx($source)/120));
            $largeur_source = imagesx($source);
            $hauteur_source = imagesy($source);
            $largeur_mini   = imagesx($mini);
            $hauteur_mini   = imagesy($mini);

            imagecopyresampled($mini, $source, 0, 0, 0, 0, $largeur_mini, $hauteur_mini, $largeur_source, $hauteur_source);
            imagejpeg($mini, __DIR__ . "/../../../../web/" . $path . "/" . $this->name . "_mini." . $extension);

            $this->url = $path . "/" . $this->name . "." . $extension;
            $this->urlMini = $path . "/" . $this->name . "_mini." . $extension;
        }
        elseif(strtolower($extension) == 'mov' OR strtolower($extension) == 'mp4' OR strtolower($extension) == 'webm' OR strtolower($extension) == 'ogv')
        {
            $this->format = 'video';
            $path = $this->getUploadDirVideo() . "video" . date('omj');
            if(!file_exists(__DIR__ . "/../../../../web/" . $path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            $this->file->move(__DIR__ . "/../../../../web/" . $path . "/", $this->name . "." . $extension);
            $this->url = $path . "/" . $this->name . "." . $extension;
            $this->urlMini = "bundles/core/images/icons/video_icon.png";
        }
        elseif(strtolower($extension) == 'mp3' OR strtolower($extension) == 'aac' OR strtolower($extension) == 'wav' OR strtolower($extension) == 'aiff')
        {
            $this->format = 'audio';
            $path = $this->getUploadDirAudio() . "audio" . date('omj');
            if(!file_exists(__DIR__ . "/../../../../web/" . $path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            $this->file->move(__DIR__ . "/../../../../web/" . $path . "/", $this->name . "." . $extension);
            $this->url = $path . "/" . $this->name . "." . $extension;
            $this->urlMini = "bundles/core/images/icons/audio_icon.png";
        }
        else
        {
            $this->format = 'other';
            $path = $this->getUploadDirOther() . "other" . date('omj');
            if(!file_exists(__DIR__ . "/../../../../web/" . $path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            $this->file->move(__DIR__ . "/../../../../web/" . $path . "/", $this->name . "." . $extension);
            $this->url = $path . "/" . $this->name . "." . $extension;
        }
    }

    public function getUploadDirImages()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'bundles/uploads/images/';
    }

    public function getUploadDirVideo()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'bundles/uploads/video/';
    }

    public function getUploadDirAudio()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'bundles/uploads/audio/';
    }

    public function getUploadDirOther()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur (relatif au répertoire /web donc)
        return 'bundles/uploads/other/';
    }
}