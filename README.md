# Zen Payments SDK

## Installation

Create composer.json file with this content

```
{
    "require": {
        "gumione/zen-sdk": "~1.0.0"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/gumione/zensdk.git"
        }
    ]
}
```
Then run 
```composer install```

## Usage

> An example of using SDK to create a transaction:
```
    use gumione\ZenSdk\Payments\ZenPaymentsSDK;
    use gumione\ZenSdk\DTO\ZenCreateTransactionDTO;
    
    $apiKey = 'your_api_key';
    $zenPayments = new ZenPaymentsSDK($apiKey);
    
    $transactionDTO = new ZenCreateTransactionDTO(
       '23beb187-f8a3-44b8-9ef8-b31180358dd3',
        '123.04',
        'PLN',
        'PCL_CARD',
        [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'john.doe@zen.com',
            'phone' => '+48 000 000 000',
            'ip' => '127.0.0.1',
        ],
        [
            'fingerPrintId' => 'string',
            'referer' => 'http://example.com',
        ],
        [
            'type' => 'onetime',
            'descriptor' => 'Onetime Charge',
            'card' => [
                'number' => '5283126540000007',
                'expiryDate' => '1220',
                'cvv' => '100',
            ],
            'skip3ds' => false,
            'browserDetails' => [
                'acceptHeader' => 'text/html',
                'colorDepth' => '24',
                'javaEnabled' => false,
                'lang' => 'cs',
                'screenHeight' => '560',
                'screenWidth' => '360',
                'timezone' => '-120',
                'windowSize' => '02',
                'userAgent' => 'user agent',
            ],
        ],
        [
            [
                'code' => 'IDS123',
                'category' => 'cars',
                'name' => 'Multipla',
                'price' => '123.04',
                'quantity' => 1,
                'lineAmountTotal' => '123.04',
            ],
        ]
    );
    
    $transaction = $zenPayments->createTransaction($transactionDTO);
```