$(document).ready(function() {
	// This is more like it!

	// alert("ok");

	//$("#main").hide();
	//$("body").fadeIn(2000);

	$("h1").click(function() {
		$("#main").css("border", "solid 3px red");
		return false;
	});

	$("h1").toggle(function() {

		$.ajax({
			url : 'test.php',
			success : function(data) {
				$('.result').html(data);
				alert('Load was performed.');
			}
		});

		$("#main").css("border", "solid 3px red");

	}, function() {
		$("#main").css("border", "solid 3px blue");
	});
	var current = 0, $preview = $('#preview'), $carouselEl = $('#carousel'), $carouselItems = $carouselEl.children(), carousel = $carouselEl.elastislide({
		current : current,
		minItems : 4,
		onClick : function(el, pos, evt) {

			changeImage(el, pos);
			evt.preventDefault();

		},
		onReady : function() {

			changeImage($carouselItems.eq(current), current);

		}
	});

	function changeImage(el, pos) {

		$preview.attr('src', el.data('preview'));
		$carouselItems.removeClass('current-img');
		el.addClass('current-img');
		carousel.setCurrent(pos);

	}

});
// end of file