$(function () {
        $('#menu span.expand').click(function () {
            $('#menu nav').toggle(300);
        })
    }
);

function zamien_obrazki() {
    if (sessionStorage.obrazki == null) {
        $("#obraz1").attr("src", "biografia.jpg");
        sessionStorage.obrazki = "zestaw1";
    }
    else if (sessionStorage.obrazki == "zestaw1") {
        $("#obraz1").attr("src", "biografia.jpeg");
        sessionStorage.obrazki = "zestaw2";
    }

     else if (sessionStorage.obrazki == "zestaw2") {
        $("#obraz1").attr("src", "biografia.jpg");
        sessionStorage.obrazki = "zestaw1";
    }

}
function wczytaj_obrazek() {
    if (sessionStorage.obrazki != null) {
        if (sessionStorage.obrazki == "zestaw1") {
            $("#obraz1").attr("src", "biografia.jpg");
        }

        else if (sessionStorage.obrazki == "zestaw2") {
            $("#obraz1").attr("src", "biografia.jpeg");
        }
    }
}
//T£O
function zamien_tlo() {
    if (localStorage.tloo == null) {
        document.bgColor = "#808080";
        localStorage.tloo = "tlo1";
    }
    else if (localStorage.tloo == "tlo1") {
        document.bgColor = "#DDD";
        localStorage.tloo = "tlo2";
    }

    else if (localStorage.tloo == "tlo2"){
        document.bgColor = "#808080";
        localStorage.tloo = "tlo1";
    }

}

//onload="wczytaj_tlo()  !!!

    function wczytaj_tlo() {
        if (localStorage.tloo != null) {
            if (localStorage.tloo == "tlo1") {
                document.bgColor = "#808080";
               
            }

            else if (localStorage.tloo == "tlo2") {
                document.bgColor = "#DDD";
                
            }
        }
    } var funkcja;

    function AddAChild() {
       
       if (funkcja==null)
       {
            // Tworzy nowy element paragrafu
            var stopka = document.createElement("stopka");
            stopka.innerHTML = "KAROLINA MAISON nr albumu: 165609 <br/>";
            stopka.style.color = "white";
            // Wstawia go na koniec cia³a dokumentu
            var container = document.getElementById("footer");
            container.appendChild(stopka);
            funkcja=1;
        }
        //else {
           

       // }
    }