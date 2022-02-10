
<?php 
function show_message()
{
    $vocab= '
    <div class="formClients">
        <h2>New Vocabulary</h2>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    <input type="text" name="vocab" required="required">
                    <span class="text">Vocabulary</span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col">
                <div class="inputBox">
                    <select class="classifier"> 
                        <option>-----None-----</option>                   
                        <option>Noun</option>
                        <option>Verb</option>                        
                        <option>Adjective</option>
                        <option>Adverb</option>
                        <option>Sentence</option>                        
                    </select>
                    <span class="text">Classifier</span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="row100">
            <div class="col">
                <div class="inputBox">
                    
                    <input type="text" name="synonym" required="required">
                    <span class="text">Synonym</span>
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
                    <input type="text" name="mean_vocab" required="required">
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
    return $vocab;
}
?>