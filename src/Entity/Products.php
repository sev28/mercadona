<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[UniqueEntity('title')]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Positive]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    private ?string $title = null;
    
    #[ORM\Column(type:'string', length: 255)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'products', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Promotion $promotion = null;

    /**
     * The above code defines a PHP class with various getter and setter methods for properties such as
     * id, description, price, category, title, image, imageFile, and promotion.
     * 
     * @return ?int The `getId()` method returns an optional integer value (`?int`).
     * The `getDescription()` method returns an optional string value (`?string`).
     * The `getPrice()` method returns an optional float value (`?float`).
     * The `getCategory()` method returns an optional `Category` object (`?Category`).
     * The `getTitle()` method returns an optional string value (`?string`).
     * The
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile):void
    {
        $this->imageFile = $imageFile;

       
    }

    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(?Promotion $promotion): static
    {
        $this->promotion = $promotion;

        return $this;
    }
}
