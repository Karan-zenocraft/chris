(function ($) {
	$(document).ready(function () {

		var hash = window.location.hash;

		if (hash.indexOf('access_token') > 0) {
			
			var input = $('#meks-access-token');
			input.val(hash.split('=').pop());
			input.parents('form').find('#submit').click();

		}

	});

})(jQuery);

//https://mekshq.com/?auth_site=http%3A%2F%2Flocalhost%2Fmegaphone%2Fwp-admin%2Foptions-general.php%3Fpage%3Dmeks-instagram#access_token=3171358786.1736d1a.0eb4c9321f5e4c4f80b773a48bbc1975