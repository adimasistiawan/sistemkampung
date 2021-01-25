<?php
    
function rupiah($harga){
    $RP=  number_format ($harga,0,',','.');
    return $RP;
}

function month($month){
    if($month == 1){
        return "I";
    }
    else if($month == 2){
        return "II";
    }
    else if($month == 3){
        return "III";
    }
    else if($month == 4){
        return "IV";
    }
    else if($month == 5){
        return "V";
    }
    else if($month == 6){
        return "VI";
    }
    else if($month == 7){
        return "VII";
    }
    else if($month == 8){
        return "VIII";
    }
    else if($month == 9){
        return "IX";
    }
    else if($month == 10){
        return "X";
    }
    else if($month == 11){
        return "XI";
    }
    else if($month == 12){
        return "XII";
    }
}
?>