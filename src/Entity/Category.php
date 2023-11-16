<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    private ?string $Wording = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Products::class)]
    private Collection $products;

    

    /**
     * The above code defines a PHP class with methods for managing categories and their associated
     * products.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }
   /**
    * The __toString() function returns the wording of an object as a string.
    * 
    * @return The __toString() function is returning the value of the getWording() function.
    */
    public function __toString()
    {
        return $this->getWording();
    }

  /**
   * The function `getId()` returns the value of the `id` property, which is an integer or null.
   * 
   * @return ?int The method is returning an integer value, or null if the value is not set.
   */
    public function getId(): ?int
    {
        return $this->id;
    }

   /**
    * The above code defines a PHP class with a getter and setter method for a property called
    * "Wording".
    * 
    * @return ?string The `getWording()` function is returning a nullable string.
    */
    public function getWording(): ?string
    {
        return $this->Wording;
    }

    public function setWording(string $Wording): static
    {
        $this->Wording = $Wording;

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

  /**
   * The addProduct function adds a product to the category if it is not already contained in the
   * category's products collection.
   * 
   * @param Products product The parameter `` is of type `Products`. It represents the product
   * that needs to be added to the category.
   * 
   * @return static The method is returning an instance of the class on which the method is called.
   */
    public function addProduct(Products $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setCategory($this);
        }

        return $this;
    }

   /**
    * The function removes a product from a category and updates the product's category if necessary.
    * 
    * @param Products product The parameter `` is an instance of the `Products` class.
    * 
    * @return static The method is returning an instance of the class it belongs to, which is indicated
    * by the `static` return type.
    */
    public function removeProduct(Products $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

    
}
