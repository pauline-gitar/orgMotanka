<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * Page inscription
     * @Route("/inscription",
     *     name="user_inscription")
     */
    public function inscription(Request $request,
                                UserPasswordEncoderInterface $passwordEncoder)
    {
        // Request de http fondation

        // création d'un nouveau user
        $user = new User();

        // Elements qui n'apparaissent pas dans le formulaire
        // date d'inscription
        $user->setInscriptionDate(new \DateTime());
        $user->setRoles(['ROLE_USER']);

        // Création du formulaire d'inscription
        $formInsc = $this->createFormBuilder($user)
            ->add('nom', TextType::class, [
                'label' => "Saisissez votre nom",
                'attr' => [
                    'placeholder' => "Nom"
                ]
            ])
            ->add('first_name', TextType::class, [
                'label' => "Saisissez votre prénom",
                'attr' => [
                    'placeholder' => "Prénom"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => "Saisissez votre email",
                'attr' => [
                    'placeholder' => "Email"
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => "Saisissez votre mot de passe",
                'attr' => [
                    'placeholder' => "Password"
                ]
            ])
            ->add('confirm_password', PasswordType::class, [
                'label' => "Confirmez votre mot de passe",
                'attr' => [
                    'placeholder' => "Confirmez password"
                ]
            ])
            ->add('address', TextType::class, [
                'label' => "Saississez votre adresse",
                'attr' => [
                    'placeholder' => "Adresse"
                ]
            ])
            ->add('city', TextType::class, [
                'label' => "Ville",
                'attr' => [
                    'placeholder' => "Ville"
                ]
            ])
            ->add('zip_code', IntegerType::class, [
                'label' => "Code postal",
                'attr' => [
                    'placeholder' => "Code postal"
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Inscription"
            ])
            ->getForm();

        // Traitement des données POST
        // vérifie les données et les recharge dans l'objet membre
        // vérification grace aux Asserts (entity membre)
        // hydratation de notre objet membre
        $formInsc->handleRequest($request);

        // 3. Insertion dans la BDD //OK

        // si le formulaire est soumis ET valide
        if ($formInsc->isSubmitted() && $formInsc->isValid()) {

             // encodage du mot de passe
            $user->setPassword(
                $passwordEncoder->encodePassword(
                $user,
                $user->getPassword()
                )
                );

            // 3. Sauvegarde en BDD
            // (entityManager $em)
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // 4. notification flash
            // fonctionne sur le principe de session
            $this->addFlash('notice',
                'Félicitations, vous pouvez vous connecter');

            # redirection
            return $this->redirectToRoute('security_login');

        } // Fin du IF $form is submitted

        // rendu à la vue
        return $this->render('user/inscription.html.twig',
            [
                'form' => $formInsc->createView()
            ]);
    }

}