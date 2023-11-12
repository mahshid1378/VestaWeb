<?php

/** 
*
* Vesta Web Interface
*
* Copyright (C) 2020 Carter Roeser <carter@cdgtech.one>
* https://cdgco.github.io/VestaWebInterface
*
* Vesta Web Interface is free software: you can redistribute it and/or modify
* it under the terms of version 3 of the GNU General Public License as published 
* by the Free Software Foundation.
*
* Vesta Web Interface is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with Vesta Web Interface.  If not, see
* <https://github.com/cdgco/VestaWebInterface/blob/master/LICENSE>.
*
*/

include($configlocation . "version.php");

$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_URL => "https://api.github.com/repos/cdgco/VestaWebInterface/releases/latest",
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
    CURLOPT_CUSTOMREQUEST => "GET"
));

$data = curl_exec($ch);
curl_close($ch);
$data2 = json_decode($data, true);

$ghversion = $data2['tag_name'];

$ghsimplified = preg_replace("/[^0-9]/", "", $ghversion );
$currentsimplified = preg_replace("/[^0-9]/", "", $currentversion );

if (isset($ghversion) && $ghversion != '') {
    if ($ghversion <= $currentversion) { echo $currentversion; } 
    elseif ( $ghsimplified[0] > $currentsimplified[0] || $ghsimplified[1] > $currentsimplified[1] ) {echo '<a href="https://github.com/cdgco/VestaWebInterface/releases" style="text-decoration: underline;" data-toggle="tooltip" title="' . $ghversion . ' Now Available!">' . $currentversion . ' (Outdated)</a>';}
    else {echo '<a href="https://github.com/cdgco/VestaWebInterface/releases" style="text-decoration: underline;" data-toggle="tooltip" title="' . $ghversion . ' Now Available!">' . $currentversion . '</a>';}
} 
else { echo $currentversion;}

?>
