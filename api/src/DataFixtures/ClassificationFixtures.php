<?php

namespace App\DataFixtures;

use App\Entity\Classification;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClassificationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $items = PREPARED_CSV_DATA;

        $i = 1;
        foreach ($items['classes'] as $item)
        {
            $classification = new Classification();

            /** @var \App\Entity\Family $family */
            $family = $this->getReference('family-' . $item['Family']);

            $classification->setFamilyId($family);
            $classification->setClass($item['Class']);
            $classification->setClassName($item['Class Name']);

            $manager->persist($classification);
            $this->addReference('classification-' . $item['Class'], $classification);

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
            FamilyFixtures::class,
        ];
    }
}
