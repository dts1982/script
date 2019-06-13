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
        $quantity=[];
        $alljobs=[];

        foreach($people as $person){
            array_push($alljobs, $person->job);
        }
        foreach($people as $person){
            if(array_search($person->job, $jobs)==""){
                $array= count_repeat_values($person->job, $alljobs);
                array_push($jobs, $person->job);
                array_push($quantity, $array);
            }
        }
        $all=[
            'job'=>$jobs,
            'qtd'=>$quantity
        ];
        return $all;
    }

    function count_repeat_values($needle, $haystack){
    
        $x = count($haystack);
    
        for($i = 0; $i < $x; $i++){
        
            if($haystack[$i] == $needle){
                $needle_array[] = $haystack[$i];
            }
        }
    
        $number_of_instances = count($needle_array);
    
        return $number_of_instances;
    }