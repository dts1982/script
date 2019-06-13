<?php 
function createObject( $id, $name, $age, $job, $date, $company){
   $object=new people();

    $object->id=$id;
    $object->name=$name;
    $object->age=$age;
    $object->job=$job;
    $object->date= $date;
    $object->company=$company;

    return $object;
}

function cmp($a, $b)
{
    return strcmp($a->date, $b->date);
}
function cmpmonth($a, $b){
    $monthA=date("n",strtotime($a->date));
    $monthB=date("n",strtotime($b->date));
    return strcmp($monthA, $monthB);
}

function OrderByDate($people){
    usort($people, "cmp");
    return $people;
}
function orderByMonth($people)
{
    usort($people, "cmpmonth");
    return $people;
}
function groupByJob($people)
{
    $jobs=[];
    foreach($people as $person){
        if(array_search($person->job, $jobs)==0){
            $array= array_search($person->job, $people);
            array_push($jobs, $person->job);
        }
        

    }
}