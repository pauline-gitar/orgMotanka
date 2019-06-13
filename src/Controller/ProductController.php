<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function viewProduct()
    {
        /*
         * Recuperation de Products dans la bdd
         */
        $products =$this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        return $this->render('default/product.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/product_details", name="product_details")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewProductDetails()
    {
        $id = $this->getDoctrine();
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find("1");
        return $this->render('/default/product_details.html.twig', [
            'product' => $product,
        ]);
    }
}
