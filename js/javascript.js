document.addEventListener("deviceready", function () {
    document.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent opening in an external browser
            let url = this.href;
            window.open(url, "_self"); // Opens inside the app
        });
    });
});