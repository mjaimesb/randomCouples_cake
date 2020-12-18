<?php
class CoupleR extends AppModel{
    public $useTable = 'couples_rounds';
    public $belongsTo = array('Couple', 'Round');
}