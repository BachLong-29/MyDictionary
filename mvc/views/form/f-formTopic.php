<?php 
function show_message()
{
    $tp= '    
    <div class="formClients">
        <h2>New Topic</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="topic" required="required">
                    <span class="text">Topic</span>
                    <span class="line"></span>
                </div>
            </div>                        
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">                                        
                    <span class="text">Image</span>                    
                </div>      
                <div class="col-chart">
                    <div class="upload">
                        <div class="image">
                            <img id="img-chart" src="">
                        </div>
                        <div class="content">
                            <div class="icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="text">No file chosen, yet!</div>
                        </div>                        
                    </div>
                    <label class="custom-file-upload">
                        <input id="Img" type="file" name="img" accept="image/*"> choose a file
                    </label>
                </div>          
            </div>   
        </div>';
    return $tp;
}
?>