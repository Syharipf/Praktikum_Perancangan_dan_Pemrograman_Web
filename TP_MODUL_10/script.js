function kirimData() {
    const nama = document.getElementById("nama").value;
    const respon = document.getElementById("respon");

    // AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "server.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        respon.innerHTML = this.responseText;

        if (this.responseText.includes("tidak boleh kosong")) {
            respon.className = "response error";
        } else {
            respon.className = "response success";
        }
    }

    xhr.send("nama=" + encodeURIComponent(nama));
}