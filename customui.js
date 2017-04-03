$(document).ready(documentInit);

function documentInit() {
    getAllMaterialAttributes().then(function(attributes) {
        for (let attribute of attributes) {
            $(".axis-select").append($("<option>"), {
                value: attribute.attributeId,
                text: attribute.attribute.name + "[" + attribute.unit + "]"
            });
        }
    }, function(err) {

    });
}