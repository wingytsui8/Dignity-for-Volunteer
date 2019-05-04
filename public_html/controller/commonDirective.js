
// require page.js
var app = angular.module("digVol", []);
var title = document.getElementsByTagName("title")[0].innerHTML.replace("Dignity For Volunteer - ", "");
var headerMenuHtml = "<ul class=\"hmenu\">";
for (var i = 0; i < pages.length; i++){
	if (pages[i] == title){
		headerMenuHtml += "<li class=\"active\">";
	}else{
		headerMenuHtml += "<li>";
	}
	headerMenuHtml += <a href=\"" + pages[i] + "/\" target=\"_self\">" + pages[i] + "</a></li>";
}
app.directive("headermenu", function() {
    return {
    	restrict : 'E',
        template : headerMenuHtml,
        styleUrls: ["../view/css/headerMenu.css"]

    };

});