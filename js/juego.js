var words = $("p").first().text().split(/\s+/);
var text = words.join("</span> <span>");
$("p").first().html("<span>" + text + "</span>");
$("span").on("click", function () {
	$(this).css("background-color", "green");
	console.log($(this).text());
});