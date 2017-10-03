function Menu() {

    this.scroll = function () {

        if (window.screen.width > 700) {
            if (window.scrollY > 50) {
                document.getElementById('menu-header').style.display = "none";
                document.getElementById('menu-header-scrollBas').style.display = "block";
            }
            if (window.scrollY < 50) {
                document.getElementById('menu-header').style.display = "block";
                document.getElementById('menu-header-scrollBas').style.display = "none";
            }
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

window.addEventListener('scroll', menuAccueil.scroll, false);
document.getElementById('menu-mobile').addEventListener('click', menuAccueil.mobile, false);
document.getElementById('menu-close').addEventListener('click', menuAccueil.closeMenu, false);


