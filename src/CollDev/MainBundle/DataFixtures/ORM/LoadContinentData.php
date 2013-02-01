<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\Continent as Continent;

class LoadContinentData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $continents = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($continents['Continent'] as $reference => $columns)
        {
            $continent = new Continent();
            $continent->setName($columns['name']);
            $manager->persist($continent);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Continent_'. $reference, $continent);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'continents';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}