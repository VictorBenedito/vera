<?php
ini_set('max_execution_time', '3600');

if(@file_exists('progress.txt')){
    @unlink('progress.txt');
}

for($i = 0; $i <= 100; $i += 20){
    sleep(3);
    file_put_contents('progress.txt', $i);
}
echo 'Terminou!';