<?php

namespace App\DataFixtures;

use App\Entity\Position;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class PositionFixture extends Fixture
{
    const array POSTITIONS = ['tester', 'developer', 'project manager'];
    const array SLUGS = ['tester', 'developer', 'projectManager'];

    public function load(ObjectManager $manager): void
    {
        foreach (self::POSTITIONS as $key=> $positionName) {
            $position = new Position();
            $position->setName($positionName);
            $position->setSlug(self::SLUGS[$key]);
            $manager->persist($position);
        }

        $manager->flush();
    }

}
