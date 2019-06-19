<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Notification\ContactNotification;
use App\Type\ContactType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{


    /**
     * @param Request $request
     * @return Response
     * @Route ("/contact", name="contact")
     */
    public function showContact(Request $request, ContactNotification $notification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success', 'Votre message a bien ete envoye');
            /**
            return $this->redirectToRoute('home');
             *
             */
        }
        return $this->render('incs/contact.html.twig', [
            'formcontact' => $form->createView()
    ]);
    }
}