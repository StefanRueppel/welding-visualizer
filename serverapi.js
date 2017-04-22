/*function getAllMaterialAttributes() {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function(evt) {
            if (this.status === 404) {
                console.error("404 - Resource " + resourceURL + " not found");       
            }
            else {
                resolve(JSON.parse(evt.target.responseText));
            }
        }
        xhr.onerror = () => reject("Error while contacting server");
        xhr.open("GET", "attributes.php");
        xhr.send();
    });
}

function getMaterialsWithAttributes(xAxisAttribute, yAxisAttribute) {
    let resourceURL = "materials.php";
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function(evt) {
            if (this.status === 404) {
                console.error("404 - Resource " + resourceURL + " not found");
            }
            else {
                resolve(JSON.parse(evt.target.responseText));
            }
        };
        xhr.onerror = () => reject("Error while contacting server");
        xhr.open("GET", resourceURL + "?xattr=" + encodeURIComponent(xAxisAttribute) + "&yattr=" + encodeURIComponent(yAxisAttribute));
        xhr.send();
    });
}*/

function getAllMaterialAttributes() {
    return jsonAJAX("attributes.php", "GET");
}

function getMaterialsWithAttributes(xAxisAttribute, yAxisAttribute) {
    return jsonAJAX("materials.php", "GET", "xattr=" + encodeURIComponent(xAxisAttribute) + "&yattr=" + encodeURIComponent(yAxisAttribute));
}

function jsonAJAX(resourceURL, method, data=null) {
    return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.onload = function(evt) {
            if (this.status === 404) {
                reject("404 - Resource " + resourceURL + " not found");
            }
            else {
                resolve(JSON.parse(evt.target.responseText));
            }
        };
        xhr.onerror = () => reject("Network error");
        xhr.open(method, resourceURL + (method === "GET" && data ? "?" + data : ""));
        xhr.send(method === "POST" ? data : null);
    });
}
