function acceptAndHide() {
    $.ajax({
        type: "POST",
        url: "content/acceptCookies.php"
    }).done(function() {
        const items = document.getElementsByClassName("cookie-box");
        Array.prototype.forEach.call(items, item => {
            item.style.visibility = "hidden"
        });
    });
}