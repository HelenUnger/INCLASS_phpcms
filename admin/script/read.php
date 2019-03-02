<?php

    function filterResults($tbl, $tbl_2, $tbl_3, $col, $col_2, $col_3, $filter){
        include('connect.php');

        $queryFilter = 'SELECT * FROM ' .$tbl.' a,';
        $queryFilter .= ' ' .$tbl_2. ' b,';
        $queryFilter .= ' ' .$tbl_3. ' c';
        $queryFilter .= ' WHERE a.'.$col.' = c.' .$col;
        $queryFilter .= ' AND b.'.$col_2.' = c.' .$col_2;
        $queryFilter .= ' AND b.'.$col_3.' = :fltr';

        $runFilter = $pdo->prepare($queryFilter);

        $runFilter->execute(
            array(
                ':fltr'=>$filter
                )
        );

        if($runFilter){
            return $runFilter;
        }else{
            $error = 'there was a problem accessing this information';
            return $error;
        }
    }

    function getSingle($tbl, $col, $id){
        include('connect.php');

        $querySingle = 'SELECT * FROM ' .$tbl;
        $querySingle .= ' WHERE '.$col.' = "' .$id.'"';

        $runSingle = $pdo->query($querySingle);

        if($runSingle){
            return $runSingle;
        }else{
            $error = 'there was a problem accessing this information';
            return $error;
        }
    }

    function getAll($tbl){
        include('connect.php');

        $queryAll = 'SELECT * FROM ' . $tbl;

        $runAll = $pdo->query($queryAll);

        if($runAll){
            return $runAll;
        }else{
            $error = 'there was a problem accessing this information';
            return $error;
        }
    }