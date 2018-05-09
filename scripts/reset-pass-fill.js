function fillhidden() {
    document.getElementById("username").value = sessionStorage.username;
}

function storeuser() {
    sessionStorage.username = document.getElementById("username").value;
}

function init() {
    if (document.getElementById("reset-user")!=null) {
        var userform = document.getElementById("reset-user");
        userform.onsubmit = storeuser;
    }
    if (document.getElementById("reset-pass")!=null) {
        var passform = document.getElementById("reset-user");
        fillhidden();
    }
}

setTimeout(init, 100);