<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\Country as Country;

class LoadCountryData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $countrys = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($countrys['Country'] as $reference => $columns)
        {
            $country = new Country();
            $country->setContinent($manager->merge($this->getReference('Continent_' . $columns['continent'])));
            $country->setName($columns['name']);
            $country->setCode($columns['code']);
            $manager->persist($country);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Country_'. $reference, $country);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'countries';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}