  <html>
    <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="http://designs-barnacle.azurewebsites.net/styles/landing.css">
      <title>Welcome to barnacle. This is My landing Page </title>
    </head>
   
    <body>
      <div class="container" id="container">
        <div class="leftmargin">
           <div class="wrap">
              <div class="both">
                  <div class="circle" id="circle">
                     <a href="#home_div" id ="home_r" class="icon i1 icon-home" onclick="rotateFunction(this.id)">Home</a>
                     <a href="#login_div" id = "login_r" class="icon i2 icon-login" onclick="rotateFunction(this.id)">Login</a>
                     <a href="#about_div" id = "about_r" class="icon i3 icon-about" onclick="rotateFunction(this.id)">About</a>
                     <a href="#register_div" id = "register_r" class="icon i4 icon-resister" onclick="rotateFunction(this.id)">Register</a>
                      <div class="center-circle"></div>
                      <span class="text"></span>
                  </div>
                  <!--ENd of circle div-->
              </div>
              <!--End of both div-->
          </div>
          <!--End of wrap div-->
        </div>
        <!--End of Left margin-->

        <div class="rightmargin">
          <div id="home_div" style="display:  none;">
            <div class="home-screen">
              <div class="app-title">
                  <h1>home</h1>
              </div>
            </div>
          </div>
          <!--End of home div-->
           <div id="login_div" style="display: none;">
            <div class="login">
              <div class="login-screen">
                <div class="app-title">
                  <h1>Login</h1>
                </div>

                <div class="login-form">
                  <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="username" id="login-name">
                  <label class="login-field-icon fui-user" for="login-name"></label>
                  </div>

                  <div class="control-group">
                  <input type="password" class="login-field" value="" placeholder="password" id="login-pass">
                  <label class="login-field-icon fui-lock" for="login-pass"></label>
                  </div>

                  <a class="btn btn-primary btn-large btn-block" href="#">login</a>
                  <a class="login-link" href="#">Lost your password?</a>
                </div>
                  <!-- End of Login-form-->
              </div>
            </div>
          </div>
          <!--End of login div-->
           <div id="about_div" style="display: none;">
            <div class="about-screen">
              <div class="app-title">
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
                <h1>About</h1>
              </div>
            </div> 
           </div>
           <!--End of about-div-->

           <div id="register_div" style="display: none;">
            <div class="register-screen" id="register-screen">
              <div class="app-title">
                <h1>Register</h1>
              </div>
              <!--End id app-title-->
              <div class="register-form">

                <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="firstname" id="login-name">
                  <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="lastname" id="login-name">
                </div>
                <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="Email" id="login-name">
                </div>
                <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="password" id="login-name">
                </div>
                <div class="control-group">
                  <input type="text" class="login-field" value="" placeholder="confirm password" id="login-name">
                </div>
                <a class="btn btn-primary btn-large btn-block" href="#">register</a>

              </div>
              <!--End of register-form-->
            </div>
            <!--End of register-screen div-->
           </div>
           <!--End of register div-->
        </div>
        <!--End of right margin-->
      </div>
      <!--End of container div-->
    </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="http://designs-barnacle.azurewebsites.net/script/main.js"></script>
  <!--document.getElementById(content_array[calculate_count/90]).style.animation="mymove 3s ease forwards";-->
  </html>