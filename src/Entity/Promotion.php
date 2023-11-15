<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $pourcent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $begin_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\OneToMany(mappedBy: 'promotion', targetEntity: Products::class)]
    private Collection $products;

   /**
    * The code defines a PHP class for a Promotion, which has properties such as id, pourcent,
    * begin_date, end_date, and products, and methods to get and set these properties.
    */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    
    /**
     * The __toString() function returns the value of the getPourcent() method as a string.
     * 
     * @return The __toString() function is returning the value of the getPourcent() method.
     */
    public function __toString()
    {
        return $this->getPourcent();
    }
   /**
    * The function `getId()` returns the value of the `id` property, which is an integer or null.
    * 
    * @return ?int an integer value, or null if the value is not set.
    */
    public function getId(): ?int
    {
        return $this->id;
    }

   /**
    * The above code defines a getter and setter method for a property called "pourcent" in a PHP
    * class.
    * 
    * @return ?int The `getPourcent()` function is returning an integer value or null.
    */
    public function getPourcent(): ?int
    {
        return $this->pourcent;
    }

    public function setPourcent(string $pourcent): static
    {
        $this->pourcent = $pourcent;

        return $this;
    }

    /**
     * The function `getBeginDate()` returns the begin date of an object, while `setBeginDate()` sets
     * the begin date of an object.
     * 
     * @return ?\DateTimeInterface The method `getBeginDate()` is returning an instance of
     * `\DateTimeInterface` or `null`.
     */
    public function getBeginDate(): ?\DateTimeInterface
    {
        return $this->begin_date;
    }

    public function setBeginDate(\DateTimeInterface $begin_date): static
    {
        $this->begin_date = $begin_date;

        return $this;
    }

    /**
     * The above code defines a getter and setter method for the "end_date" property of a class in PHP.
     * 
     * @return ?\DateTimeInterface The getEndDate() function is returning an instance of
     * \DateTimeInterface or null.
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setPromotion($this);
        }

        return $this;
    }
/**
 * The removeProduct function removes a product from a promotion and updates the product's promotion
 * reference if necessary.
 * 
 * @param Products product The parameter `` is an instance of the `Products` class.
 * 
 * @return static The method is returning an instance of the class it belongs to, which is indicated by
 * the `static` return type declaration.
 */

    public function removeProduct(Products $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getPromotion() === $this) {
                $product->setPromotion(null);
            }
        }

        return $this;
    }
}
