<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product\Product;
use Sylius\Bundle\ProductBundle\Doctrine\ORM\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends AbstractController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function list(): Response
    {
        $products = $this->productRepository->findAll();

        $data = array_map(static fn(Product $product): array => $product->toArray(), $products);

        return $this->json($data, Response::HTTP_OK);
    }
}
