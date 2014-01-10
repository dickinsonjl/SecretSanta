<?php
require_once('ss.php');

$mySs = new Ss(5);
$mySs->addSanta('a', 'a@a.com');
$mySs->addSanta('b', 'a@a.com');
$mySs->addSanta('c', 'a@a.com');
$mySs->addSanta('d', 'a@a.com');
$mySs->addSanta('e', 'a@a.com');

$mySs->doHatPick();
$mySs->getRawResult();
?>
