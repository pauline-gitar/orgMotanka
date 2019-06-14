<?php

namespace App\Controller;


use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Seller;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    use ProductTrait;
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

    /**
     * @Route("/product/creation", name="product-creation")
     */
    public function createProduct(Request $request)
    {

        //a faire recuperer le vendeur connecte et laffecter a la creation dun produit

        //

        //Creation d'un nouvel article
        $product = new Product();

        //date d'inscription automatique
        $product->setDateCreation(new \DateTime());

        //Creation d'un formulaire
        $form = $this->createFormBuilder($product)
            ->add('title', TextType::class,[
                'required' => true,
                'label'    => "Titre du produit",
                'attr'     => [
                    'placeholder' => "Titre du produit"
                ]
            ])
            ->add('description', TextareaType::class,[
                'label'  => "Descriptif",
                'attr' => [
                    'placeholder' => "Description du produit"
                ]
            ])
            ->add('price',MoneyType::class, [
                'currency' => 'EUR'
            ])
            ->add('picture', FileType::class, [
                'attr'     => [
                    'class' => "dropify"
                ]
            ])
            ->add('spotlight', CheckboxType::class, [
                'required' => false,
                'attr' => [
                    'data-toggle' => 'toggle',
                    'data-on' => 'Oui',
                    'data-off' => 'Non'
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false,
                'label' => false
            ])
            ->add('seller', EntityType::class, [
                'class' => Seller::class,
                'choice_label' => 'last_name',
                'expanded' => false,
                'multiple' => false,
                'label' => false
            ])
            ->add('submit', SubmitType::class,[
                'label' => "Inscription"
            ])
            ->getForm();
        #Traitement des donnees POST
        $form->handleRequest($request);


        //si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()) {


            #1Upload de l'image
            // $file stores the uploaded PDF file
            /** @var UploadedFile $picture*/
            $picture = $form->get('picture')->getData();

            #On renomme l'image avec le slug de l'article
            $fileName = $this->slugify($product->getTitle()).'.'.$picture->guessExtension();

            // Move the file to the directory where article images are stored
            try {
                $picture->move(
                    $this->getParameter('product_picture_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
                dump($e);
                die();
            }

            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $product->setPicture($fileName);


            #Creation du slug
            $product->setSlug(
                $this->slugify(
                    $product->getTitle()
                )
            );


        #Sauvegarde en BDD
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        #4Notification flash
        $this->addFlash('notice','Nouveau produit maintenant en ligne');
        }

        //transmission vue
        return $this->render('product/creation.html.twig',[
            'form' => $form->createView()

        ]);

    }

}
