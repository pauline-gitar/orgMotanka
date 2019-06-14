<?php


namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Seller;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixture extends Fixture implements DependentFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Product 1

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['id' => '0']);

        //creation du produit
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
            ->setSeller($this->getReference(SellerFixtures::PRODUCT_SELLER_REFERENCE))
            ->setCategory($this->getReference(CategoryFixture::PRODUCT_CATEGORY_REFERENCE))
            ->setSlug('tapis-en-laine')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 2

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'toys']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['id' => '1']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Jouet en laine pour chat')
            ->setPrice('5')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('jouet-chat.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($this->getReference(SellerFixtures::PRODUCT_SELLER_REFERENCE))
            ->setCategory($this->getReference(CategoryFixture::PRODUCT_CATEGORY_REFERENCE))
            ->setSlug('jouet-chat')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 3

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['id' => '2']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Tapis en laine noir et blanc')
            ->setPrice('40')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('tapis-2.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($this->getReference(SellerFixtures::PRODUCT_SELLER_REFERENCE))
            ->setCategory($this->getReference(CategoryFixture::PRODUCT_CATEGORY_REFERENCE))
            ->setSlug('tapis-en-laine-noir-et-blanc')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 4

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'clothes']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['id' => '2']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Panier en osier')
            ->setPrice('30')
            ->setDescription('<p>Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. 
                                        Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde 
                                           etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam 
                                           deditšnihil dicam hoc loco de me; tantum sit, quantum vos existimatis;</p>')
            ->setPicture('panier-1.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($this->getReference(SellerFixtures::PRODUCT_SELLER_REFERENCE))
            ->setCategory($this->getReference(CategoryFixture::PRODUCT_CATEGORY_REFERENCE))
            ->setSlug('panier-en-osier')
            ->setSpotlight(1);
        $manager->persist($product);
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            SellerFixtures::class,
            CategoryFixture::class
        ];
    }
}