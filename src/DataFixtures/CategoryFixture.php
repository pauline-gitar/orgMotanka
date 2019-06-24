<?php


namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    const PRODUCT_CATEGORY_REFERENCE = 'product-category';

    public function load(ObjectManager $manager)
    {
        // Clothes
        $category = new Category();
        $category->setName("Vêtements")
                 ->setSlug('clothes');
        $manager->persist($category);


        // Decoration
        $category = new Category();
        $category->setName("Décoration")
            ->setSlug('decoration');
        $manager->persist($category);


        // Food
        $category = new Category();
        $category->setName("Alimentation")
            ->setSlug('food');
        $manager->persist($category);


        // Toy
        $category = new Category();
        $category->setName("Jouet")
            ->setSlug('toys');
        $manager->persist($category);


        // Bijoux
        $category = new Category();
        $category->setName("Bijoux")
            ->setSlug('jewel');
        $manager->persist($category);


        // Bijoux
        $category = new Category();
        $category->setName("Produits de soin")
            ->setSlug('care-products');
        $manager->persist($category);


        // Autre
        $category = new Category();
        $category->setName("Autre")
            ->setSlug('other');
        $manager->persist($category);


        # Déclenche l'execution de la requète.
        $manager->flush();

    }
}