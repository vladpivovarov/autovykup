
function ready() {

	$(".navs").on("click","a", function (event) {
		if($(this).attr('href') === "index.html") {
			return;
		}
		event.preventDefault();
		var id  = $(this).attr('href'),
		    top = $(id).offset().top;
		         
		$('body,html').animate({scrollTop: top}, 500);
		console.log("animate");
	});

	var form = document.getElementsByName("mail")[0];

	form.addEventListener("submit", function(e) {
        e.preventDefault();
        var smallLoader = document.querySelector(".ajax-loader");
        var bigLoader = document.querySelector(".ajaxloaderforcf7");
        var button = document.querySelector(".wpcf7-submit");

        smallLoader.remove();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'mail2.php', true);

        var data = new FormData();
        data.append("name", form["name"].value);
        data.append("phone", form["phone"].value);
        data.append("mess", form["mess"].value);

        xhr.onload = function() {
            let responseText = xhr.responseText;
            bigLoader.innerHTML = "Спасибо за заявку! Наш менеджер скоро свяжется с Вами.";
        }

        xhr.send(data);
    });
}


document.addEventListener("DOMContentLoaded", ready);


