function test() {
    for (let g = 1; g <= 25; g++) {
        let color = Math.round(Math.random() * 2);
        let element = document.getElementById(g);
        if (color == 0) {
            document.getElementById(g).style.backgroundColor = "rgb(0, 0, 255)";
        }

        if (color == 1) {
            document.getElementById(g).style.backgroundColor = "rgb(255, 0, 0)";
        }

        if (color == 2) {
            document.getElementById(g).style.backgroundColor = "rgb(0, 255, 0)";
        }
    }
}

function get_color(target) {
    let color = document.getElementById(target).style.backgroundColor;
    if (color == "rgb(0, 0, 255)") {
        document.getElementById(target).style.backgroundColor = "rgb(255, 0, 0)";
    }

    if (color == "rgb(255, 0, 0)") {
        document.getElementById(target).style.backgroundColor = "rgb(0, 255, 0)";
    }

    if (color == "rgb(0, 255, 0)") {
        document.getElementById(target).style.backgroundColor = "rgb(0, 0, 255)";
    }
}

function change_color(target) {
    const LAENGE_REIHE = 5;
    const LAENGE_SPALTE = 5;

    console.log(target / LAENGE_REIHE);


    const reihe = Math.ceil(target / LAENGE_REIHE);
    const spalte = LAENGE_REIHE - (reihe * LAENGE_REIHE - target);

    let targets = [
        [reihe+1, spalte],
        [reihe-1, spalte],
        [reihe, spalte+1],
        [reihe, spalte-1],
    ];

    targets = targets.filter((target) => (
        target[0] >= 1 &&
        target[0] <= LAENGE_REIHE &&
        target[1] >= 1 &&
        target[1] <= LAENGE_SPALTE
    ));

    targets = targets.map((target) => ((target[0] - 1) * LAENGE_REIHE + target[1] ));

    console.log(targets);


    get_color(target)

    for (sibling of targets){
        get_color(sibling)
    }

    for (x in targets){
        let color = document.getElementById(x).style.backgroundColor
        let tempb = 0
        let tempr = 0
        let tempg = 0
        if (color == "rgb(0, 0, 255)"){
            ++tempb
        }

        if (tempb == LAENGE_REIHE*LAENGE_SPALTE) {
            alert("Du hast gewonnen")
        }

        if (color != "rgb(255, 0, 0)"){
            ++tempr
        }

        if (tempr == LAENGE_REIHE*LAENGE_SPALTE) {
            alert("Du hast gewonnen")
        }

        if (color == "rgb(0, 255, 0)"){
            ++tempg
        }

        if (tempy == LAENGE_REIHE*LAENGE_SPALTE) {
            alert("Du hast gewonnen")
        }
    }
}

function start() {
    test();
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/*function auto(){
    let p = getRandomInt(1,25)
    change_color(p)

}

auto()*/