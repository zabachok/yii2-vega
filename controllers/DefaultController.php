<?php
/**
 * Created by PhpStorm.
 * User: zabachok
 * Date: 30.04.17
 * Time: 12:16
 */

namespace zabachok\vega\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}