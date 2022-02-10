<div id="head" class="row">
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <a href="<?php echo BASEURL?>/vocabulary/allvocabs">Vocabulary</a>
            <a href="<?php echo BASEURL?>/collocation/allcollos">Collocation</a>
            <a href="<?php echo BASEURL?>/idiom/allidioms">Idiom</a>
            <a href="<?php echo BASEURL?>/writing1/allfiles">Writing Task 1</a>
            <a href="<?php echo BASEURL?>/writing2/allfiles">Writing Task 2</a>
            <a href="<?php echo BASEURL?>/topic/alltopics">Topic</a>
            <a href="<?php echo BASEURL?>/vocabulary/form">Import</a>
        </div>
    </div>
    <span class="menu" onclick="openNav()">&#9776;</span>
    <div class="wrapper">
        <div class="search_box">
            <div class="dropdown">
                <div class="default_option">Vocabulary</div>
                    <ul> 
                        <li>Vocabulary</li>
                        <li>Collocation</li>
                        <li>Idiom</li>
                        <li>Synomym</li>                        
                    </ul>
            </div>
            <div class="search_field">
                <input type="text" class="input" placeholder="Search">                
                <a href=""><i class="fas fa-search"></i></a>              
            </div>
        </div>
    </div>
    <div class="avatar">
        <div class="ava_funct">
            <div class="dropdown_1">
                <div class="default_option_1" >
                    <i class="fas fa-user-circle"></i>
                    <?php if($this->getSession('Account'))
                        echo "<span>".$this->getSession('Account')."</span>";
                      else echo "Tài khoản"; ?>
                </div>
                <ul>                                     
                    <li><a href="<?php echo BASEURL?>/user/signup"><i class="fas fa-user-plus"></i>    Create Account</a></li>
                    <li><a href="<?php echo BASEURL?>/user/signout"><i class="fas fa-sign-out-alt"></i>    Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div> 