<div class="signup_form">
    <p id="error"></p>
    <form action="#" method="POST">
        <input type="text" name="f_name" placeholder="First Name" required>
        <input type="text" name="l_name" placeholder="Last Name" required>
        <input type="user_name" name="u_user_name" placeholder="someone@domain.com" onfocusout="check_user_email(this)"required>
        <input type="text" name="u_name" placeholder="someone2016" onfocusout="check_user_name(this)" required>
        <input type="password" name="u_password" placeholder="**********">
        <input type="submit" name="form_id_here" value="Signup" onsubmit="return form_submission(this)">
    </form>
</div>


<script>
    var base_URL = "http://localhost/barnacle/site";

    var user_mail = "false";
    var user_name = "false";

    function check_user_email(obj) {
        var user_name = obj.value;
        if (user_name !== null || user_name !== "") {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    user_mail = this.responseText;
                    if (user_mail === "false") {
                        document.getElementById("error").innerHTML = "This Email is already taken";
                    } else {
                        document.getElementById("error").innerHTML = "";
                    }
                }
            };
            xhttp.open("GET", base_URL + "/ajax/join/user_email_taken/" + user_name, true);
            xhttp.send();
        }

    }






    function check_user_name(obj) {
        var user_name = obj.value;
        if (user_name !== null || user_name !== "") {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    user_name = this.responseText;
                    if (user_name === "false") {
                        document.getElementById("error").innerHTML = "This user Name is already taken";
                    } else {
                        document.getElementById("error").innerHTML = "";
                    }
                }
            };
            xhttp.open("GET", base_URL + "/ajax/join/user_name_taken/" + user_name, true);
            xhttp.send();
        }

    }


    function form_submission(evt) {
        evt.preventDefault();
        alert("Prevented");
        if (user_mail === "true" && user_name == "true") {

            return true;
        }
        return false;



    }
</script>