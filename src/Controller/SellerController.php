<?php


namespace App\Controller;


use App\Entity\Product;
use App\Entity\Seller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class SellerController
 * @package App\Controller\orgMotanka
 */
class SellerController extends AbstractController
{
    use ProductTrait;

    /**
     * Page d'Inscription
     * @Route("/inscription_vendeur", name="seller_registration")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function inscription(Request $request)
    {
        # Formulaire d'inscription

        # Création d'un Vendeur
        $seller = new Seller();
        #$seller->setDateInscription(new \DateTime());
        #$seller->setRoles(['ROLE_SELLER']);

        # 1. Création du Formulaire (FormBuilder)
        $form = $this->createFormBuilder($seller)
            ->add('first_name', TextType::class, [
                'label' => 'Saisissez votre Prénom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Prénom'
                ]
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Saisissez votre Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre Nom'
                ]
            ])
            ->add('address', TextType::class, [
                'label' => 'Saisissez votre adresse',
                'attr' => [
                    'placeholder' => 'Saisissez votre adresse'
                ]
            ])
            ->add('zip_code', IntegerType::class, [
                'label' => 'Saisissez votre code postal',
                'attr' => [
                    'placeholder' => 'Saisissez votre code postal'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Saisissez votre ville',
                'attr' => [
                    'placeholder' => 'Saisissez votre ville'
                ]
            ])
            ->add('localisation', TextType::class, [
                'label' => 'Saisissez votre localisation',
                'attr' => [
                    'placeholder' => 'Saisissez votre localisation'
                ]
            ])
            ->add('Description', TextareaType::class, [
                'label' => 'Décrivez-vous',
                'attr' => [
                    'placeholder' => 'Décrivez-vous'
                ]
            ])
            ->add('picture', FileType::class, [
                'attr' => [
                    'class' => "dropify"
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


            #Creation du slug
            $seller->setSlug(
                $this->slugify(
                    $seller->getFirstName()
                )
            );
            # Upload de l'image

            /** @var UploadedFile $picture*/
            $picture = $form->get('picture')->getData();

            # 3. Insertion dans la BDD (EntityManager $em)
            $em = $this->getDoctrine()->getManager();
            $em->persist($seller);
            $em->flush();

            # Notification
            $this->addFlash('notice',
                'Félicitation, vous avez le statut vendeur !');



        }
        # Rendu de la vue
        return $this->render('admin/addSeller.html.twig', [
            'form' => $form->createView()
        ]);
    }



    // page des vendeurs
    /**
     * @Route("/sellers",
     *     name="sellers")
     */
    public function viewSeller()
    {
        //récupération des vendeurs ds la BDD
        $sellers =$this->getDoctrine()
            ->getRepository(Seller::class)
            ->findAll();
        return $this->render('default/sellers.html.twig', [
            'sellers' => $sellers,
        ]);

    }

    // affichage d'un vendeur
    /**
     *
     * @Route("/sellers/{slug<[a-zA-Z0-9\-_\/]+>}",
     *     defaults={"slug"},
     *     methods={"GET"},
     *     name="seller_details")
     */
    public function viewSellerDetail($slug)
    {

        $seller = $this->getDoctrine()
            ->getRepository(Seller::class)
            ->findOneBy(['slug' => $slug]);

        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                 ->findBy(['seller'=> $seller->getId()]);

        // 1 crée un tableau de données
         $localisation = $seller->getLocalisation();

        return $this->render('/default/seller_details.html.twig', [
            'seller' => $seller,
            'localisation' => $localisation,
            'product' => $product
        ]);
    }

}