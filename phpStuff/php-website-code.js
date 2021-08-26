function openSideMenu() {
    document.getElementById("smButton").style.display = "none";
    document.getElementById("sideMenu").style.display = "flex";
}

function closeSideMenu() {
    document.getElementById("smButton2").style.display = "block";
    document.getElementById("sideMenu").style.display = "none";
    document.getElementById("smButton").style.display = "block";
}

function showLogin() {
    document.getElementById("loginField").style.display = "block";
    document.getElementById("showLoginButton").style.display ="none";
}

function logout() {
    self.location = "http://localhost/htmlProject/phpStuff/test.php";
}

function loginOut() {
    document.getElementById("loginField").style.display = "none";
}

function test() {
    document.getElementById("showLoginButton").style.display ="none";
}

function register() {
    self.location ="google.com"
}

function resizeWebsiteLogo() {
    const windowInnerWidth  = document.documentElement.clientWidth;
    const windowInnerHeight = document.documentElement.clientHeigh;
    document.getElementById("websiteLogo").width = windowInnerWidth;
    document.getElementById("websiteLogo").height = windowInnerHeight;
}