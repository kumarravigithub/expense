jQuery.fn.save = function(callback) {
    var $elem = $(this[0]);

    var fortag = $elem.attr('tbl');
    var action = $elem.attr('action');

    var json = '{';
    json = json + '"tbl":"' + fortag + '",';
    json = json + '"action":"' + action + '",';

    $('[for=' + fortag + ']').each(function(index) {
        if ($(this).is("span")) {
            json = json + '"' + $(this).attr('name') + '":"' + encodeURIComponent($(this).text()) + '",';
        } else {
            json = json + '"' + $(this).attr('name') + '":"' + encodeURIComponent($(this).val()) + '",';
        }
    });
    json = json.replace(/.$/g, '') + "}";

    $.ajax({
        type: "POST",
        url: "code/api/cud.php",
        data: "jsondata=" + json,
        success: function(result) {
            console.log(result);
        }
    });
    return $elem;
};

$('#cmdSave').on('click', function() {
    $(this).save();
});