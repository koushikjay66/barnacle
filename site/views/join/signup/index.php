<div class="signup_form">
    <p id="error"></p>
    <form action="<?php echo $this->action; ?>" method="<?php echo $this->method;?>">
        <input type="text" name="f_name" placeholder="First Name" required>
        <input type="text" name="l_name" placeholder="Last Name" required>
        <input type="user_name" name="u_user_name" placeholder="someone@domain.com" required>
        <input type="text" name="u_name" placeholder="someone2016" onfocusout="check_user_name(this)" required>
        <input type="password" name="u_password" placeholder="**********">
        <input type="submit" name="signup" value="Signup">
    </form>
</div>