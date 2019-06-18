<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * Connexion d'un membre
     * @Route("/connexion", name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \symfony\component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $form = $this->createFormBuilder([
            'email' =>$authenticationUtils->getLastUsername()
        ])
            ->add('email',EmailType::class,[
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]
            ])
            ->add('password',PasswordType::class,[
                'label' => 'Saisissez votre mot de passe',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => "Connexion"
            ])
            ->getForm();

        return $this->render('user/login.html.twig',[
            'formlogin' => $form->createView(),
            'errorlogin' => $authenticationUtils->getLastAuthenticationError()
        ]);

    }

    /**
     * Deconnexion d'un membre
     * @Route("/deconnexion", name="security_logout")
     */
    public function deconnexion()
    {
    }
}