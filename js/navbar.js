function myFunction() {
    var x = document.getElementById("container cnavbar");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
} 