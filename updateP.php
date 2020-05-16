<?php

include_once 'classes/Player.php';
$pl=new Player();
if (isset($_POST['updatePlayerBtn']))
{
    $plyr_name=$_POST['player-name'];
    $id=$_POST['id'];
    if($pl->update_player($plyr_name, $id)){
        header("location:updatePlayer.php?update=$id");
    }
}
?>
