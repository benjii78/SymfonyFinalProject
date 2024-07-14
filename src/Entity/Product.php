<?php

namespace App\Entity; // Le namespace indique que cette classe fait partie des entités de l'application

use App\Repository\ProductRepository; // Importation du repository 
use Doctrine\ORM\Mapping as ORM; // Importation des annotations ORM de Doctrine

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    // Déclaration de la propriété $id comme clé primaire
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Déclaration de la propriété $name avec une longueur maximale de 255 caractères
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    // Déclaration de la propriété $price
    #[ORM\Column]
    private ?int $price = null;

    // On obtient la valeur de l'id
    public function getId(): ?int
    {
        return $this->id;
    }

    // On obtient le nom du produit
    public function getName(): ?string
    {
        return $this->name;
    }

    // On definit le nom du produit
    public function setName(string $name): static
    {
        $this->name = $name; 

        return $this; 
    }

    // Méthode pour obtenir le prix du produit
    public function getPrice(): ?int
    {
        return $this->price;
    }

    // On definit le prix du produit
    public function setPrice(int $price): static
    {
        $this->price = $price; 

        return $this; 
    }
}
