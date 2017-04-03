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
            //force change so JQM knows what happened
            $("#xAxis-select").prop("selectedIndex", attributes[0].attributeId).change();
            $("#yAxis-select").prop("selectedIndex", attributes[1].attributeId).change();
        }
        $(".axis-select").on("change", (changeEvent) => {
            if ($("#xAxis-select").val() === $("#yAxis-select").val()) {
                let changedSelect = changeEvent.target;
                let attrIndex = attributes.findIndex(function(attr) {
                    return parseInt(attr.attributeId) === parseInt(changedSelect.selectedIndex);
                });
                if (changedSelect === document.getElementById("xAxis-select")) {
                    $("#yAxis-select").val(attributes[(attrIndex+1)%attributes.length].attributeId);
                }
                else if (changedSelect === document.getElementById("yAxis-select")) {
                    $("#xAxis-select").val(attributes[(attrIndex+1)%attributes.length].attributeId);
                }
                $(".axis-select").change();

            }
        });
    }, function(err) {

    });
}