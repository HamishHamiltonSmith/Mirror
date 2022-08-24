function check(){
    var url = window.location.href;
    var obj = new URL(url);
    var params = obj.searchParams.get("pass");

    if (params == "incorrect"){
        document.getElementById('error').innerHTML = "Incorrect credentials";
    }
}