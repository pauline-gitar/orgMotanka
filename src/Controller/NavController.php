<?php


namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends AbstractController
{

    /**
     * @param $slug
     * @return mixed
     * @Route("/category",
     *     methods={"GET"},
     *     name="category_details")
     */
    public function category() {

        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();


        return $this->render('components/_nav.html.twig', [
            'categories' => $categories
        ]);
    }

}