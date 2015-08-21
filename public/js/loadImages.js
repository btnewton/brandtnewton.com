$(window).load(function() {
	$('span[img-path]').prepend(function(index){
		var path = $(this).attr('img-path')
		var imgClass = $(this).attr('img-class')
		return '<img alt="" src="img/' + path + '" class="' + imgClass + '"">'
	})
})