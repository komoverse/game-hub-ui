$(document).ready(function(){
    var origin_url = window.location.origin;
    console.log(origin_url);
    var notice_start = '<div style="height: 30px;"></div><div style="display:block; position:fixed; padding: 5px; bottom:0; font-size: 14px; text-align:center; height: 30px;width: 100%; background:red;color:white;">';
    var notice_end = '</div>';
    if (origin_url == 'http://localhost') {
        $('body').append(notice_start+"Localhost Environment"+notice_end);
    } else if (origin_url.indexOf("komoverse.dev") >= 0) {
        $('body').append(notice_start+"Development Environment"+notice_end);
    } else if (origin_url.indexOf("test-env") >= 0) {
        $('body').append(notice_start+"Test Environment"+notice_end);
    }
});