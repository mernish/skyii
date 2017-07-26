<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=skyii',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',

            /**
             * Sends all mails to a file by default. Set 'useFileTransport' to false
             * and configure the transport for the mailer to send real emails.
             *
             */
            'useFileTransport' => true,

            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'smtp_username',
                'password' => 'smtp_password',
                'port' => '587', //'465',
                'encryption' => 'tls',
            ],
        ],
    ],
];
