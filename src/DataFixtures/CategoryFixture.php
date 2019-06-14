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
        $category->setName("Clothes")
                 ->setSlug('clothes');
        $manager->persist($category);

        // Decoration
        $category = new Category();
        $category->setName("Decoration")
            ->setSlug('decoration');
        $manager->persist($category);

        // Food
        $category = new Category();
        $category->setName("Food")
            ->setSlug('food');
        $manager->persist($category);

        // Toy
        $category = new Category();
        $category->setName("Toys")
            ->setSlug('toys');
        $manager->persist($category);

        # Déclenche l'execution de la requète.
        $manager->flush();

        # Partage du membre
        $this->addReference(self::PRODUCT_CATEGORY_REFERENCE, $category);
    }
}