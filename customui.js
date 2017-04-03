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
                let tmp = $("#xAxis-select").val();
                $("#xAxis-select").prop("selectedIndex", $("#yAxis-select").val());
                $("#yAxis-select").prop("selectedIndex", tmp);
                $(".axis-select").change();
            }
        });
    }, function(err) {

    });
}