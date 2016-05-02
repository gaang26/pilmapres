<?php
class SendPulseSender
{
    const SENDER_EMAIL = 'mawapres.dikti@gmail.com';
    const SENDER_NAME = 'Mawapres';

    const API_USER_ID = '9940ea2235cd4d7c18c7cd9590f3c332';
    const API_SECRET = '78e56edccc4f251d528dc4f69251be11';
    const TOKEN_STORAGE = 'session';

    public static function TestEmail(){
        // Begin: proses pengiriman menggunakan sendpulse
		Yii::import('application.extensions.SendPulse.api.sendpulse', true);
        //Yii::import('application.extensions.SendPulse.api.sendpulseInterface', true);
		//$sPubKey = 'bb1928e9215925eec4b5adab79284f71';

        // define( 'API_USER_ID', '327053f88044a4ee3547b0ddbf5ec2dc' );
        // define( 'API_SECRET', '6ba417bf981be87f65e24067512831f9' );
        //
        // define( 'TOKEN_STORAGE', 'session' );

        $SPApiProxy = new SendpulseApi( self::API_USER_ID, self::API_SECRET, self::TOKEN_STORAGE );

        // Send mail using SMTP
        $email = array(
            'html' => '<p>Hello!</p>',
            //'text' => 'text',
            'subject' => '[SENDPULSE][TEST]#02',
            'from' => array(
                'name' => 'No-Reply Bidikmisi',
                'email' => 'helpdesk.bidikmisi@gmail.com'
            ),
            'to' => array(
                array(
                    'email' => 'klicethol@gmail.com'
                )
            )
        );
        var_dump($SPApiProxy->smtpSendMail($email));
		// End: proses pengiriman menggunakan sendpulse
    }

    private function initialize(){
        Yii::import('application.extensions.SendPulse.api.sendpulse', true);

        $SPApiProxy = new SendpulseApi(self::API_USER_ID, self::API_SECRET, self::TOKEN_STORAGE);

        return $SPApiProxy;
    }

    public function sendMail($to,$from,$subject,$message){
        $sender = $this->initialize();

        $email = array(
            'html' => $message,
            'text' => 'text',
            'subject' => $subject,
            'from' => $from,
            'to' => array(
                $to
            )
        );

        return $sender->smtpSendMail($email);
    }
}
