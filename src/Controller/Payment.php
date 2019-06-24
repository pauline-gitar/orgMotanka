<?php


namespace App\Controller;


use App\Entity\Product;
use App\Entity\Charge as MyCharge;
use Stripe\Charge;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class Payment extends AbstractController
{

    /**
     * @Route ("/user/payment", name="payment")
     */
    public function payment(SessionInterface $session, UserInterface $user = null)
    {


        $token = $_POST;
        $nom = $user->getNom();
        $email = $user->getEmail();
        $iduser = $user->getId();
//        $total = 0;
        $productIds = $session->get('product-ids', []);

        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy(['id' => $productIds]);


        $total = array_sum(array_map(function ($product){
            return $product->getPrice();
        }, $products));

        dump($user, $token, $nom, $email);


        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($nom) && !empty($token)) {

            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            Stripe::setApiKey('sk_test_uPCvbqGiPojpngVRsDMMQTU900jGrjCQ8p');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            $charge = Charge::create([
                'amount' => $total . "00",
                'currency' => 'eur',
                'description' => 'Example charge',
                'source' => $token,
                'metadata' => [
                    'name' => $nom,
                    'email' => $email,
                    'idProduit' => implode(',', $session->get('product-ids', $productIds))

                ]
            ]);

            dump($charge, $session, $products, $total, $iduser);


        }

        //Ajout des informations de vente en BDD

        $mycharge = new MyCharge();
        $mycharge->setUser($user);
        $mycharge->setTotal($total);
        $mycharge->setToken($charge['id']);
        $mycharge->setDescription(implode(',', $session->get('product-ids', $productIds)));
        dump($mycharge);
        $em = $this->getDoctrine()->getManager();
        $em->persist($mycharge);
        $em->flush();





        return $this->render('user/payment.html.twig'
            , [ 'user' => $user,
                'token' => $token,
                'nom' => $nom,
                'email' => $email,
                'session' => $session,
                'products' => $products,
                'total' => $total
            ]);
    }
}