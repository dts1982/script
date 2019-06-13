<?php
include 'people.php';
include 'functions.php';

$people[] = new people();
$people[0]=createObject(1, "Maria", 26, "Recepcionista", "2017-01-27", "Empresa A");
$people[1]=createObject(2, "Thiago", 30, "Técnico", "2018-06-04", "Empresa B");
$people[2]=createObject(3, "Roberto", 24, "Técnico", "2013-02-14", "Empresa B");
$people[3]=createObject(4, "Andreia", 32, "Gerente", "2015-02-01", "Empresa A");
$people[4]=createObject(5, "Jeferson", 35, "Gestor", "2011-08-03", "Empresa A");
$people[5]=createObject(6, "Alberto", 35, "Gestor", "2018-03-03", "Empresa B");


$people=orderByMonth($people);
 
foreach($people as $person){
    echo date("F",strtotime($person->date))."-".$person->name."<br/>";
}