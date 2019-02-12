function toggle_password(target)
{
    var d = document;
    var tag = d.getElementById(target);
    var tag2 = d.getElementById("showpass");

    if (tag2.innerHTML == 'Show Password')
    {
        tag.setAttribute('type', 'text');   
        tag2.innerHTML = 'Hide Password';
    }
    else
    {
        tag.setAttribute('type', 'password');   
        tag2.innerHTML = 'Show Password';
    }
}