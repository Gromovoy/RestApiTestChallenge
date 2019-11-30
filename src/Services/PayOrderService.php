<?php
/**
 * Created by PhpStorm.
 * User: MiPro
 * Date: 30.11.2019
 * Time: 5:57
 */

namespace src\Services;

use src\Entity\Order\OrderInterface;


class PayOrderService
{

    protected $sender;
    public function __construct(SenderInterface $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return SenderInterface
     */
    public function getSender(): SenderInterface
    {
        return $this->sender;
    }



    public function pay(OrderInterface $order,$sum,$url){

        if ($order->getSum()==$sum){

            $sender = $this->getSender();
            $sender->send($url);

        }
    }

}