function openSideMenu() {
    document.getElementById("smButton").style.display = "none";
    document.getElementById("sideMenu").style.display = "flex";
}

function closeSideMenu() {
    document.getElementById("smButton").style.display = "block";
    document.getElementById("sideMenu").style.display = "none";
}

function logout() {
    self.location = "http://localhost/htmlProject/media/test.php";
}