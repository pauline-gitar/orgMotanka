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
     * @param Seller $seller
     * @param Category $category
     */
    public function load(ObjectManager $manager)
    {
        // Product 1

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Kovaltchouk']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Tapis en laine')
            ->setPrice('50')
            ->setDescription("<p>Ce Tapis en laine est composé à 100% Laine et est Tissé à la main.
                                            Il a une épaisseur d‘environ jusqu'à 5 mm.<br>Dimension : 140x200cm<br>
                                            Grâce à sa finition de qualité, il garde sa structure et son apparence même après usage excessif.
                                            Robuste et très résistant, il ne se décolore pas suite à l’exposition à la lumière et il est facile à entretenir.</p>")
            ->setPicture('tapis1.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('tapis-en-laine')
            ->setSpotlight(1);
        $manager->persist($product);
        $manager->flush();

        // Product 2

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'toys']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Evtouchenko']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Jouet en laine pour chat')
            ->setPrice('5')
            ->setDescription("<p>Un cadeau parfait pour votre bébé en 
                                fourrure qui aime la racine de valériane et un peu d'action!
                                Cette souris est remplie de valériane, elle mesure 10cm de long et 4 de large.
                                Fabriquée à partir de fil de laine brute bio non lavée.
                                </p>")
            ->setPicture('jouet-chat.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('jouet-chat')
            ->setSpotlight(1);
        $manager->persist($product);
        $manager->flush();

        // Product 3

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Kovaltchouk']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Tapis en laine noir et blanc')
            ->setPrice('60')
            ->setDescription("<p>Ce Tapis en laine est composé à 100% Laine et est Tissé à la main.
                                            Il a une épaisseur d‘environ jusqu'à 5 mm.<br>Dimension : 140x200cm<br>
                                            Grâce à sa finition de qualité, il garde sa structure et son apparence même après usage excessif.
                                            Robuste et très résistant, il ne se décolore pas suite à l’exposition à la lumière et il est facile à entretenir.</p>")
            ->setPicture('tapis-2.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('tapis-en-laine-noir-et-blanc')
            ->setSpotlight(1);
        $manager->persist($product);
        $manager->flush();

        // Product 4

        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'clothes']);

        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Evtouchenko']);

        //creation du produit
        $product = new Product();
        $product->setTitle('Panier en osier')
            ->setPrice('30')
            ->setDescription("<p>Beau panier en osier.<br>
                                        Coloris discrets.<br>
                                        Dimensions :<br>
                                        40 x 24 x hauteur totale 42 cm<br>
                                        Poids : 590 g")
            ->setPicture('panier-1.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('panier-en-osier')
            ->setSpotlight(0);
        $manager->persist($product);
        $manager->flush();


        // Product 10
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'care-products']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Savon a la cire d'abeille")
            ->setPrice('8')
            ->setDescription('L\'ajout de miel est très apprécié dans les savons; le miel possède des propriétés 
            réparatrices et apaisantes .
            Très doux il peut être utiliser sur toutes les parties du corps y compris le visage.
            <br >
            Véritable savon naturel, fabriqué artisanalement à partir d\'huiles végétales bio saponifiées à froid. 
            La saponification à froid est la seule méthode qui permet au savon de produire sa propre glycérine à 
            la vertu hydratante incomparable.')
            ->setPicture('savon-miel-1.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('savon-au-miel')
            ->setSpotlight(1);
        $manager->persist($product);
        $manager->flush();


        // Product 11
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'food']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Miel d'Acacia")
            ->setPrice('7')
            ->setDescription("Miel brut avec des notes de léger et florales.
                                        <br>
                                         Poids net 270g 9,5 oz
                                          <br>
                                        Notre miel est récolté localement et est vraiment symbolique de la riche biodiversité de cette zone remarquable. Nous achetons notre miel un apiculteur local, un des meilleurs dans la région, et il est mis en bouteille dans nos locaux.
                                        <br>
                                        Tous nos produits sont fabriqués sur les plus hauts standards.")
            ->setPicture('miel-accacias.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('miel-accacias')
            ->setSpotlight(1);
        $manager->persist($product);


        // Product 12
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'care-products']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Savon au miel")
            ->setPrice('7')
            ->setDescription("Le miel donne à ce savon une belle couleur ambrée. Aspect alvéolé sur le dessus et le dessous du savon.<br>
            Ce savon d'un poids de 120g minimum est fait et coupé à la main en petite série, une légère différence de forme ou de couleur par rapport à la photo est possible.
            <br>
            Pour bien l'utiliser:<br>
            Il est conseillé de laisser sécher le savon sur un porte savon à l'abri de l'eau entre deux utilisations.")
            ->setPicture('savon-miel-2.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('savon-miel-2')
            ->setSpotlight(1);
        $manager->persist($product);

        // Product 13
        // Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'food']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Miel de fleurs sauvages")
            ->setPrice('7')
            ->setDescription("Miel brut avec des notes de léger et florales.
                                        <br>
                                        Poids net 270g 9,5 oz
                                        <br>
                                        Notre miel est récolté localement et est vraiment symbolique de la riche biodiversité de cette zone remarquable. Nous achetons notre miel un apiculteur local, un des meilleurs dans la région, et il est mis en bouteille dans nos locaux.
                                        <br>
                                          Tous nos produits sont fabriqués sur les plus hauts standards.")
            ->setPicture('miel-fleurs-sauvages.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('miel-fleurs-sauvages')
            ->setSpotlight(1);
        $manager->persist($product);

// *************************** nouveau vendeur /  petite fille / crochet

        // Product 14
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'toys']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Romanenko']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Peluche renard au crochet")
            ->setPrice('25')
            ->setDescription('
            Ce mignon petit renard au crochet vit dans les montagnes.
            Emmenez le dans votre poche, posez le sur votre bureau, accrochez-le à votre rétroviseur... Il sera heureux partout.<br>
            Offrez un cadeau original à quelqu\'un de spécial :-) <br>
            Ou gardez le pour vous et collectionnez les tous !<br>
            
            CARACTERISTIQUES<br>
            - 1 petite peluche renard<br>
            - Hauteur approximative : 5 cm<br>
            - Coton mercerisé, yeux de sécurité en plastique noir, rembourrage en ouate de polyester anti-acariens et granulés en plastique.<br>
            - Entièrement crocheté serré à la main avec soin.<br>
            Coton, Yeux de sécurité en plastique, Ouate de rembourrage, Polyester, Granulés de rembourrage')
            ->setPicture('renard-crochet2.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('renard-crochet')
            ->setSpotlight(1);
        $manager->persist($product);

        // *************************** nouveau vendeur /  petite fille / crochet

        // Product 15
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'toys']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Romanenko']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Pieuvre bleu au crochet")
            ->setPrice('30')
            ->setDescription("
            Peluche réalisée au crochet, à la main avec un fil 100% coton
Idéal comme objet de décoration ou à offrir

N'hésitez pas à me contacter si vous souhaitez d'autre photos ou renseignements. 

Taille : 
8cm de hauteur, 25cm de circonférence (tentacules)")
            ->setPicture('pieuvre-bleue.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('pieuvre-bleue')
            ->setSpotlight(1);
        $manager->persist($product);


        // *************************** nouveau vendeur /  petite fille / crochet

        // Product 16
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'jewel']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Romanenko']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Boucles d'oreilles en perles")
            ->setPrice('20')
            ->setDescription("
            Boucles d'oreilles en perles de rocailles multicolores, montées sur métal laqué noir.")
            ->setPicture('boucle-oreilles.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug("boucle-oreilles")
            ->setSpotlight(1);
        $manager->persist($product);


        // *************************** nouveau vendeur /  petite fille / crochet

        // Product 17
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'jewel']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Romanenko']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Boucles d'oreilles perles de rocaille 'triangle'")
            ->setPrice('20')
            ->setDescription('Argent, Céramique, Verre<br>
            Dimensions<br>
            Longueur: 12.5 Centimètres; Largeur: 5 Centimètres<br>
            Boucles d\'oreilles en perles de rocailles bleues montées sur métal argenté à l\'aide de perles en céramique et filigrane.')
            ->setPicture('boucles-oreilles-bleues.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug("boucles-oreilles-bleues")
            ->setSpotlight(1);
        $manager->persist($product);

        // *************************** nouveau vendeur /  laine

        // Product 18
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Kovaltchouk']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Tapis en laine, décoration triangle")
            ->setPrice('100')
            ->setDescription("Entièrement tissés à la main, nos tapis sont faits de laine vierge issue de moutons et brebis de nos troupeaux, elle est de haute qualité. 
            Non surchargés de couleurs et de motifs, ils mettent davantage en valeur le mobilier, qu'il s'agisse de meubles anciens ou nouveaux en bois, de salons en cuir ou de mobilier design. Ils sont très prisés dans les salons.
            <br>DIMENSION: 144 x 100 cm.")
            ->setPicture('tapis-laine-triangle.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug("tapis-laine-triangle")
            ->setSpotlight(0);
        $manager->persist($product);

        // Product 9
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'care-products']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Savon cire d'abeille et safran")
            ->setPrice('8')
            ->setDescription("Ce savon est riche, avec la plus douce et crémeuse des mousses, un léger arôme de miel et une liste sans fin d'avantages pour la peau. Le miel est naturellement apaisant, antibactérien et un vrai miracle naturel pour la peau. Il peut être utilisé directement sur la peau, mais vu que c'est un peu gênant et un peu collant, ici à la grange, nous recommandons le système de savon au miel pour votre peau!
<br>
            Un savon très doux, riche et hautement hydratant, il convient aux plus sensibles des peaux, qu'elles soient jeunes ou matures. Il est approprié pour une utilisation comme un savon de main très doux, parfait pour ceux qui se lavent les mains fréquemment, une barre de corps hydratante, et pour le visage, en particulier pour les types de peaux très sensibles, sèches ou matures.")
            ->setPicture('savon-miel-3.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('savon-cire-abeille-safran')
            ->setSpotlight(1);
        $manager->persist($product);

        // *************************** nouveau vendeur /  laine

        // Product 18
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'clothes']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Evtouchenko']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Chaussettes grises 100% laine bio")
            ->setPrice('25')
            ->setDescription("Fait à la main gris naturel, chaussettes de randonnée. En utilisant 100 % nouveau, à la main laine cuillère.
            La laine est une fibre de meilleur choix pour chaque randonneur.")
            ->setPicture('chaussettes.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug("chaussettes")
            ->setSpotlight(0);
        $manager->persist($product);

        // Product 6
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'food']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Pot de miel d'aubépine")
            ->setPrice('5')
            ->setDescription("Miel d’aubépine brut.<br>
            Poids net 270g 9,5 oz. <br>
            Notre miel est récolté localement et est vraiment symbolique de la riche biodiversité de cette zone remarquable. Nous achetons notre miel un apiculteur local, un des meilleurs dans la région, et il est mis en bouteille dans nos locaux.<br>
            Tous nos produits sont fabriqués sur les plus hauts standards.")
            ->setPicture('miel-aubepine.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('miel-aubepine')
            ->setSpotlight(1);
        $manager->persist($product);





        // Product 7
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle('Bougie en forme de bonhomme de neige')
            ->setPrice('15')
            ->setDescription("motif : bougie sujet Bonhomme de neige jouant de l'accordéon<br>
            sujet en cire d'abeille naturelle et récoltée dans mes ruches.<br>
            La cire d'abeille dégage une odeur subtile qui embaumera votre intérieur naturellement sans polluer. la bougie en cire d'abeille dure plus longtemps que les autres bougies.<br>
            112 grammes environ.<br>
            Dimensions : 9X6X5 cm env.")
            ->setPicture('bougie-cire-bonhomme.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('bougie-cire-bonhomme')
            ->setSpotlight(0);
        $manager->persist($product);



        // Product 8
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'decoration']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Bougie macaron en cire d'abeille")
            ->setPrice('30')
            ->setDescription("Motif : bougie en cire naturelle d'abeille<br>
            Sujet : macaron lune aux 2 visages.<br>
            sujet en cire d'abeille naturelle et récoltée dans mes ruches.<br>
            La cire d'abeille dégage une odeur subtile qui embaumera votre intérieur naturellement sans polluer. la bougie en cire d'abeille dure plus longtemps que les autres bougies.
            <br>
            50 grammes..<br>
            Dimensions :7 X 2 cm environ.")
            ->setPicture('macaron-cire-dabeille.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('macaron-cire-dabeille')
            ->setSpotlight(1);
        $manager->persist($product);



        // Product 5
        //Recuperation de la categorie
        $category = $manager->getRepository(Category::class)
            ->findOneBy(['slug' => 'other']);
        //Recuperation du vendeur
        $seller = $manager->getRepository(Seller::class)
            ->findOneBy(['last_name' => 'Aleksandrov']);
        //creation du produit
        $product = new Product();
        $product->setTitle("Pain de cire d'abeilles pure")
            ->setPrice('5')
            ->setDescription('
                        Type de cire : Cire d\'abeille<br>
                        cire d\'abeilles pure provenant de constructions naturelles entièrement construites par 
                        les abeilles de mon rucher, aucun produit chimique.
                        pour la fabrication de bougie, bricolage, cosmétiques...<br>
                        la cire d\'abeille dégage une odeur subtile qui embaumera votre intérieur naturellement sans polluer. 
                        la bougie en cire d\'abeille dure plus longtemps que les autres bougies.<br>
                        motif : lingot de cire d\'abeille -30 g. 1 seule pièce')
            ->setPicture('pain-de-cire.jpg')
            ->setDateCreation(new \DateTime())
            ->setSeller($seller)
            ->setCategory($category)
            ->setSlug('pain-de-cire')
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