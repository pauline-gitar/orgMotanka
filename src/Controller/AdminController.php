<?php


namespace App\Controller;



use App\Entity\Charge;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends AbstractController

{
    /**
     * @Route("/admin_page", name="admin_page")
     */
    public function admin()
    {
        return $this->render('admin/adminPage.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin_order", name="commandes")
     */
    public function adminOrder()
    {
        $orders =$this->getDoctrine()
            ->getRepository(Charge::class)
            ->findAll();
        return $this->render('admin/admin_order.html.twig', [
            'orders' => $orders,
        ]);
    }
}