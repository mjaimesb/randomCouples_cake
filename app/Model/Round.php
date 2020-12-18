<?php
class Round extends AppModel{
    public $hasAndBelongsToMany = array('Couple');
    public $hasMany = array('CoupleR');
}