<?php
foreach($data['info'] as $val){
    echo "
        <div id='info'><a onclick='goBack()'>< Back to Previous Page</a></div>
        <div style='position: relative;top: 90px;' class='body'>
            <div class='formClients'>
                <h2 style='margin:0;'>Writing task 2</h2>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='title' value='".$val['title']."' required='required'>
                            <span class='text'>Title</span>
                            <span class='line'></span>
                        </div>
                    </div>                                 
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='band' value='".$val['band']."' required='required'>
                            <span class='text'>Band</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>            
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox textarea'>
                            <textarea name='content_essay' required='required'>".$val['content_essay']."</textarea>
                            <span class='text'>Essay</span>
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
                        <button class='big-submit' id_save='".$val['id_essay']."' id='save-wrt2'>Save</button>
                    </div>
                </div>
                <div id='result'>
                    <h2></h2>
                </div>
            </div>
        </div>";
}
?>