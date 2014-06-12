$(document).ready(function() {
	
});
var base = {
    ajax: {
        json: function(url, params, call_back) {
            var return_val;
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: "json",
                async: false,
                beforeSend: function() {

                },
                success: function(rs) {
                    return_val = rs;
                },
                complete: function() {
                    if (typeof(call_back) === 'function') {
                        call_back.call();
                    }
                },
                error: function(e) {
                    console.log(e);
                }
            });
            return return_val;
        },
        html: function(url, params, call_back) {
            var return_val;
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: "html",
                async: false,
                beforeSend: function() {

                },
                success: function(rs) {
                    return_val = rs;
                },
                complete: function() {
                    if (typeof(call_back) === 'function') {
                        call_back.call();
                    }
                },
                error: function(e) {
                    console.log(e);
                }
            });
            return return_val;
        }
    },
    url: {
        get_hash: function() {
            if (window.location.href.indexOf("#") > 0) {
                var hash_value = window.location.href.substring(window.location.href.indexOf('#') + 1, window.location.href.length);
                return hash_value;
            }
            return false;
        },
        change_hash: function() {

        }
    }
}