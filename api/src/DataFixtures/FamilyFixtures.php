<?php

namespace App\DataFixtures;

use App\Entity\Family;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FamilyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $items = PREPARED_CSV_DATA;

        $i = 1;
        foreach ($items['families'] as $item) {
            $family = new Family();

            /** @var \App\Entity\Segment $segment */
            $segment = $this->getReference('segment-' . $item['Segment']);

            $family->setSegmentId($segment);
            $family->setFamily($item['Family']);
            $family->setFamilyName($item['Family Name']);

            $manager->persist($family);
            $this->addReference('family-' . $item['Family'], $family);

            if ($i % 25 == 0)
            {
                $manager->flush();
                $manager->clear();
            }

            $i++;
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            SegmentFixtures::class,
        ];
    }
}
