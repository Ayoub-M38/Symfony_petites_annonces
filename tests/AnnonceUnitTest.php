<?php

namespace App\Tests;

use App\Entity\Annonces;
use App\Entity\Categorie;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use DateTime;

class AnnonceUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $annonce = new Annonces();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $annonce->setNom('nom')
            ->setEnVente(true)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setShow(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertTrue($annonce->getNom() === 'nom');
        $this->assertTrue($annonce->getEnVente() === true);
        $this->assertTrue($annonce->getCreatedAt() === $datetime);
        $this->assertTrue($annonce->getDescription() === 'description');
        $this->assertTrue($annonce->getShow() === true);
        $this->assertTrue($annonce->getSlug() === 'slug');
        $this->assertTrue($annonce->getFile() === 'file');
        $this->assertTrue($annonce->getPrix() === 20.20);
        $this->assertTrue($categorie, $annonce->getCategorie());
        $this->assertTrue($annonce->getUser() === $user);

    }

    public function testIsFalse(): void
    {
        $annonce = new Annonces();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $annonce->setNom('nom')
            ->setEnVente(true)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setShow(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertFalse($annonce->getNom() === 'false');
        $this->assertFalse($annonce->getEnVente() === true);
        $this->assertFalse($annonce->getCreatedAt() === new DateTime());
        $this->assertFalse($annonce->getDescription() === 'false');
        $this->assertFalse($annonce->getShow() === true);
        $this->assertFalse($annonce->getSlug() === 'false');
        $this->assertFalse($annonce->getFile() === 'false');
        $this->assertFalse($annonce->getPrix() === 20.20);
        $this->assertNotContains(new Categorie(), $annonce->getCategorie());
        $this->assertFalse($annonce->getUser() ===new User());


    }

    public function testIsEmpty()
    {
        $annonce = new Annonces();

        $this->assertEmpty($annonce->getNom());
        $this->assertEmpty($annonce->getEnVente());
        $this->assertEmpty($annonce->getCreatedAt());
        $this->assertEmpty($annonce->getDescription());
        $this->assertEmpty($annonce->getShow());
        $this->assertEmpty($annonce->getSlug());
        $this->assertEmpty($annonce->getFile());
        $this->assertEmpty($annonce->getPrix());
        $this->assertEmpty($annonce->getCategorie());
        $this->assertEmpty($annonce->getUser());
    }
}
