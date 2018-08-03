<?php

if(@file_exists('progress.txt')){
    echo file_get_contents('progress.txt');
}else{
    echo 0;
}