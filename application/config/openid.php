<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['openid_storepath'] = 'tmp';
$config['openid_policy'] = 'googlelogin/policy';
$config['openid_required'] = array('nickname');
$config['openid_optional'] = array('fullname', 'email');
$config['openid_request_to'] = 'googlelogin/check';

?>