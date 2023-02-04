<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert ;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File ;
use Symfony\Component\HttpFoundation\File\UploadedFile ;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 * @UniqueEntity("Nom_Event")
 * @Vich\Uploadable()
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255)
     */
    private $Nom_Event;

    /**
     * @ORM\Column(type="string", length=255)
      * @Assert\Length(min=5, max=255)
     */
    private $Lieux_Event;

    /**
     * @ORM\Column(type="string", length=255)
      * @Assert\Length(min=5, max=255)
     */
    private $Categorie_Event;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=100)
     */
    private $Prix_Event;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(min=10, max=300)
     */
    private $nbr_addr;

    /**
    * @var string|null
    * @ORM\Column(type="string" , length=255)
    **/

    private $filename ;

    /**
     * @var File|null
     * @Vich\UploadableField(mapping="event_image" , fileNameProperty="filename")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvent(): ?string
    {
        return $this->Nom_Event;
    }

    public function setNomEvent(string $Nom_Event): self
    {
        $this->Nom_Event = $Nom_Event;

        return $this;
    }
    public function getSlug() : ?string{
    return  (new Slugify())->slugify($this->Nom_Event);



    }

    public function getLieuxEvent(): ?string
    {
        return $this->Lieux_Event;
    }

    public function setLieuxEvent(string $Lieux_Event): self
    {
        $this->Lieux_Event = $Lieux_Event;

        return $this;
    }

    public function getCategorieEvent(): ?string
    {
        return $this->Categorie_Event;
    }

    public function setCategorieEvent(string $Categorie_Event): self
    {
        $this->Categorie_Event = $Categorie_Event;

        return $this;
    }

    public function getPrixEvent(): ?int
    {
        return $this->Prix_Event;
    }

    public function setPrixEvent(int $Prix_Event): self
    {
        $this->Prix_Event = $Prix_Event;

        return $this;
    }

    public function getNbrAddr(): ?int
    {
        return $this->nbr_addr;
    }

    public function setNbrAddr(int $nbr_addr): self
    {
        $this->nbr_addr = $nbr_addr;

        return $this;
    }
    /**
    * @return null|string
    **/

    public function getFilename(): ?string
    {
        return $this->filename;
    }
    /**
    * @param null|string $filename
    * @return Event
    **/

    public function setFilename(?string $filename): Event
    {
        $this->filename = $filename;
        return $this;
    }

    /**
    * @return null|File
    **/
    public function getImageFile(): ?File {
    return $this->imageFile;
    }

    /**
    * @param null|File $imageFile
    * @return Event
    **/

    public function setImageFile(?File $imageFile) : Event {
    $this->imageFile = $imageFile ;
            if ($this->imageFile instanceof UploadedFile) {
                $this->updated_at = new \DateTime('now');
            }
    return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}
