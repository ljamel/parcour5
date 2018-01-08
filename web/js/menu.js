function Menu() {

    this.scroll = function () {

        // Le menu scrollbas apparait que que lorsque l'utilisateur est sur un ordinateur
        if (window.innerWidth > 700) {

            document.getElementById('menu-header').style.backgroundColor = "white";
            document.getElementById('blue-menu').style.color = "rgb(18, 159, 250)";
            document.getElementById('blue-menu2').style.color = "rgb(18, 159, 250)";
            document.getElementById('blue-menu3').style.color = "rgb(18, 159, 250)";
            document.getElementById('blue-menu4').style.color = "rgb(18, 159, 250)";
            document.getElementById('blue-menu5').style.color = "rgb(18, 159, 250)";

        }

    };

    this.mobile = function () {
        document.getElementById('deroul-menu').style.display = "block";
        document.getElementById('menu-mobile').style.display = "none";
        document.getElementById('menu-close').style.display = "block";
    };

    this.closeMenu = function () {
        document.getElementById('deroul-menu').style.display = "none";
        document.getElementById('menu-mobile').style.display = "block";
        document.getElementById('menu-close').style.display = "none";
    };

}

var menuAccueil = new Menu();
var menuOpen = new Menu();

menuAccueil.scroll();
document.getElementById('menu-mobile').addEventListener('click', menuAccueil.mobile, false);
document.getElementById('menu-close').addEventListener('click', menuAccueil.closeMenu, false);




