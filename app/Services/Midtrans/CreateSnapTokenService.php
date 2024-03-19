<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;

    public function __construct($order)
    {
        parent::__construct();

        $this->order = $order;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                // 'order_id' => $this->order->number,
                // 'gross_amount' => $this->order->total_price,
                'order_id' => 1,
                'gross_amount' => 12000,
            ],
            'item_details' => [
                [
                    'id' => 1,
                    'price' => '53700000',
                    'quantity' => 1,
                    'name' => 'Hanging Lamp',
                ],
            ],
            'customer_details' => [
                'first_name' => 'Aslan Asilon',
                'email' => 'aslanasilon@gmail.com',
                'phone' => '09123456789',
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
