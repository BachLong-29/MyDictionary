<?php
$class = array('-----None-----','Noun','Verb','Adjective','Adverb','Sentence');
$band = array('-----None-----','B1','B2','C1','C2');
foreach($data['info'] as $val){
    echo "
        <div id='info'><a onclick='goBack()'>< Back to Previous Page</a></div>
        <div style='position: relative;top: 90px;' class='body'>
            <div class='formClients'>
                <h2 style='margin:0;'>Vocabulary</h2>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='vocab'  value='".$val['vocab']."' required='required'>
                            <span class='text'>Vocabulary</span>
                            <span class='line'></span>
                        </div>
                    </div>
                    <div class='col'>
                        <div class='inputBox'>
                            <select class='classifier'>";
                            for ($i = 0; $i < 6; $i++){
                                if($class[$i]==$val['classifier']) echo "<option selected>".$class[$i]."</option>";                                
                                else echo "<option>".$class[$i]."</option>";
                            }                                                                                                                                                  
                            echo "</select>
                            <span class='text'>Classifier</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>                            
                            <input type='text' name='synonym'  value='".$val['synonym']."' required='required'>
                            <span class='text'>Synonym</span>
                            <span class='line'></span>
                        </div>
                    </div>
                    <div class='col'>
                        <div class='inputBox'>
                            <select class='band'>";
                            for ($i = 0; $i < 5; $i++){
                                if($band[$i]==$val['band']) echo "<option selected>".$band[$i]."</option>";                                
                                else echo "<option>".$band[$i]."</option>";
                            }                                                                                                                                                  
                            echo "</select>
                            <span class='text'>Band</span>
                            <span class='line'></span>
                        </div>
                    </div>
                </div>
                <div class='row100'>
                    <div class='col'>
                        <div class='inputBox'>
                            <input type='text' name='mean_vocab'  value='".$val['mean_vocab']."' required='required'>
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
                        <button class='big-submit' id_save='".$val['id_vocab']."' id='save-vocab'>Save</button>
                    </div>
                </div>
                <div id='result'>
                    <h2></h2>
                </div>
            </div>
        </div>";
}
?>