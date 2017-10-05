<?php

abstract class LabyrintheDefaut{
    protected static function getConnexion(){
        return new PDO('mysql:unix_socket=/tmp/mysql.sock;dbname=labyrinthe',"root","far2017");
    }
}