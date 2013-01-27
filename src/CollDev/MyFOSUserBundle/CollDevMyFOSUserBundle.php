<?php

namespace CollDev\MyFOSUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CollDevMyFOSUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
