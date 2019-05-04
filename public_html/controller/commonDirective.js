var pages = [
"Home",
"Event",
"Upcoming",
"Register"
];

// require page.js
var app = angular.module("digVol", []);

var title = document.getElementsByTagName("title")[0].innerHTML.replace("Dignity For Volunteer - ", "");
var commonHeaderHtml = "<ul class=\"hmenu\">";
for (var i = 0; i < pages.length; i++){
	if (pages[i] == title){
		commonHeaderHtml += "<li class=\"active\">";
	}else{
		commonHeaderHtml += "<li>";
	}
	commonHeaderHtml += "<a href=\"" + pages[i] + "/\" target=\"_self\">" + pages[i] + "</a></li>";
}


commonHeaderHtml += "</ul>"

app.directive("commonheader", function() {
    return {
    	restrict : 'E',
        template : commonHeaderHtml,
        styleUrls: ["../view/css/headerMenu.css"]

    };

});


app.directive("commonfooter", function() {
    return {
    	restrict : 'E',
        template : "<div ng-style=\"footerStyle\">© 2019 Dignity for Children Foundation (506188W).  Designed by <a href=\"https://github.com/neiamenase\">Sam Tang</a>, <a href=\"https://github.com/wingytsui8\">Winnie Tsui</a></div>"
    };
});