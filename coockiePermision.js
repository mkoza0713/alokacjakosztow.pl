
if(getCookie("coockie_permision")!=1){
    const htmlText = `<section class="c_permision" id="id_c_button">
    <h3>Ta strona korzysta z plików coockie. Klikając "Akceptuj" akceptujesz <a href="politykaPrywatnosci.php">politykę prywatnośc</a>. </h3>
    <button class="c_button" type="button" onclick="coockiePermision()">Akceptuj</button>`;
    document.write(htmlText);
}
function coockiePermision(){
        if(getCookie("coockie_permision")!=1){
            var zmienna=document.getElementById("id_c_button")
            const d = new Date();
            d.setTime(d.getTime() + 168*3600*1000);
            let expires = "expires="+ d.toUTCString();
            document.cookie = "coockie_permision=1;" + expires;
            zmienna.style.display = "none";
    }
};
function getCookie(name) {
        if (document.cookie !== "") {
            const cookies = document.cookie.split(/; */);  //tu zrobiłem tablicę

            for (let cookie of cookies) {
                const [ cookieName, cookieVal ] = cookie.split("=");
                if (cookieName === decodeURIComponent(name)) {
                    return decodeURIComponent(cookieVal);
                }
            }
        }
        return undefined;   
    }

