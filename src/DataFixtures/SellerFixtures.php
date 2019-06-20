<?php


namespace App\DataFixtures;


use App\Entity\Seller;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SellerFixtures extends Fixture
{
    const PRODUCT_SELLER_REFERENCE = 'product-seller';

    public function load(ObjectManager $manager)
    {
        #Seller1
        $seller = new Seller();
        $seller->setFirstName("Natacha")
                ->setLastName("Evtouchenko")
                ->setDescription("Natasha, 65 ans,  reçoit une pension mensuelle de 1 200 hryvnias, mais son traitement pour le cœur coûte 750 hryvnias par mois. Natacha touche donc 38 euros de retraite par mois pour 38 ans de travail ! Elle ne peut pas survivre avec ça. Elle tente de gagner un peu plus en cultivant des pommes-de-terre pour les vendre et surtout pour se nourrir.
La palissade de la maison de Natacha est criblée d'éclats d’obus. Elle vit à Avdiyivka, un des points chauds de ce conflit qui a été ravagé par les tirs depuis 5 ans.
Natacha n’est pas partie car elle ne savait pas où aller et n’en avait pas les moyens. Sa maison est partiellement détruite, et n’est plus habitable. Sans revenu Natasha ne pourra jamais retrouver son domicile dans lequel elle a investie toute sa vie durant.
En dehors de l’amour de son jardin, Natacha est une excellente couturière et propose ses différentes créations aussi bien pour la décoration intérieur : coussin, literie, rideau , que des vêtements originaux aux teintes ukrainiennes traditionnelle et moderne quand elle se laisse aller à sa créativité propre.
")
                ->setPicture("Natacha.jpg")
                ->setAddress("Ukraine, Donbass, Avdiyivka. Région de Donetsk, zone rouge.")
                ->setCity("Avdiyivka")
                ->setZipCode("86060")
                ->setLocalisation("48.140814, 37.744674")
                ->setSlug('natacha_evtouchenko');
        $manager->persist($seller);

        #Seller2
        $seller = new Seller();
        $seller->setFirstName("Anastasia")
            ->setLastName("Romanenko")
            ->setDescription("Anastasia, 12 ans, est orpheline. Son père et sa mère ont été tués par la guerre. Elle habite chez sa grand-mère, dans la partie ouverte de Vodyané à 3 kilomètres de la ligne de contact. Le 18 juillet 2015, 4 obus ont atterris dans leur cour, le quatrième a touché sa mère. Mortellement blessée, elle décédera plus tard des suites de ses blessures. Son dernier geste a été de protéger la tête de sa fille avec ses mains. Depuis Anastasia ne supporte pas d'être touchée au sommet du crâne, elle a peur la nuit, elle ne peut pas rester seule et ne peut pas parler de ce qui s'est passé.
Elle n’a pas pu se rendre à l’école pendant plus de 1 ans, elle y retourne désormais mais sa grand-mère et elle ont un mal fou à pouvoir se nourrir et faire face au dépenses quotidienne. Anastasia adore travailler les perles et broder. Elle réalise des petites pièces entièrement en perle à fixer sur les vêtements, chapeau et autre pièces vestimentaire. ")
            ->setPicture("Anastasia.jpg")
            ->setAddress("Ukraine, Donbass, Vodyane, Région de Donetsk, zone rouge")
            ->setCity("Donetsk")
            ->setZipCode("86060")
            ->setLocalisation("48.154191, 37.777783")
            ->setSlug('anastasia_romanenko');
        $manager->persist($seller);

        #Seller3
        $seller = new Seller();
        $seller->setFirstName("Nikolai et Galina")
            ->setLastName("Kovaltchouk")
            ->setDescription("Nikolai vit en zone grise, c’est a dire entre les deux lignes ennemi. Pour survivre, il cultive la terre et élevé son troupeau. Il fait aussi des échanges de nourriture avec les soldats, du lait frais contre d’autres denrées que la terre ne lui fournit pas. Et les militaires lui apportent leur pain sec, les pâtes sèche et cela lui permet de nourrir ses bêtes et de faire des économies. Même au plus fort des combats, lui et sa femme ont toujours pris soin de leurs animaux. Malheureusement en plus des tirs il y a ce qu’ils appellent « l’effet domino »: « Ça a bombardé et cela a coupé l’électricité, nous avions 11 canetons en couveuse, les petits ne pouvaient pas rester dans le froid, nous les avons tout de suite abrité dans le seul endroit où il faisait un peu chaud que nous avions, un enclos fermé avec de la paille. Mais les rats sont venu les dévorer dans la nuit ». Nikolai a déjà perdu plusieurs chèvres tuées par le conflit. Il a depuis le printemps deux nouveaux chevreaux qu’il soigne particulièrement. Dans son jardin, posé sur un baril un morceau de patte décharné, les restes de sa dernière chèvres tuée par une mine antipersonnelle.
Agés tous les deux de plus de 70 ans, vivant sur le champ de bataille, couper du monde, et avec une pension minimal ( 40 euros mensuel) il leurs est très difficile de faire fasse. Avec la laine de leurs mouton et chèvres ils fabriquent leurs propre laine. Une laine pure et naturelle, qui se prête à être teinte ou tricoter tel quelle.
")
            ->setPicture("Nikolai_2.jpg")
            ->setAddress("Ukraine, Donbass, Vodyané. Région de Mariupol, zone grise.")
            ->setCity("Vodyané")
            ->setZipCode("84075")
            ->setLocalisation("48.100393, 37.664277
")
            ->setSlug('nikolai_et_galina_kovaltchouk');
        $manager->persist($seller);

        #Seller4
        $seller = new Seller();
        $seller->setFirstName("Nikolaï")
            ->setLastName("Aleksandrov")
            ->setDescription("Nikolaï vit à proximité du front. Sa maison et con jardin ont subi de nombreux dégâts. Malgré tout, il tente de relancer une activité et de faire face. Comme beaucoup, il ne touchent qu’une petite pension de retraite alors il cultivent la terre malgré le danger. «Un jour j’ai trouvé une mine terrestre dans le jardin alors j’ai payé un spécialiste pour la neutraliser. C’est vraiment dangereux car nous utilisons un tracteur pour cultiver notre terre donc nous avions de forte chance d’exploser dessus.» En sus, Ila développé son activité d’apiculteur et c’est de cette ruche dont Nikolaï est le plus fier. « Elle était plein d’impact de tirs de kalashnikov et d’autres éclats, je l’ai réparée avec différents morceaux de bois et depuis elle est de nouveau habitée par un essaim ». Cette ruche semble être pour lui un symbole de résistance aux dommages de la guerre. Un signe positif, le retour de la vie peut être…comme un signe d’espoir au milieu du désastre.

Nikolai c’est lancer dans la réalisation de bougie en cire d’abeille pure et naturelle, et c’est cette activité que nous voulons soutenir pou lui permettre de retrouver un meilleur niveau de vie.
")
            ->setPicture("nikolai.jpg")
            ->setAddress("Ukraine, Donbass, Taramchuk. Région de Donetsk, zone grise")
            ->setCity("Taramchuk")
            ->setZipCode("85665")
            ->setLocalisation("47.808772, 37.573204")
            ->setSlug('nikolai_aleksandrov');
        $manager->persist($seller);

        $manager->flush();

        $this->addReference(self::PRODUCT_SELLER_REFERENCE, $seller);
    }
}