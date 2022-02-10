<?php
    echo '<div id="back"><a onclick="goBack()">< Back to Previous Page</a></div>';
    echo '<div class="title"><h2>Select all</h2></div>';
    echo '<ul>';
    foreach ($data['vocab'] as $val) {            
        echo '<li><div class="row"><div id_more="'.$val['id_vocab'].'" class="col-sm-10"><strong class="more-vocab">'.$val['vocab'].'</strong></div>';
        echo '<div class="col-sm-2">';
        echo '<a href="'.BASEURL.'/vocabulary/infoVocab/'.$val['id_vocab'].'"><button class="big-button">Modify</button></a></div></div></li>';
    }
    foreach ($data['collo'] as $val) {            
        echo '<li><div class="row"><div id_more="'.$val['id_collo'].'" class="col-sm-10"><strong class="more-collo">'.$val['collocation'].'</strong></div>';
        echo '<div class="col-sm-2">';
        echo '<a href="'.BASEURL.'/collocation/infoCollo/'.$val['id_collo'].'"><button class="big-button">Modify</button></a></div></div></li>';
    }
    foreach ($data['idm'] as $val) {            
        echo '<li><div class="row"><div id_more="'.$val['id_idm'].'" class="col-sm-10"><strong class="more-idm">'.$val['idiom'].'</strong></div>';
        echo '<div class="col-sm-2">';
        echo '<a href="'.BASEURL.'/idiom/infoIdm/'.$val['id_idm'].'"><button class="big-button">Modify</button></a></div></div></li>';
    }
    echo '</ul>';    
?>