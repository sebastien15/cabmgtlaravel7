<?php
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.escrow-sandbox.com/2017-09-01/transaction',
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_USERPWD => 'ndase15ba@gmail.com:Inyarwanda@01',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode(
        array(
            'currency' => 'usd',
            'items' => array(
                array(
                    'description' => 'johnwick.com',
                    'schedule' => array(
                        array(
                            'payer_customer' => 'me',
                            'amount' => '1000.0',
                            'beneficiary_customer' => 'keanu.reaves@test.escrow.com',
                        ),
                    ),
                    'title' => 'johnwick.com',
                    'inspection_period' => '259200',
                    'type' => 'domain_name',
                    'quantity' => '1',
                ),
            ),
            'description' => 'The sale of johnwick.com',
            'parties' => array(
                array(
                    'customer' => 'me',
                    'role' => 'buyer',
                ),
                array(
                    'customer' => 'keanu.reaves@test.escrow.com',
                    'role' => 'seller',
                ),
            ),
        )
    )
));

$output = curl_exec($curl);
echo $output;
curl_close($curl);
?>