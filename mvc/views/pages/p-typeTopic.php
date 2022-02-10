<?php
    echo '<div id="back"><a onclick="goBack()">< Back to Previous Page</a></div>';
    echo '<div class="title"><h2>Select all</h2></div>';
    echo '<ul>';
    foreach ($data['type'] as $val) {            
        echo '<li><div class="row"><div id_more="'.$val[$data['id-type']].'" class="col-sm-10"><strong class="'.$data['more-type'].'">'.$val[$data['s-type']].'</strong></div>';
        echo '<div class="col-sm-2">';
        echo '<a href="'.BASEURL.'/'.$data['controller'].'/'.$data['function'].'/'.$val[$data['id-type']].'"><button class="big-button">Modify</button></a></div></div></li>';
    }    
    echo '</ul>';    
?>