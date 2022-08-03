<?php 
$yourEmail = "pankajmobapps@gmail.com";
$yourEmailPassword = "Found2014";

//$mailbox = imap_open("{imap.gmail.com:993/ssl}INBOX", $yourEmail, $yourEmailPassword);
$mailbox = imap_open('{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX', $yourEmail, $yourEmailPassword) or die('Cannot connect to Gmail: ' . imap_last_error());
$mail = imap_search($mailbox, "ALL");
$mail_headers = imap_headerinfo($mailbox, $mail[0]);
$subject = $mail_headers->subject;
$from = $mail_headers->fromaddress;
imap_setflag_full($mailbox, $mail[0], "\\Seen \\Flagged");
imap_close($mailbox);