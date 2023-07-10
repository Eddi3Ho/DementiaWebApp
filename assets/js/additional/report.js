$(document).ready(function () {
	function update_ep_count() {
		$("#ep_counter").animate(
			{
				counter: counter5,
			},
			{
				duration: 2000,
				easing: "swing",
				step: function (now) {
					$(this).text(Math.ceil(now));
				},
				complete: update_ep_count,
			}
		);
	}
	update_ep_count();
});
