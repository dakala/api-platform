<?php

namespace App\DataFixtures;

use App\Entity\Commodity;
use App\Entity\Family;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommodityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $items = PREPARED_CSV_DATA;

        $i = 1;
        foreach ($items['commodities'] as $item) {
            $commodity = new Commodity();

            /** @var \App\Entity\Classification $classification */
            $classification = $this->getReference('classification-' . $item['Class']);

            $commodity->setClassId($classification);
            $commodity->setCommodity($item['Commodity']);
            $commodity->setCommodityName($item['Commodity Name']);

            $manager->persist($commodity);

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
            ClassificationFixtures::class,
        ];
    }
}
