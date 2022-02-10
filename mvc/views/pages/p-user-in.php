<div class="imgBx">
    <img src="./public/images/blue-eye.png">
</div>
<div class="formBx">
    <form action="<?php echo BASEURL?>/User/login" method="POST">
        <h2>Sign in</h2>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button class="submit-signin">Sign Up</button>        
        <p class="signup">Don't have an account ? <a onclick="toggleForm();">Sign in.</a></p>
        <h3 id="login-result"></h3>
    </form>
</div>            