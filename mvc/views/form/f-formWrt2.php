<?php 
function show_message()
{
    $wrt2= '
    <div class="formClients">
        <h2>New Writing Task 2</h2>
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
                <div class="inputBox essay">
                    <textarea name="essay" required="required"></textarea>
                    <span class="text">Essay</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>';
    return $wrt2;
}
?>