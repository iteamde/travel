(function (window) {
	var api_key, oauth_token, request_url, popup, oauth_token_secret;
	var authorize_url = 'https://api.twitter.com/oauth/authenticate?oauth_token=';
	function init(options) {
		api_key = options.api_key;
		request_url = options.request_url;
	}
	function closePopup() {
		if (popup && !popup.closed) {
			popup.close();
		}
	}
	function getUrlQueryObject(query_string) {
		var vars = {}, hash;
		console.log(query_string);
		if (!query_string) {
			console.log("obj empty");
			return false;
		}
		// if(!obj.search)
		// {
		// 	console.log("obj search empty");
		// 	return false;
		// }

		// var query_string = obj.search;
		var hashes = query_string.slice(1).split('&');
		for (var i = 0; i < hashes.length; i++) {
			hash = hashes[i].split('=');
			vars[hash[0]] = hash[1];
		}
		return vars;
	}
	function sendError(message, callback) {
		var response = {
			success: false,
			message: message || 'Some Error Occurred'
		};
		if (typeof callback === 'function') {
			callback(response);
		}
	}
	function getOAuthToken(callback) {
		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function () {
			if (this.readyState == 4) {
				if (this.status === 0) {
					return callback('Internet Disconnected/Connection Timeout')
				}
				try {
					var response = JSON.parse(this.response);
					callback(null, response);
				} catch (error) {
					callback(error.message);
				}
				return;
			}
		};
		
		xhr.open("GET", request_url, true);
		xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
		xhr.send();
	}
	function authorize(callback) {
		if (!popup) {
			return callback('Popup Not initialized');
		}
		popup.location.href = authorize_url + oauth_token;
		var search = "";
		var wait = function () {
			if(!popup.closed){
				search = popup.location.search;
			}

			setTimeout(function () {
				
				console.log(search);
				return popup.closed ? callback(null, getUrlQueryObject(search)) : wait();
			}, 25);
		};
		wait();
	}
	function connect(callback) {
		if (!request_url) {
			return sendError('Request URL not provided', callback);
		}
		//Open a blank popup
		popup = window.open(null, '_blank', 'height=400,width=800,left=250,top=100,resizable=yes', true);
		//Get an oauth token from the callback url
		getOAuthToken(function (error, response) {
			if (error) {
				closePopup();
				return sendError(error, callback);
			}
			if (!response.success) {
				closePopup();
				return sendError(response.message, callback);
			}
			//Set the OAuth1 Token
			oauth_token = response.data.oauth_token;
			oauth_token_secret = response.data.oauth_token_secret;
			//Ask the user to authorize the app;
			authorize(function (error, response) {
				if (error) {
					closePopup();
					return sendError(error, callback);
				}
				if (!response || !response.oauth_token) {
					closePopup();
					return sendError('OAuth Token not Found', callback);
				}
				//Check if the oauth-token obtained in authorization, matches the original oauth-token
				if (response.oauth_token !== oauth_token) {
					return sendError('Invalid OAuth Token received from Twitter.', callback);
				}
				callback({
					success: true,
					oauth_token: response.oauth_token,
					oauth_token_secret: oauth_token_secret,
					oauth_verifier: response.oauth_verifier
				});
			});
		});
	}
	window.onload = function twitter() {
		if (typeof window.twitterInit == 'function') {
			window.twitterInit();
		}
	};
	window.twttr = {
		init: init,
		connect: connect
	};
})(window)


// window.twitterInit = twitterInit;
// function twitterInit() {
//     twttr.init({
//         api_key: 'TtJpZdOIch2fyGygTuOcnwf0F',
// 		//request_url: 'http://localhost/travo/public/api/users/create/twitter/login'
// 		request_url: 'http://uat.travooo.com/public/api/users/create/twitter/login'
//     });
// }

$(document).ready(function(){
    twttr.init({
        api_key: 'TtJpZdOIch2fyGygTuOcnwf0F',
		//request_url: 'http://localhost/travo/public/api/users/create/twitter/login'
		request_url: 'http://uat.travooo.com/public/api/users/create/twitter/login'
    });
});