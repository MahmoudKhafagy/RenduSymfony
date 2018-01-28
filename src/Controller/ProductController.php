<?php

namespace App\Controller;


use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product")
     * @param RegistryInterface $doctrine
     * @return Response
     */
    public function index(RegistryInterface $doctrine)
    {
        $products = $doctrine->getRepository(Product::class)->findAll();
        return $this->render('homepage.html.twig', compact('products'));
    }
    public function showProduct(){

    }
}