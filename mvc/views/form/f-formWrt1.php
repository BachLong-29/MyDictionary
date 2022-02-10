<?php 
function show_message()
{
    $wrt1= '    
    <div class="formClients">
        <h2>New Writing Task 1</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="title" required="required">
                    <span class="text">Title</span>
                    <span class="line"></span>
                </div>
            </div>                        
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="band" required="required">
                    <span class="text">Band</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">                                        
                    <span class="text">Chart</span>                    
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
                        <input id="Img" type="file" name="p_chart" accept="image/*"> choose a file
                    </label>
                </div>          
            </div>   
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox essay">
                    <textarea name="report" required="required"></textarea>
                    <span class="text">Report</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>';
    return $wrt1;
}
?>