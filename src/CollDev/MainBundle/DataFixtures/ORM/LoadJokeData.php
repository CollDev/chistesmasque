<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\Joke as Joke;

class LoadJokeData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $jokes = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($jokes['Joke'] as $reference => $columns)
        {
            $joke = new Joke();
            $joke->setCategory($manager->merge($this->getReference('Category_' . $columns['category'])));
            $joke->setUser($manager->merge($this->getReference('User_' . $columns['user'])));
            $joke->setPart1($columns['part1']);
            $joke->setPart2($columns['part2']);
            $manager->persist($joke);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Joke_'. $reference, $joke);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'jokes';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 3;
    }
}