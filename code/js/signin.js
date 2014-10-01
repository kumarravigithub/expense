$(document).ready(function() {
    $('#but_login').click(function() {
        alert("Hey");
        var employeeid = $('#username').val();
        var password = $("#password").val();
        $.ajax({
            type: "GET",
            url: "login.php",
            data: "u=" + employeeid + "&p=" + password,
            success: function(msg) {
                var result = jQuery.parseJSON(msg);
                switch (result.status) {
                    case "SUCCESS":
                        window.location = self.location;
                        break;
                    case "ERR":
                        alert(result.message);
                        break;
                    case "PASSWORD":
                        alert(result.message);
                        window.location = 'changepassword.php?id=' + employeeid;
                        break;
                }

            }
        });

    });
    $("#formLogin").submit(function(e) {
        return false;
    });
});
