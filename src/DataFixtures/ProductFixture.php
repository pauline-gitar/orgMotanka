<?php


namespace App\DataFixtures;


use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixture extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Product 1
        $product = new Product();
        $product->setTitle('Tapis en laine')
            ->setPrice('20')
            ->setDescription('<p>Vintage from the 1970s<br>Tapis Jacquard Vintage Jacquard Spread Bedspread on the sofa 
                                        Double-sided woven bedspread Decoration Ukrainian Made in USSR <br>
                                        Defects: No<br>
                                        Size: 194cm * 133cm (76 "* 52")<br>
                                        Please, remember- this item is vintage, it was in use. Vintage is rarely perfect, 
                                        items can have marks of time and using. However, items sold will be clean and usable.
                                        If you have any questions, write to me and I will make for you the photos or dimensions that you want.<br>
                                        Thank you for visiting!</p>')
            ->setPicture('tapis1.jpg')
            ->setDateCreation(new \DateTime())
            ->setIdSeller('1')
            ->setSlug('tapis-en-laine')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 2
        $product = new Product();
        $product->setTitle('Jouet en laine pour chat')
            ->setPrice('5')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('jouet-chat.jpg')
            ->setDateCreation(new \DateTime())
            ->setIdSeller('1')
            ->setSlug('jouet-chat')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 3
        $product = new Product();
        $product->setTitle('Tapis en laine noir et blanc')
            ->setPrice('40')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('tapis-2.jpg')
            ->setDateCreation(new \DateTime())
            ->setIdSeller('1')
            ->setSlug('tapis-en-laine-noir-et-blanc')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 4
        $product = new Product();
        $product->setTitle('Panier en osier')
            ->setPrice('30')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('panier-1.jpg')
            ->setDateCreation(new \DateTime())
            ->setIdSeller('1')
            ->setSlug('panier-en-osier')
            ->setSpotlight(1);
        $manager->persist($product);
    }
}