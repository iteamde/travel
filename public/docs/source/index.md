---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#Media

Media (images &amp; videos) uploaded by users
<!-- START_1b7672fa9cb58c074405b4b199147eee -->
## Create a new Media

This function will add new Media uploaded by user

> Example request:

```bash
curl -X POST "http://localhost/api/medias/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/create",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/create`


<!-- END_1b7672fa9cb58c074405b4b199147eee -->

<!-- START_37fda4cee7c270b193840ddbc87248f8 -->
## api/medias/comment

> Example request:

```bash
curl -X POST "http://localhost/api/medias/comment" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/comment",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/comment`


<!-- END_37fda4cee7c270b193840ddbc87248f8 -->

<!-- START_c4c1ef07484a368b9895595abe9d37cd -->
## api/medias/like

> Example request:

```bash
curl -X POST "http://localhost/api/medias/like" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/like",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/like`


<!-- END_c4c1ef07484a368b9895595abe9d37cd -->

<!-- START_3bc520401d00b0f2fdaeb2a4772f71f2 -->
## api/medias/unlike

> Example request:

```bash
curl -X POST "http://localhost/api/medias/unlike" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/unlike",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/unlike`


<!-- END_3bc520401d00b0f2fdaeb2a4772f71f2 -->

<!-- START_6a988e4b8e99799356d9b7c100eee83b -->
## api/medias/share

> Example request:

```bash
curl -X POST "http://localhost/api/medias/share" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/share",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/share`


<!-- END_6a988e4b8e99799356d9b7c100eee83b -->

<!-- START_11de4236d3eaa8fbfb46866df1d7783d -->
## api/medias/delete

> Example request:

```bash
curl -X POST "http://localhost/api/medias/delete" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/delete",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/delete`


<!-- END_11de4236d3eaa8fbfb46866df1d7783d -->

<!-- START_8d04cb3426ea17d86fd5bb6f1d17d8dc -->
## api/medias/hide

> Example request:

```bash
curl -X POST "http://localhost/api/medias/hide" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/hide",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/hide`


<!-- END_8d04cb3426ea17d86fd5bb6f1d17d8dc -->

<!-- START_6ffbad7172fba05d4b52fe08c1280841 -->
## api/medias/report

> Example request:

```bash
curl -X POST "http://localhost/api/medias/report" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/report",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/report`


<!-- END_6ffbad7172fba05d4b52fe08c1280841 -->

<!-- START_5fd41e7f8cfd3fe5a2ecc071f02535c0 -->
## api/medias/activity

> Example request:

```bash
curl -X POST "http://localhost/api/medias/activity" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/activity",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/activity`


<!-- END_5fd41e7f8cfd3fe5a2ecc071f02535c0 -->

<!-- START_8cbe0307e975a224759dd14030d4c1ac -->
## api/medias/description

> Example request:

```bash
curl -X POST "http://localhost/api/medias/description" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/description",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/medias/description`


<!-- END_8cbe0307e975a224759dd14030d4c1ac -->

<!-- START_2ba35e9a587b8228fe341ca83b3f94f8 -->
## api/medias/listbyuser/{user_id}/{session_token}/{media_user_id}

> Example request:

```bash
curl -X GET "http://localhost/api/medias/listbyuser/{user_id}/{session_token}/{media_user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/medias/listbyuser/{user_id}/{session_token}/{media_user_id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/medias/listbyuser/{user_id}/{session_token}/{media_user_id}`

`HEAD api/medias/listbyuser/{user_id}/{session_token}/{media_user_id}`


<!-- END_2ba35e9a587b8228fe341ca83b3f94f8 -->

#User

All users &amp; membership operations
<!-- START_57d87049be86661f752d2ec9525fb3df -->
## api/users/create

> Example request:

```bash
curl -X POST "http://localhost/api/users/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/create`


<!-- END_57d87049be86661f752d2ec9525fb3df -->

<!-- START_21ff1203a9357ffbb000ef4dd551dfd3 -->
## api/users/login

> Example request:

```bash
curl -X POST "http://localhost/api/users/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/login`


<!-- END_21ff1203a9357ffbb000ef4dd551dfd3 -->

<!-- START_1c2114cfb6f4c3cd287c5ef336ae2a2b -->
## api/users/logout

> Example request:

```bash
curl -X POST "http://localhost/api/users/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/logout",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/logout`


<!-- END_1c2114cfb6f4c3cd287c5ef336ae2a2b -->

<!-- START_0de18da4fc48197d78167f70e4bb3d5a -->
## api/users/forgot

> Example request:

```bash
curl -X POST "http://localhost/api/users/forgot" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/forgot",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/forgot`


<!-- END_0de18da4fc48197d78167f70e4bb3d5a -->

<!-- START_ee6aac793e2e8ce0bf853df5b70c2d91 -->
## api/users/activate/{token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/activate/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/activate/{token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/activate/{token}`

`HEAD api/users/activate/{token}`


<!-- END_ee6aac793e2e8ce0bf853df5b70c2d91 -->

<!-- START_1847655e706b0d31e93eb9724ef0fd8c -->
## api/users/info/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/info/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/info/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/info/{user_id}/{session_token}`

`HEAD api/users/info/{user_id}/{session_token}`


<!-- END_1847655e706b0d31e93eb9724ef0fd8c -->

<!-- START_6c7cf9cf8fa7baad6c92943cc4f74cac -->
## api/users/reset/{token}/{new_password}/{confirm_password}

> Example request:

```bash
curl -X GET "http://localhost/api/users/reset/{token}/{new_password}/{confirm_password}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/reset/{token}/{new_password}/{confirm_password}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/reset/{token}/{new_password}/{confirm_password}`

`HEAD api/users/reset/{token}/{new_password}/{confirm_password}`


<!-- END_6c7cf9cf8fa7baad6c92943cc4f74cac -->

<!-- START_dd67fb46db40b5bf9c9bb1ea0644897a -->
## api/users/fullname

> Example request:

```bash
curl -X POST "http://localhost/api/users/fullname" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/fullname",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/fullname`


<!-- END_dd67fb46db40b5bf9c9bb1ea0644897a -->

<!-- START_6faf06ad7551ac22d2f4beedc5b81e92 -->
## api/users/mobile

> Example request:

```bash
curl -X POST "http://localhost/api/users/mobile" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/mobile",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/mobile`


<!-- END_6faf06ad7551ac22d2f4beedc5b81e92 -->

<!-- START_062b1e08480ef311c8d4aaf6ee981120 -->
## api/users/address

> Example request:

```bash
curl -X POST "http://localhost/api/users/address" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/address",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/address`


<!-- END_062b1e08480ef311c8d4aaf6ee981120 -->

<!-- START_c18ad5ca3a8319be95e098cbffdfb38a -->
## api/users/age

> Example request:

```bash
curl -X POST "http://localhost/api/users/age" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/age",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/age`


<!-- END_c18ad5ca3a8319be95e098cbffdfb38a -->

<!-- START_7a5e3cb096f3207c1df8b6b8c099ae68 -->
## api/users/nationality

> Example request:

```bash
curl -X POST "http://localhost/api/users/nationality" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/nationality",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/nationality`


<!-- END_7a5e3cb096f3207c1df8b6b8c099ae68 -->

<!-- START_2f5e0fcaaf4c17fb43d43ca5cb9efcbb -->
## api/users/friends/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/friends/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/friends/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/friends/{user_id}/{session_token}`

`HEAD api/users/friends/{user_id}/{session_token}`


<!-- END_2f5e0fcaaf4c17fb43d43ca5cb9efcbb -->

<!-- START_1a845b7ea426ae3eb60024ea0aaa7d28 -->
## api/users/friends/{user_id}/{session_token}/{friends_id}

> Example request:

```bash
curl -X DELETE "http://localhost/api/users/friends/{user_id}/{session_token}/{friends_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/friends/{user_id}/{session_token}/{friends_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/users/friends/{user_id}/{session_token}/{friends_id}`


<!-- END_1a845b7ea426ae3eb60024ea0aaa7d28 -->

<!-- START_f8538d234665fb74eb78ea589f3b1eb7 -->
## api/users/profilepicture/{user_id}/{session_token}

> Example request:

```bash
curl -X POST "http://localhost/api/users/profilepicture/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/profilepicture/{user_id}/{session_token}",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/profilepicture/{user_id}/{session_token}`


<!-- END_f8538d234665fb74eb78ea589f3b1eb7 -->

<!-- START_dec5db55f1fc90b2d3d0418d57f6a8cf -->
## api/users/password

> Example request:

```bash
curl -X POST "http://localhost/api/users/password" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/password",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/password`


<!-- END_dec5db55f1fc90b2d3d0418d57f6a8cf -->

<!-- START_b3541c572261a20f46b46778c2af0c6d -->
## api/users/blocklist/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/blocklist/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/blocklist/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/blocklist/{user_id}/{session_token}`

`HEAD api/users/blocklist/{user_id}/{session_token}`


<!-- END_b3541c572261a20f46b46778c2af0c6d -->

<!-- START_3e4420d491b859302978129d6ef3b75d -->
## api/users/unblock

> Example request:

```bash
curl -X POST "http://localhost/api/users/unblock" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/unblock",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/unblock`


<!-- END_3e4420d491b859302978129d6ef3b75d -->

<!-- START_d154d98e7f489e926ac62473ea2ae41e -->
## api/users/hiddencontent/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/hiddencontent/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/hiddencontent/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/hiddencontent/{user_id}/{session_token}`

`HEAD api/users/hiddencontent/{user_id}/{session_token}`


<!-- END_d154d98e7f489e926ac62473ea2ae41e -->

<!-- START_6f761ba39b466d91682cc00fd146c17e -->
## api/users/onlinestatus

> Example request:

```bash
curl -X POST "http://localhost/api/users/onlinestatus" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/onlinestatus",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/onlinestatus`


<!-- END_6f761ba39b466d91682cc00fd146c17e -->

<!-- START_4f76529666e28d2af086157d2059197a -->
## api/users/unhideacontent

> Example request:

```bash
curl -X POST "http://localhost/api/users/unhideacontent" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/unhideacontent",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/unhideacontent`


<!-- END_4f76529666e28d2af086157d2059197a -->

<!-- START_bb16d362a1d5d5d652760962e2896078 -->
## api/users/deactivate

> Example request:

```bash
curl -X POST "http://localhost/api/users/deactivate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/deactivate",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/deactivate`


<!-- END_bb16d362a1d5d5d652760962e2896078 -->

<!-- START_9452936b203a7d506cc26139ab97a436 -->
## api/users/contact_privacy

> Example request:

```bash
curl -X POST "http://localhost/api/users/contact_privacy" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/contact_privacy",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/contact_privacy`


<!-- END_9452936b203a7d506cc26139ab97a436 -->

<!-- START_9a936b9ece610db289f457a194ad9c07 -->
## api/users/notification_settings

> Example request:

```bash
curl -X POST "http://localhost/api/users/notification_settings" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/notification_settings",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/notification_settings`


<!-- END_9a936b9ece610db289f457a194ad9c07 -->

<!-- START_e4b340879bb900383e64c14fe09a3795 -->
## api/users/tag/{user_id}/{session_token}/{query}

> Example request:

```bash
curl -X GET "http://localhost/api/users/tag/{user_id}/{session_token}/{query}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/tag/{user_id}/{session_token}/{query}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/tag/{user_id}/{session_token}/{query}`

`HEAD api/users/tag/{user_id}/{session_token}/{query}`


<!-- END_e4b340879bb900383e64c14fe09a3795 -->

<!-- START_541a8e19db8a7c7119384622717d39aa -->
## api/users/friend_request

> Example request:

```bash
curl -X POST "http://localhost/api/users/friend_request" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/friend_request",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/friend_request`


<!-- END_541a8e19db8a7c7119384622717d39aa -->

<!-- START_902e003826b8b2c2e9824a771ccf2697 -->
## api/users/my_friend_requests/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/my_friend_requests/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/my_friend_requests/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/my_friend_requests/{user_id}/{session_token}`

`HEAD api/users/my_friend_requests/{user_id}/{session_token}`


<!-- END_902e003826b8b2c2e9824a771ccf2697 -->

<!-- START_666b535b29ceb1335b04b6a87c139a0e -->
## api/users/accept_friend_request

> Example request:

```bash
curl -X POST "http://localhost/api/users/accept_friend_request" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/accept_friend_request",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/accept_friend_request`


<!-- END_666b535b29ceb1335b04b6a87c139a0e -->

<!-- START_2d626efb92e850498239e1c7b8f27849 -->
## api/users/block

> Example request:

```bash
curl -X POST "http://localhost/api/users/block" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/block",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/block`


<!-- END_2d626efb92e850498239e1c7b8f27849 -->

<!-- START_38a8bdb2d45640f5473d41fef63cd75c -->
## api/users/profilepicture/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/profilepicture/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/profilepicture/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/profilepicture/{user_id}/{session_token}`

`HEAD api/users/profilepicture/{user_id}/{session_token}`


<!-- END_38a8bdb2d45640f5473d41fef63cd75c -->

<!-- START_503aef76fe9c39045b2204eea3a71ccf -->
## api/users/add_favourites

> Example request:

```bash
curl -X POST "http://localhost/api/users/add_favourites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/add_favourites",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/add_favourites`


<!-- END_503aef76fe9c39045b2204eea3a71ccf -->

<!-- START_f2922251c6d05be2e0ab60ef131bd62c -->
## api/users/remove_favourites

> Example request:

```bash
curl -X POST "http://localhost/api/users/remove_favourites" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/remove_favourites",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/users/remove_favourites`


<!-- END_f2922251c6d05be2e0ab60ef131bd62c -->

<!-- START_a5fc097c1e7b42a765e8a61088269348 -->
## api/users/favourites/{user_id}/{session_token}

> Example request:

```bash
curl -X GET "http://localhost/api/users/favourites/{user_id}/{session_token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/favourites/{user_id}/{session_token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/users/favourites/{user_id}/{session_token}`

`HEAD api/users/favourites/{user_id}/{session_token}`


<!-- END_a5fc097c1e7b42a765e8a61088269348 -->

#general
<!-- START_8e0ec6fba3d92922930a840cdbf22a68 -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET "http://localhost/api/documentation" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/documentation",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/documentation`

`HEAD api/documentation`


<!-- END_8e0ec6fba3d92922930a840cdbf22a68 -->

