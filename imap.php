<?php
//$gmailURL = "{imap-mail.outlook.com:993/imap/tls/novalidate-cert}Inbox";
//
//$username = 'itcyborg@outlook.com';
//$password = 'vitamilk33924';
//
//$inbox = imap_open($gmailURL,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
//$emails = imap_search($inbox,'ALL');

$file = fopen(dirname(__FILE__) . '/test.txt', 'a');
fwrite($file, time() . PHP_EOL);
fclose($file);
exit(0);