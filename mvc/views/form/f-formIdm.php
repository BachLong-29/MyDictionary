
<?php 
function show_message()
{
    $idm= '
    <div class="formClients">
        <h2>New Idiom</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="idiom" required="required">
                    <span class="text">Idiom</span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col">
                <div class="inputBox">
                    <select class="band"> 
                        <option>-----None-----</option>                   
                        <option>B1</option>
                        <option>B2</option>                        
                        <option>C1</option>
                        <option>C2</option>                        
                    </select>
                    <span class="text">Band</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="meaning_idm" required="required">
                    <span class="text">Meaning</span>
                    <span class="line"></span>
                </div>
            </div>            
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox textarea">
                    <textarea name="example" required="required"></textarea>
                    <span class="text">Example</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>';
    return $idm;
}
?>