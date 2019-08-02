<?php

/********************************************************************************************************************
 * @Execution : default node : cmd> queFindAnsMain.php
 * @Purpose : to study the algorithm programming in php
 * @description: takes a command-line argument N, asks you to think of a number between 0 and N-1,
 *               where N = 2^n, and always guesses the answer with n questions.
 * @overview:  5.Question to find your number
 * @author : yathin k <yathink3@gmail.com>
 * @version : 1.0
 * @since : 02-july-2019
 *******************************************************************************************************************/
//include quetofindans 
include('./utility/queFindAns.php');
//taking user input
$n = readline('enter a number which is power of 2:');
//checking whether entered no is power of two or not
if (ispowerOfTwo($n)) queFindAns($n);
else echo "entered number is not a power of 2";
