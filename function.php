<?php

function readRando($db)
{
    $array = [];
    $stm = $db->prepare("SELECT * FROM hiking");
    if ($stm->execute()) {
        foreach ($stm->fetchAll() as $rando) {
            $array[$rando['id']] = [
                'name' => $rando['name'], 'difficulty' => $rando['difficulty'], 'distance' => $rando['distance'],
                'duration' => $rando['duration'], 'height_difference' => $rando['height_difference']];
        }
    }
    return $array;
}