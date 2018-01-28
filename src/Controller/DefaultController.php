<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="homepage")
     * @Route(path="/", name="product")
     * @param RegistryInterface $doctrine
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hompage(RegistryInterface $doctrine)
    {
        $products = $doctrine->getRepository(Product::class)->findAll();
        return $this->render('products/index.html.twig', compact('products'));

        $manager = $this->getDoctrine()->getManager();
        /** @var ProductRepository $repo */
        $prod = new User();
        $prod
            ->setUsername('admin')
            ->setEmail('admin@admin.fr')
            ->setPlainPassword('admin');
        $manager->persist($prod);
        $manager->flush();
        $repo = $manager->getRepository(Product::class)->findBy([], null);
        $repos = $manager->getRepository(Product::class)->findAll();
        $count = count($repos)/12;
        $count = round($count, 0, PHP_ROUND_HALF_UP);
        return $this->render('homepage.html.twig', [
            'repo' => $repo,
            'count' => $count,
        ]);

    }
}
