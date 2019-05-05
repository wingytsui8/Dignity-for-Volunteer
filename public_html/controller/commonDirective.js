var pages = [
"Home",
"Event",
"Upcoming",
"Register"
];

// require page.js
var app = angular.module("digVol", []);

var title = document.getElementsByTagName("title")[0].innerHTML.replace("Dignity For Volunteer - ", "");

var commonHeaderHtml = "<div><a href=\"http://dignityforchildren.org/\" target=\"1\"><img alt=\"gallery/dignity_logo\" src=\"gallery_gen/37c944c27b869908c211dea96575621f_190x60.png\"></a></div>";
commonHeaderHtml += "<div><ul class=\"hmenu\">";
for (var i = 0; i < pages.length; i++){
	if (pages[i] == title){
		commonHeaderHtml += "<li class=\"active\">";
	}else{
		commonHeaderHtml += "<li>";
	}
	commonHeaderHtml += "<a href=\"" + pages[i] + "/\" target=\"_self\">" + pages[i] + "</a></li>";
}


commonHeaderHtml += "</ul></div>"

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
        template : "<div>© 2019 Dignity for Children Foundation (506188W).  Designed by <a href=\"https://github.com/neiamenase\">Sam Tang</a>, <a href=\"https://github.com/wingytsui8\">Winnie Tsui</a></div>"
    };
});