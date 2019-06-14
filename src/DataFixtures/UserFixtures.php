<?php


namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        #User1
        $user = new User();
        $user->setNom("Machin")
            ->setFirstName("Igor")
            ->setEmail('igor@test.com')
            ->setPassword('password')
            ->setAddress("rue tintin")
            ->setCity("Dnipropetrovsk")
            ->setZipCode("11111")
            ->setInscriptionDate(new \DateTime())
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        #User2
        $user = new User();
        $user->setNom("truc")
            ->setFirstName("Volodimir")
            ->setEmail('volodimir@test.com')
            ->setPassword('password2')
            ->setAddress("rue tintin")
            ->setCity("Dnipropetrovsk")
            ->setZipCode("11111")
            ->setInscriptionDate(new \DateTime())
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        #User3
        $user = new User();
        $user->setNom("Chose")
            ->setFirstName("Dimitri")
            ->setEmail('dimitri@test.com')
            ->setPassword('password3')
            ->setAddress("rue tintin")
            ->setCity("Dnipropetrovsk")
            ->setZipCode("11111")
            ->setInscriptionDate(new \DateTime())
            ->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->persist($user);
        $manager->flush();
    }

}