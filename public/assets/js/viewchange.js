
$('.list-view-trigger').on('click', function() {

	if ($('.list-view')[0]) {
		$('.recent-article').find('.grid-view').hide();
		$('.list-view').show();
	}
	else {
		var listContainer = $('<div class="list-view"/>');

		$.each($('.property-info'), function(key, value) {
//	console.log($(this).find('.purpose').text());
			var purpose = ($(this).find('.purpose').text());
			var rate = $(this).find('.rate').text();
			var propertyName = $(this).find('.property-name').text();
			var location = $(this).find('.location').text();
			var area = $(this).find('.area').text();
			var bath = $(this).find('.bath').text();
			var bed = $(this).find('.bed').text();
			var imageSection = $(this).find('.property-image-div').html();

			var imageBlock = $('<div class="list-img col-md-4"/>').html(imageSection);
			var infoBlock = $('<div class="list-info col-md-4"/>')
					.append($('<div/>').text(propertyName))
					.append($('<div/>').text(location))
					.append($('<div/>').text("Rate: Rs" + rate))
					.append($('<div class="for-sale"/>').text(purpose));
			var productInfo = $('<div class="list-info-property col-md-3"/>')
					.append($('<div/>').text("Area: " + area))
					.append($('<div/>').text("Baths: " + bath))
					.append($('<div/>').text("Beds: " + bed));

			var article = $('<article class="row"/>').append(imageBlock).append(infoBlock).append(productInfo);
			listContainer.append(article);
		});

		$('.recent-article').find('.grid-view').hide();
		$('.recent-article').append(listContainer);
	}
})

$('.grid-view-trigger').on('click', function() {
	$('.list-view').hide();
	$('.grid-view').show();
})



