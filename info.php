<?php

$comando_uptime = exec('uptime | tr -s " "');

//------------CPU-------------
preg_match('/(?<=up\s)(.*?)(?=,\s\d\suser)/', $comando_uptime, $uptime);
preg_match('/(?<=age:\s)\d+\.\d{2}/', $comando_uptime, $load);

unset($comando_uptime);

//------------RAM------------
preg_match_all('/\d+/', shell_exec('free -o | tr -s " "'), $ram);

echo json_encode(array($uptime[0],round($load[0]),round((($ram[0][1]-$ram[0][5])/$ram[0][0])*100)));

?>
