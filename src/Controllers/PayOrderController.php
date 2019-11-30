<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 5:53
 */

namespace src\Controllers;

use src\Services\{PayOrderService,ServiceSender};


class PayOrderController
{

    const siteUrl = 'http://ya.ru';
    public function create($orderId,$sum){
        $sender = new ServiceSender();
        $payOrderService = new PayOrderService($sender);
        $payOrderService->pay()
    }

}