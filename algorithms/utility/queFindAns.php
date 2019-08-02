<?php
/*
checking whether the given no is power of two or not
*/
function ispowerOfTwo($n){
    try{
    return (log($n, 2) == (int) log($n, 2));
    }catch(Exception $e){
        echo $e;
    }
}
/*
program to guess the no which is always divides by two until the first equals to last
*/

function que($f,$l){
    try{
    if($f==$l) echo "your guessed number is ".$f;
    else{
        $mid=(int)(($f+$l)/2);
        $n=readline("enter if (".$f." - ".$mid.")-->0  or  (".($mid+1)." - ".$l.")-->1  ::\n");
        if($n==0) $l=$mid;
        else $f=$mid+1;
        que($f,$l);
    }
} catch (Exception $e) {
        echo $e;
    }
}
function queFindAns($n){
    que(0, $n - 1);
}