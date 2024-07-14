<?php
namespace App\Controller;
// Importation des classes nécessaires
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController // Déclaration de la classe contrôleur
{
    #[Route('/product', name: 'app_product')]// Route pour la méthode createProduct avec la méthode POST
    public function getProducts(ProductRepository $productRepository): JsonResponse
    {
        $products = $productRepository->findAll();
        return $this->json($products);
    }

    #[Route('/product', name: 'app_product', methods: 'POST')]
    public function createProduct(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true); // Décodage du contenu JSON de la requête en tableau associatif
        $product = new Product();
        $product->setName($data['name']);// Definition du nom du produit
        $product->setPrice($data['price']);// Définition du prix du produit avec les données de la requête
        $em->persist($product);// nouvel objet Product en base de données
        $em->flush(); // Exécution de la requête en base de données

        return $this->json($product); // Retourne le nouveau produit créé en format JSON
    }
}

//Dans postman il faut choisir la requete POST est rentré ceci http://127.0.0.1:8000/product on trouvera l'affichage du nom du produit et son prix