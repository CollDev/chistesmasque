<?php
namespace CollDev\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CollDev\MainBundle\DataFixtures\ORM\LoadCollDevData;
use CollDev\MainBundle\Entity\User as User;

class LoadUserData extends LoadCollDevData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $users = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($users['User'] as $reference => $columns)
        {
            $user = new User();
            $user->setFirstname($columns['firstname']);
            $user->setLastname($columns['lastname']);
            $user->setUsername($columns['username']);
            $user->setUsernameCanonical($columns['username']);
            $user->setEmail($columns['email']);
            $user->setEmailCanonical($columns['email']);
            $user->setPlainPassword($columns['plainpassword']);
            $user->setEnabled($columns['enabled']);
            $user->setBirthday(new \DateTime(date("Y-m-d H:i:s", strtotime($columns['birthday']))));
            $user->setCountry($columns['country']);
            $user->setTimezone($columns['timezone']);
            $manager->persist($user);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('User_'. $reference, $user);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'users';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}