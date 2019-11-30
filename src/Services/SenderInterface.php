<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 6:07
 */

namespace src\Services;


interface SenderInterface
{
    public function send($url);

}