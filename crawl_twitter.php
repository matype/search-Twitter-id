#!/usr/bin/php
<?php

$pattern = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n",
        "o","p","q","r","s","t","u","v","w","x","y","z",
        "1","2","3","4","5","6","7","8","9","0","_");

$threemoji = array("e", "f","g", "h");

$count2 = 0;
foreach ($pattern as $p1) {
    foreach ($pattern as $p2) {
        $url = "http://twitter.com/$p1$p2";
        $res = file_get_contents($url);
        sleep(0.5);

        echo $url; echo PHP_EOL;
        if (!$res) {
            echo "「 $p1$p2 」is empty!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";echo PHP_EOL;
            $count2++;
        } else {
            echo "「 $p1$p2 」is used";echo PHP_EOL;
        }
    }
}
if (!$count2) echo "there are no 2 characters account i can use";
$count3 = 0;
$available = array();
foreach ($threemoji as $p1) {
    foreach ($pattern as $p2) {
        foreach ($pattern as $p3) {
            $url = "http://twitter.com/$p1$p2$p3";
            $res = file_get_contents($url);
            //sleep(1);
            if (!$res) {
                echo "「 $p1$p2$p3 」is empty!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";echo PHP_EOL;
                $count3++;
                $available[] = "$p1"+"$p2"+"$p3";
            } else {
                echo "「 $p1$p2$p3 」is used";echo PHP_EOL;
            }
        }
        sleep(3);
    }
}
if (!$count3) {
    echo "there are no 3 characters account i can use";
} else {
    foreach ($available as $a) {
        echo "you can use $a !!!!!!"; echo PHP_EOL;
    }
}
