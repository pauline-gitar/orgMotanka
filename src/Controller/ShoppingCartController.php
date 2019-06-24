<?php


namespace App\Controller;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;

class ShoppingCartController extends AbstractController
{
    /**
     * @Route("/ajouter/{id}", name="ajouter")
     */
    public function ajouter(SessionInterface $session, $id)
    {
        $productIds = $session->get('product-ids', []);
        dump($session);
        if (!in_array($id, $productIds)) {
            $productIds[] = $id;
            $session->set('product-ids', $productIds);
        }
        return $this->redirectToRoute('product');
    }

    /**
     * @Route("/supprimer/{id}", name="supprimer")
     */
    public function supprimer(SessionInterface $session, $id)
    {
        $productIds = $session->get('product-ids', []);
        unset($productIds[array_search($id, $productIds)]);
        $session->set('product-ids', $productIds);
        return $this->redirectToRoute('panier');
    }



//    public function total(SessionInterface $session)
//    {
//        $productIds = $session->get('product-ids', []);
//        $session->get('product-ids', $productIds);
//
//        $price =   $this->getDoctrine()
//                ->getRepository(Product::class)
//                ->findBy(['id' => $productIds]);
//
//        dump($price);
//        $total = array_sum($price);
//
//        dump($price);
//
//
//
//        return $this->render('user/panier.html.twig',['total' => $total]);
//    }

    /**
     * @param SessionInterface $session
     * @Route ("/panier", name="panier")
     */
    public function panier(SessionInterface $session, UserInterface $user=null)
    {
        $productIds = $session->get('product-ids', []);
        $session->get('product-ids', $productIds);


        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(['id' => $productIds]);

//
//        $securityContext = $this->container->get('security.authorization_checker');
//        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY')){
//            $user = $this->getUser();
//        }




        dump($productIds, $product, $user);

        return $this->render('user/panier.html.twig'
            , ['product' => $product
                , 'user' => $user]

        );


    }
}