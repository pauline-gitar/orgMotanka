<?php


namespace App\Controller;


use App\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{

    /**
     * @Route ("/newsletter", name="newsletter")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newSubscriber(Request $request)
    {
        # Création d'un abonné à la newsletter
        $newsletter = new Newsletter();


        # 1. Création du Formulaire (FormBuilder)
        $form = $this->createFormBuilder($newsletter)
            ->add('firstName', TextType::class, [
                'label' => 'Saisissez votre Prénom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Saisissez votre Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Nom'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Saisissez votre email',
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]

            ])
            ->add('submit', SubmitType::class, [
                'label' => "Je m'inscris !"
            ])
            ->getForm();

        # Traitement des données $_POST
        # Vérification des données grâce aux Asserts
        # Hydratation de notre objet Seller
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            # 3. Insertion dans la BDD (EntityManager $em)
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();

            # Notification
            $this->addFlash('footer.notice',
                'Félicitation, vous êtes inscrit à la newsletter !');

            # redirection
            return $this->redirectToRoute('home');



        } // Fin du IF $form is submitted


            # Rendu de la vue
            return $this->render('components/_footer.html.twig', [
                'form' => $form->createView()
            ]);
        }

}
