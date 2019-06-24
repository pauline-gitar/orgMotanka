<?php


namespace App\Controller;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HeaderController extends AbstractController
{
    public function header(SessionInterface $session)
    {
        $productIds = $session->get('product-ids', []);
        $session->get('product-ids', $productIds);


        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(['id' => $productIds]);

        return $this->render('components/_header.html.twig'
            , ['product' => $product]
        );
    }
}