function login() {
    var pass = document.getElementById("password");
    var passcheck = document.getElementById("passwordcheck");

    if (passcheck.value !== pass.value) {
        alert("密碼與確認密碼不一致! 請重新輸入!");
        passcheck.value = "";
    }
}