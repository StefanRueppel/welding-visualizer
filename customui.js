$(document).ready(documentInit);

function documentInit() {
    getAllMaterialAttributes().then(function(attributes) {
        for (let attr of attributes) {
            $(".axis-select").append($("<option>", {
                value: attr.attributeId,
                text: attr.name + " [" + attr.unit + "]"
            }));
        }
        if (attributes.length >= 2) {
            $("#xAxis-select").prop("selectedIndex", attributes[0].attributeId);
            $("#yAxis-select").prop("selectedIndex", attributes[1].attributeId);
        }
        $(".axis-select").on("change", (changeEvent) => {
            if ($("#xAxis-select").val() === $("#yAxis-select").val()) {
                alert("already taken");
            }
            //switch or go to next unused if already taken
        });
    }, function(err) {

    });
}