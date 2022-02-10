<?php
foreach($data['info'] as $val){
    echo "
        <div id='info'><a onclick='goBack()'>< Back to Previous Page</a></div>
        <div style='position: relative;top: 90px;' class='body'>
            <div class='formClients'>
                <h2 style='margin:0;'>Topic</h2>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='topic' value='".$val['topic']."' required='required'>
                            <span class='text'>Topic</span>
                            <span class='line'></span>
                        </div>
                    </div>                                 
                </div>                
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>                                        
                            <span class='text'>Image</span>                    
                        </div>      
                        <div class='col-chart'>
                            <div class='upload'>
                                <div class='image'>
                                    <img id='img-chart' src='".$val['img']."'>
                                </div>
                                <div class='content'>
                                    <div class='icon'>
                                        <i class='fas fa-cloud-upload-alt'></i>
                                    </div>
                                    <div class='text'>No file chosen, yet!</div>
                                </div>                        
                            </div>
                            <label class='custom-file-upload'>
                                <input id='Img' type='file' name='p_chart' accept='image/*'> choose a file
                            </label>
                        </div>          
                    </div>   
                </div>                
                <div class='row100'>
                    <div class='col'>
                        <button class='big-submit' id_save='".$val['id_topic']."' id='save-tp'>Save</button>
                    </div>
                </div>
                <div id='result'>
                    <h2></h2>
                </div>
            </div>
        </div>";
}
?>