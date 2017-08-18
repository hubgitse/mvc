<?php

namespace app\Lib;

class View
{
    public function renderView($templateName, array $params)
    {
        $params['translator'] = Registry::get('translator');

        extract($params);

        require sprintf(
            '%s/../View/%s.html.php',
            __DIR__,
            $templateName
        );
    }
} 