<?php
/**
 * Created by PhpStorm.
 * User: zabachok
 * Date: 30.04.17
 * Time: 12:08
 */

namespace zabachok\vega;


class Module extends \yii\base\Module
{

    public $controllerNamespace = 'zabachok\vega\controllers';
    public $db          = 'db';
    public $usernameCallback;

    public function init()
    {
        if (is_null($this->usernameCallback))
        {
            $this->usernameCallback = function ($user_id) { return $user_id; };
        }
    }
}