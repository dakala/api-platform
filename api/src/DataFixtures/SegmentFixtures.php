<?php

namespace App\DataFixtures;

use App\Entity\Segment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class SegmentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        define('PREPARED_CSV_DATA', $this->prepareData());

        $items = PREPARED_CSV_DATA;

        $i = 1;
        foreach ($items['segments'] as $item)
        {
            $segment = new Segment();
            $segment->setSegment($item['Segment']);
            $segment->setSegmentName($item['Segment Name']);

            $manager->persist($segment);
            $this->addReference('segment-' . $item['Segment'], $segment);

            if ($i % 25 == 0)
            {
                $manager->flush();
                $manager->clear();
            }

            $i++;
        }

        $manager->flush();
    }

    public function prepareData()
    {

        $filepath = __DIR__ . '/data.csv';
        $items = $this->ArrayFromCsv($filepath);

        $segments = $families = $classes = [];
        foreach ($items as $item) {

            $segments[] =  [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
            ];

            $families[] = [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
                'Family' => $item['Family'],
                'Family Name' => $item['Family Name'],
            ];

            $classes[] = [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
                'Family' => $item['Family'],
                'Family Name' => $item['Family Name'],
                'Class' => $item['Class'],
                'Class Name' => $item['Class Name'],
            ];
        }

        return [
            'segments' => array_values(array_unique($segments, SORT_REGULAR)),
            'families' => array_values(array_unique($families, SORT_REGULAR)),
            'classes' => array_values(array_unique($classes, SORT_REGULAR)),
            'commodities' => $items,
        ];
    }

    public function ArrayFromCsv($filepath)
    {
        $data = (file_exists($filepath)) ? array_map('str_getcsv', file($filepath)) : [];
        $header = array_shift($data);

        array_walk($data, [$this, 'combineArray'], $header);

        return $data;
    }

    public function combineArray(&$row, $key, $header) {
        $row = array_combine($header, $row);
    }

}
