<?php

namespace SGT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SGTUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
