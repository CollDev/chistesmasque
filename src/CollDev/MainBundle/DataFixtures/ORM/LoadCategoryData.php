<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\Category as Category;

class LoadCategoryData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $categorys = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($categorys['Category'] as $reference => $columns)
        {
            $category = new Category();
            $category->setName($columns['name']);
            $manager->persist($category);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Category_'. $reference, $category);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'categories';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}