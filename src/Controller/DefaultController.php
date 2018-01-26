<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="homepage")
     */
    public function homepage()
    {
        $manager = $this->getDoctrine()->getManager();
        /** @var ProductRepository $repo */
        $repo = $manager->getRepository(Product::class);

        return $this->render('homepage.html.twig', [
            'thibaud' => 'He\'s awesome anyway 😎',
        ]);
    }
}