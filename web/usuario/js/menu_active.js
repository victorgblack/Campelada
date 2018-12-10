$(function() {
	if (route.indexOf('/') > 0) {
		var controller = route.substr(0,route.indexOf('/'));
		console.log(controller);
	} else controller = route;

	$('.sidebar-wrapper ul.nav li').removeClass('active');
	$('.sidebar-wrapper ul.nav li[controller="'+controller+'"]').addClass('active');
});