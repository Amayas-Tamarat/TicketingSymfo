<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Commantaire;
use App\Entity\Commentaire;
use App\Entity\Ticket;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ticket1 = new Ticket();
        $ticket1
            ->setTitre('Problème affichage')
            ->setContenu('Aucun affichage')
            ->setDate(new \DateTime('2022-03-05'))
        ;
        $manager->persist($ticket1);

        $ticket2 = new Ticket();
        $ticket2
            ->setTitre('Couleur écran')
            ->setContenu('Modifier la couleur de l\'écran')
            ->setDate(new \DateTime('2022-03-06'))
        ;
        $manager->persist($ticket2);

        $commentaire1 = new Commentaire();
        $commentaire1
            ->setDate(new \DateTime('2022-03-05'))
            ->setAuteur('Robert')
            ->setContenue('Bien joué!')
            ->setTicket($ticket2)
        ;
        $manager->persist($commentaire1);

        $commentaire2 = new Commentaire();
        $commentaire2
            ->setDate(new \DateTime('2022-03-06'))
            ->setAuteur('Albert')
            ->setContenue('Excellent')
            ->setTicket($ticket1)
        ;
        $manager->persist($commentaire2);

        $commentaire3 = new Commentaire();
        $commentaire3
            ->setDate(new \DateTime('2022-03-06'))
            ->setAuteur('Etienne')
            ->setContenue('Bon travail')
            ->setTicket($ticket1)
        ;
        $manager->persist($commentaire3);

        
        
        
        

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
