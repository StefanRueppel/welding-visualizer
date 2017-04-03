function getAllMaterialAttributes() {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = (evt) => resolve(JSON.parse(evt.target.responseText));
        xhr.onerror = () => reject("Error in server connection");
        xhr.open("GET", "attributes.php");
        xhr.send();
    });
}
