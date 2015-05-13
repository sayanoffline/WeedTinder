<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php

function create_guid() {
    $microTime = microtime();
    list($a_dec, $a_sec) = explode(" ", $microTime);
    $dec_hex = dechex($a_dec * 1000000);
    $sec_hex = dechex($a_sec);
    ensure_length($dec_hex, 5);
    ensure_length($sec_hex, 6);
    $guid = "";
    $guid .= $dec_hex;
    $guid .= create_guid_section(3);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= create_guid_section(4);
    $guid .= '-';
    $guid .= $sec_hex;
    $guid .= create_guid_section(6);
    return $guid;
}
function ensure_length(&$string, $length) {
    $strlen = strlen($string);
    if ($strlen < $length) {
        $string = str_pad($string, $length, "0");
    } else if ($strlen > $length) {
        $string = substr($string, 0, $length);
    }
}

function create_guid_section($characters) {
    $return = "";
    for ($i = 0; $i < $characters; $i++) {
        $return .= dechex(mt_rand(0, 15));
    }
    return $return;
}

function authenticate() {
    $CI = & get_instance();
    $current_userId=$CI->session->userdata("userId");
    $current_userEmail=$CI->session->userdata("userEmail");
    if (empty($current_userId) && empty($current_userEmail)) {
        echo "<script>window.parent.location.href='".$CI->config->item('base_url')."index.php/admin'</script>";
    }
        
}

function front_authenticate() {
    $CI = & get_instance();
    $current_userId=$CI->session->userdata("user_id");
    $current_userName=$CI->session->userdata("userName");
    if (empty($current_userId) || empty($current_userName)) {
        echo "<script>window.parent.location.href='".$CI->config->item('base_url')."index.php/home/registration'</script>";
    }
        
}




        
function send_mail($to_email, $form_name, $form_email, $subject, $message, $bcc='') {

        /* To send HTML mail, you can set the Content-type header. */

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: ". $form_name ."<".$form_email."> \r\n";
        if ($bcc != "")
        $headers .= "Bcc: ".$bcc."\n";
        $output = $message; $output = wordwrap($output, 72);
        return(mail($to_email, $subject, $output, $headers));

}      

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}

function generate_password( $length = 6 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321";
$password = substr( str_shuffle( $chars ), 0, $length );
return $password;
}

function randomNumber() {
    $alphabet = "012345678909876543210";
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}
function arrayToJSON($arr)
{	
if(count($arr) > 0)
{		
for($i=0; $i<count($arr); $i++)
{
$data = @unserialize($arr[$i]);
if($data !== false )
{
$arr[$i] = unserialize($arr[$i]);	
}	
}
}
return json_encode($arr);
}

?>
