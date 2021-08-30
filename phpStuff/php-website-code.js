function openSideMenu() {
    var elem = document.getElementById("sideMenu");
    var pos = -200;
    var id;
    clearInterval(id);
    id = setInterval(frame, 1);
    function frame() {
        if (pos > 0) {
        clearInterval(id);
        } else {
        pos+=3;
        elem.style.left = pos + 'px';
        }
    }

    document.getElementById("smButton").style.display = "none";
    document.getElementById("sideMenu").style.display = "flex";
}

function closeSideMenu() {
    var elem = document.getElementById("sideMenu");
    var pos = 0;
    var id;
    clearInterval(id);
    id = setInterval(frame, 1);
    function frame() {
        if (pos < -200) {
        clearInterval(id);
        } else {
        pos-=3;
        elem.style.left = pos + 'px';
        }
    }

    document.getElementById("smButton2").style.display = "block";
    document.getElementById("smButton").style.display = "block";
}

function showLogin() {
    document.getElementById("loginField").style.display = "block";
    document.getElementById("showLoginButton").style.display ="none";
}

function logout() {
    self.location = "http://localhost/htmlProject/phpStuff/test.php";
    console.log("sd")
}

function loginOut() {
    document.getElementById("loginField").style.display = "none";
}

function test() {
    document.getElementById("showLoginButton").style.display ="none";
}

function register() {
    self.location ="registrieren.php"
}

function resizeWebsiteLogo() {
    const windowInnerWidth  = document.documentElement.clientWidth;
    const windowInnerHeight = document.documentElement.clientHeigh;
    document.getElementById("websiteLogo").width = windowInnerWidth;
    document.getElementById("websiteLogo").height = windowInnerHeight;
}


//Animations
function blockAnimationEnd(id) {
    let width = document.getElementById(id).style.width;
    let height = document.getElementById(id).style.height;
    let maxSize = 380;

    let int = setInterval(frame, 1);
    function frame() {
        if(height<maxSize && width<maxSize) {
            document.getElementById(id).style.width = width;
            width+=1;
            document.getElementById(id).style.height = height;
            height+=1;
        }else { 
            clearInterval(int);
        }
    }
}

function blockAnimationEnd(num) {
    let id = parseInt(num);
    let width = document.getElementById(id).style.width;
    let height = document.getElementById(id).style.height;
    let finalWidth = 366;
    let finalHeight = 203;

    let int = setInterval(frame, 10);
    function frame() {
        if(height>finalHeight && width<finalWidth) {
            document.getElementById(id).style.width = width;
            width-=1;
            document.getElementById(id).style.height = height;
            height-=1;
        }else { 
            clearInterval(int);
        }
    }
    function appear(id2) {
        document.getElementById(id2+1).style.display = "block";
        document.getElementById(id2+2).style.display = "block";
        document.getElementById(id2+3).style.display = "block";
    }

    let id2 = parseInt(id)
    setTimeout(appear(id2*10), 1000);
}