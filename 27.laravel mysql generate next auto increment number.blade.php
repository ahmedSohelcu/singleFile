========================================================================================
Laravel MYSQL generate next auto-increment id 
========================================================================================
$query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'leaves'"));
        $query= $query[0]->Auto_increment;
        dd($query);