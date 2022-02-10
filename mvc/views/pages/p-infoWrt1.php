<?php
foreach($data['info'] as $val){
    echo "
        <div id='info'><a onclick='goBack()'>< Back to Previous Page</a></div>
        <div style='position: relative;top: 90px;' class='body'>
            <div class='formClients'>
                <h2 style='margin:0;'>Idiom</h2>
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
                        <div class='inputBox'>                                        
                            <span class='text'>Chart</span>                    
                        </div>      
                        <div class='col-chart'>
                            <div class='upload'>
                                <div class='image'>
                                    <img id='img-chart' src='".$val['p_chart']."'>
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
                        <div class='inputBox textarea'>
                            <textarea name='content_rep' required='required'>".$val['content_rep']."</textarea>
                            <span class='text'>Report</span>
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
                        <button class='big-submit' id_save='".$val['id_report']."' id='save-wrt1'>Save</button>
                    </div>
                </div>
                <div id='result'>
                    <h2></h2>
                </div>
            </div>
        </div>";
}
?>