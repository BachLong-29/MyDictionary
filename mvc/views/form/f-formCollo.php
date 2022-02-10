
<?php 
function show_message()
{
    $collo= '
    <div class="formClients">
        <h2>New Collocation</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="collocation" required="required">
                    <span class="text">Collocation</span>
                    <span class="line"></span>
                </div>
            </div>                        
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="meaning_coll" required="required">
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
    return $collo;
}
?>