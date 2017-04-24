function getAllMaterialAttributes() {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = (evt) => resolve(JSON.parse(evt.target.responseText));
        xhr.onerror = () => reject("Error while contacting server");
        xhr.open("GET", "attributes.php");
        xhr.send();
    });
}

function getMaterialsWithAttributes(xAxisAttribute, yAxisAttribute) {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = (evt) => resolve(JSON.parse(evt.target.responseText));
        xhr.onerror = () => reject("Error while contacting server");
        xhr.open("GET", "materials.php?xattr=" + encodeURIComponent(xAxisAttribute) + "&yattr=" + encodeURIComponent(yAxisAttribute));
        xhr.send();
    });
}
