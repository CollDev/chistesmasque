<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\Restriction as Restriction;

class LoadUserData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $restrictions = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($restrictions['Restriction'] as $reference => $columns)
        {
            $restriction = new Restriction();
            $restriction->setName($columns['name']);
            $manager->persist($restriction);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Restriction_'. $reference, $restriction);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'restrictions';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}