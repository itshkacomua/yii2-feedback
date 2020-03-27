<?php

namespace itshkacomua\feedback;

/**
 * feedback module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'itshkacomua\feedback\controllers';
    public $defaultRoute = 'feed-back';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
