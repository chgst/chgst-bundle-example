<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Building;
use AppBundle\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $eventNames = ['enter_building_completed', 'exit_building_completed'];
        $buildingIds = ['ikea', 'starbucks', 'costa', 'tesco', 'wagamama', 'primark', 'asda', 'lidl'];
        $names = ['nick', 'brenda', 'patricia', 'maria', 'john', 'james', 'peter', 'richard', 'jenny'];

        $people = json_decode(file_get_contents('https://randomuser.me/api/?nationality=GB&results=1000'), true)['results'];

        foreach ($people as $person)
        {
            if( ! in_array($person['name']['first'], $names))
            {
                $names[] = $person['name']['first'];
            }
        }

        for ($i = 0; $i < 3000; $i++)
        {
            $event = new Event();

            $event->setName($eventNames[array_rand($eventNames)]);
            $event->setAggregateId($buildingIds[array_rand($buildingIds)]);
            $event->setAggregateType(Building::class);
            $event->setCreatedAt((new \DateTime())->setTimestamp(rand(strtotime('7 days ago'), time())));
            $event->setCreatedBy('fixtures');
            $event->setPayload(json_encode(['username' => $names[array_rand($names)]]));

            $manager->persist($event);
        }

        $manager->flush();
    }
}