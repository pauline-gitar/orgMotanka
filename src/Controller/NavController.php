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
     * @Route("/category/{slug<[a-zA-Z0-9\-_\/]+>}",
     *     defaults={"slug"},
     *     methods={"GET"},
     *     name="category_details")
     */
//    public function category($slug) {
//
//        $categories = $this->getDoctrine()
//            ->getRepository(Category::class)
//            ->findBy(['slug' => $slug]);
//
//
//        return $this->render('components/_nav.html.twig', [
//            'categories' => $categories
//        ]);
//    }

}