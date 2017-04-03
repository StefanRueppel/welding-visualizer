function getAllMaterialAttributes() {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = () => resolve(JSON.parse(this.responseText));
        xhr.onerror = () => reject("Error in server connection");
        xhr.open("GET", "attributes.php");
        xhr.send();
    });
}
