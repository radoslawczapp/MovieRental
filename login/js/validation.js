function login_validation()
{
    var email = document.forms["loginform"]["email"].value;
    var password = document.forms["loginform"]["password"].value;
    var el;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (email == "")
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Email field is required!</div>";
        return false;
    }
    else if (!re.test(email))
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Please enter valid email!</div>";
        return false;
    }
    else if (password == "")
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Password field is required!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

function signup_validation()
{
    var firstname = document.forms["registerform"]["firstname"].value;
    var lastname = document.forms["registerform"]["lastname"].value;
    var remail = document.forms["registerform"]["remail"].value;
    var rpassword = document.forms["registerform"]["rpassword"].value;
    var el;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (firstname == "")
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>First name field is required!</div>";
        return false;
    }
    else if (lastname == "")
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>Last name field is required!</div>";
        return false;
    }
    else if (remail == "")
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>Email field is required!</div>";
        return false;
    }
    else if (!re.test(remail))
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>Please enter valid email!</div>";
        return false;
    }
    else if (rpassword == "")
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>Password field is required!</div>";
        return false;
    }
    else if (rpassword.length < 8)
    {
        el = document.getElementById('signup_message');
        el.innerHTML = "<div class='info-alert'>Password must be minimum 8 charachters!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

function reset_password_validation()
{
    var newpassword = document.forms["resetpasswordform"]["newpassword"].value;
    var confirmpassword = document.forms["resetpasswordform"]["confirmpassword"].value;
    var el;

    if (newpassword == "")
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Password field is required!</div>";
        return false;
    }
    else if (newpassword.length < 8)
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Password must be minimum 8 charachters!</div>";
        return false;
    }
    else if (confirmpassword == "")
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Confirm password field is required!</div>";
        return false;
    }
    else if (password !== confirmpassword)
    {
        el = document.getElementById('login_message');
        el.innerHTML = "<div class='info-alert'>Passwords don't match!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

function email_validation()
{
    var email = document.forms["emailform"]["email"].value;
    var el;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (email == "")
    {
        el = document.getElementById('reset_message');
        el.innerHTML = "<div class='info-alert'>Email field is required!</div>";
        return false;
    }
    else if (!re.test(email))
    {
        el = document.getElementById('reset_message');
        el.innerHTML = "<div class='info-alert'>Please enter valid email!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

function update_validation()
{
    var newfirstname = document.forms["updateform"]["new_first_name"].value;
    var newlastname = document.forms["updateform"]["new_last_name"].value;
    var currentpassword = document.forms["updateform"]["current_password"].value;
    var el;
    
    if (newfirstname == "")
    {
        el = document.getElementById('update_message');
        el.innerHTML = "<div class='info-alert'>New first name field is required!</div>";
        return false;
    }
    else if (newlastname == "")
    {
        el = document.getElementById('update_message');
        el.innerHTML = "<div class='info-alert'>New last name field is required!</div>";
        return false;
    }
    else if (currentpassword == "")
    {
        el = document.getElementById('update_message');
        el.innerHTML = "<div class='info-alert'>Current password field is required!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

function change_validation()
{
    var newpassword = document.forms["changeform"]["new_password"].value;
    var confirmnewpassword = document.forms["changeform"]["confirm_new_password"].value;
    var currentpassword = document.forms["changeform"]["current_password"].value;
    var el;
    
    if (newpassword == "")
    {
        el = document.getElementById('change_message');
        el.innerHTML = "<div class='info-alert'>New password field is required!</div>";
        return false;
    }
    else if (confirmnewpassword == "")
    {
        el = document.getElementById('change_message');
        el.innerHTML = "<div class='info-alert'>Confirm new password field is required!</div>";
        return false;
    }
    else if (newpassword !== confirmnewpassword)
    {
        el = document.getElementById('change_message');
        el.innerHTML = "<div class='info-alert'>Passwords don't match!</div>";
        return false;
    }
    else if (currentpassword == "")
    {
        el = document.getElementById('change_message');
        el.innerHTML = "<div class='info-alert'>Current password field is required!</div>";
        return false;
    }
    else
    {
        return true;
    }
}