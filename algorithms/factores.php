<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> factors.php
 * @Purpose : to study the functional programming in php
 * @description:Computes the prime factorization of N using brute force.
 * @overview:  Factors of a number
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 01-aug-2019
 *******************************************************************************************************************/
//basic program
$n=readline("enter a number:");
for($i=2;$i<=$n;$i++)
    while($n%$i==0){
        echo $i," ";
        $n=$n/$i;
    }
