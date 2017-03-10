<html>
    <head>
        <title>Login to barnacle.com</title>
    </head>
    <body>
        <?php
        if (isset($this->error) && $this->error != NULL) {
        ?>
        <p <? php echo $show;?> ><?php echo $this->error; ?> </p> 
        <?php
        }
        ?>
        <form action="<?php $this->action; ?>" method="<?php echo $this->method; ?>">
            <input type="email" name="u_email" placeholder="Your Email Here" required/>
            <input type="password" name="u_password" placeholder="********" required/>
            <input type="submit" name="login_submit" value="Login" />
        </form>
    </body>
</html>


