<?php

/*Utilities and other functions for many purposes by Obed Uri*/

class utilities{

    //MSG reporting for errors and others
    function setMsg($type = 'info', $tittle ='Info: ',$message ='', $closable = true, $autoClose = true ){

        if($closable === true){
            $dismissible = 'alert-dismissible';
            $alert_close = "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
        }
        else{
            $alert_close= '';
            $dismissible = '';
        }


        $alert = "
            <div class='alert alert-{$type} auto-alert' {$dismissible}>
                {$alert_close}
                <h4><i class='icon fa fa-info-circle'></i> {$tittle}</h4>
                {$message}
            </div>
        ";

        if($autoClose === true)
            echo "<script>setTimeout(function(){
                $('.auto-alert').hide()
            }, 40000)</script>";

        return $alert;
    }

    //SHA256 DECRYPTION
    function dencrypt( $string, $action = 'e' ) {

        //Secrets
        $secret_key = '$6$rounds=220$SiLeNcEIsGolDeNg0lD3M$';
        $secret_iv = '$6$rounds=220$S3cR3TSR2VK3pT$';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

        if( $action === 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }

        else if( $action === 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }

        return $output;
    }
}