<?php
foreach($data['info'] as $val){
    echo "
        <div id='info'><a onclick='goBack()'>< Back to Previous Page</a></div>
        <div style='position: relative;top: 90px;' class='body'>
            <div class='formClients'>
                <h2 style='margin:0;'>Collocation</h2>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='collocation'  value='".$val['collocation']."' required='required'>
                            <span class='text'>Collocation</span>
                            <span class='line'></span>
                        </div>
                    </div>                    
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='meaning_coll'  value='".$val['meaning_coll']."' required='required'>
                            <span class='text'>Meaning</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox textarea'>
                            <textarea name='example' required='required'>".$val['example']."</textarea>
                            <span class='text'>Example</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <select class='category'>";
                                foreach ($data['topic'] as $tp) {
                                    if($tp['topic'] == $val['topic'])
                                    {
                                        echo "<option value='".$tp['id_topic']."' selected>".$tp['topic']."</option>";                
                                    }
                                    else echo "<option value='".$tp['id_topic']."'>".$tp['topic']."</option>";                
                                }
                            echo "</select>
                            <span class='text'>Topic</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>
                <div class='row100'>
                    <div class='col'>
                        <button class='big-submit' id_save='".$val['id_collo']."' id='save-collo'>Save</button>
                    </div>
                </div>
                <div id='result'>
                    <h2></h2>
                </div>
            </div>
        </div>";
}
?>