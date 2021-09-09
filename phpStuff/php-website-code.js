"use strict";

let to;

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
        if (pos < -207) {
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

function showAll() {
    document.getElementById("addRequests").style.display = "none";
    document.getElementById("doneRequests").style.display = "none";
    document.getElementById("allRequests").style.display = "flex";
}

function addRequests() {
    document.getElementById("addRequests").style.display = "flex";
    document.getElementById("doneRequests").style.display = "none";
    document.getElementById("allRequests").style.display = "none";    
}

function showDone() {
    document.getElementById("addRequests").style.display = "none";
    document.getElementById("doneRequests").style.display = "flex";
    document.getElementById("allRequests").style.display = "none";
}

function myRequests() {
    document.getElementById("myRequests").style.display = "flex";
    document.getElementById("allRequests").style.display = "none";
    document.getElementById("doneRequests").style.display = "none";
    document.getElementById("colorPickerMenu").style.display = "none";
}

function showAll2() {
    document.getElementById("myRequests").style.display = "none";
    document.getElementById("allRequests").style.display = "flex";
    document.getElementById("doneRequests").style.display = "none";
    document.getElementById("colorPickerMenu").style.display = "none";
}

function showDone2() {
    document.getElementById("myRequests").style.display = "none";
    document.getElementById("doneRequests").style.display = "flex";
    document.getElementById("allRequests").style.display = "none";
    document.getElementById("colorPickerMenu").style.display = "none";
}

function showColorPicker() {
    document.getElementById("myRequests").style.display = "none";
    document.getElementById("allRequests").style.display = "none";
    document.getElementById("doneRequests").style.display = "none";
    document.getElementById("colorPickerMenu").style.display = "flex";
}

function setBusy(username) {
    fetch("http://localhost/htmlProject/phpStuff/setBusy.php?user="+username, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `user=${username}`
    });
    document.getElementById("indicator").style.backgroundColor = "red";
    document.getElementById("indicator").style.left = "1971px";
}

function setAvailable(username) {
    fetch("http://localhost/htmlProject/phpStuff/setAvailable.php?user="+username, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `user=${username}`
    });
    document.getElementById("indicator").style.backgroundColor = "#00ff00";
    document.getElementById("indicator").style.left = "2400px";

}

function changeColor(id) {
    let value1;
    let value2;
    let value3;
    if (id = 1) {
        value1 = document.getElementById("green").value;
        document.getElementById("green2").style.backgroundColor = "rgb(0, "+value1+", 0)";
        document.getElementById("green2").innerHTML = value1;
    }

    if (id = 2) {
        value2 = document.getElementById("red").value;
        document.getElementById("red2").style.backgroundColor = "rgb("+value2+" , 0 , 0)";
        document.getElementById("red2").innerHTML = value2;
    }

    if (id = 3) {
        value3 = document.getElementById("blue").value;
        document.getElementById("blue2").style.backgroundColor = "rgb(0, 0, "+value3+")";
        document.getElementById("blue2").innerHTML = value3;
    }

    console.log("rgb("+value2+", "+value1+", "+value3+")");
    document.getElementById(id).style.backgroundColor = "rgb("+value2+", "+value1+", "+value3+")";
    document.getElementById(id).style.borderColor = "white";
}
//Animations________________________________________________________________________________________________________________________________________________
function newsBlockOpen(id) {
    const element = (document.getElementById(id));
    const styles = getComputedStyle(element);

    let width = styles.getPropertyValue('width');
    let height = styles.getPropertyValue('height');
    let maxSize = 400;
    height = parseInt(height, 10);
    width = parseInt(width, 10);
    const speed = 5;
    function showContent() {
        if(id < 6){
            document.getElementById(id*10).style.display = "block";
            document.getElementById(id*10+1).style.display = "block";
        }else {
            document.getElementById(id*10).style.display = "none";
            document.getElementById(id*10+1).style.display = "block";
        }
    }

    let int = setInterval(frame, 1);
    function frame() {
        if(width<maxSize) {
            document.getElementById(id).style.width = width;
            width+=speed;
        }

        if (height<maxSize) {
            document.getElementById(id).style.height = height;
            height+=speed;
        }

        if (height >= maxSize && width >= maxSize) {
            clearInterval(int);
            to = setTimeout(showContent, 500);
        }
    }
}


function newsBlockClose(id) {
    clearTimeout(to)
    const element = (document.getElementById(id));
    const styles = getComputedStyle(element);

    let width = styles.getPropertyValue('width');
    let height = styles.getPropertyValue('height');
    let maxWidth = 365;
    let maxHeight = 205;
    height = parseInt(height, 10);
    width = parseInt(width, 10);
    const speed = 5;
    if (height <=400){
        if (id < 6) {
            document.getElementById(id*10).style.display = "none"
            document.getElementById(id*10+1).style.display = "none"
        }else{
            document.getElementById(id*10).style.display = "block"
            document.getElementById(id*10+1).style.display = "none"
        }
    }
    
    let int = setInterval(frame, 1);
    function frame() {
        if(width>maxWidth) {
            document.getElementById(id).style.width = width;
            width-=speed;
        }

        if (height>maxHeight) {
            document.getElementById(id).style.height = height;
            height-=speed;
        }

        if (height <= maxHeight && width <= maxWidth) {
            clearInterval(int);
        }
    }
}

