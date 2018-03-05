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

#Trip Planner

Trip Planner functions
<!-- START_8e9fd31a72d31bdd4d5bc73823037755 -->
## api/trips/new

Create Trip Plan - step 1

parameter String "title" (required) <br />
parameter unix_timestamp "date" (required) <br />
parameter Integer "privacy" (required) <br />

> Example request:

```bash
curl -X POST "http://localhost/api/trips/new" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/trips/new",
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
`POST api/trips/new`


<!-- END_8e9fd31a72d31bdd4d5bc73823037755 -->

<!-- START_7f71c334dc70c4c3b193a6a86e6cb095 -->
## api/trips/add_city

Create Trip Plan - step 2

parameter Integer "trip_id" (required) <br />
parameter Integer "city_id" (required) <br />
parameter Integer "order" (required) <br />
parameter Unix timestamp "date" (required) <br />

> Example request:

```bash
curl -X POST "http://localhost/api/trips/add_city" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/trips/add_city",
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
`POST api/trips/add_city`


<!-- END_7f71c334dc70c4c3b193a6a86e6cb095 -->

<!-- START_0939528eca8a1682a7aacb1726e42a65 -->
## api/trips/add_place

Create Trip Plan - step 3

parameter Integer "trip_id" (required) <br />
parameter Integer "place_id" (required) <br />
parameter Integer "order" (required) <br />
parameter Unix timestamp "date" (required) <br />
parameter Unix timestamp "time" (optional) <br />
parameter Unix timestamp "duration" (optional) <br />
parameter Integer "budget" (optional) <br />

> Example request:

```bash
curl -X POST "http://localhost/api/trips/add_place" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/trips/add_place",
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
`POST api/trips/add_place`


<!-- END_0939528eca8a1682a7aacb1726e42a65 -->

#User

All users &amp; membership operations
<!-- START_f9554a1efe2f359d6df453375a7dd2e5 -->
## api/users/create/facebook

> Example request:

```bash
curl -X POST "http://localhost/api/users/create/facebook" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/facebook",
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
`POST api/users/create/facebook`


<!-- END_f9554a1efe2f359d6df453375a7dd2e5 -->

<!-- START_070b6f35496283a667d4880896adecb0 -->
## api/users/create/facebook

> Example request:

```bash
curl -X GET "http://localhost/api/users/create/facebook" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/facebook",
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
{
    "data": {
        "message": [
            [
                "Fb user id not provided.",
                "Email not provided."
            ]
        ]
    },
    "code": 404,
    "success": false
}
```

### HTTP Request
`GET api/users/create/facebook`

`HEAD api/users/create/facebook`


<!-- END_070b6f35496283a667d4880896adecb0 -->

<!-- START_ae8a5c13785a68890543386a59752d32 -->
## api/users/create/twitter

> Example request:

```bash
curl -X POST "http://localhost/api/users/create/twitter" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/twitter",
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
`POST api/users/create/twitter`


<!-- END_ae8a5c13785a68890543386a59752d32 -->

<!-- START_23ee7d780ff638faed61ff54d9c88dff -->
## api/users/create/twitter

> Example request:

```bash
curl -X GET "http://localhost/api/users/create/twitter" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/twitter",
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
{
    "data": {
        "message": [
            [
                "Twitter user id not provided.",
                "Email not provided."
            ]
        ]
    },
    "code": 404,
    "success": false
}
```

### HTTP Request
`GET api/users/create/twitter`

`HEAD api/users/create/twitter`


<!-- END_23ee7d780ff638faed61ff54d9c88dff -->

<!-- START_20cf12ef86f7b55eddf6c0a1d1a30fff -->
## api/users/create/twitter/login

> Example request:

```bash
curl -X GET "http://localhost/api/users/create/twitter/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/twitter/login",
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
{
    "success": true,
    "data": {
        "oauth_token": "lbH2aQAAAAAA4LB9AAABYfVqV_Y",
        "oauth_token_secret": "eIrobpDumIdSZvgY8AZF2yYPeS78I921"
    },
    "code": 200
}
```

### HTTP Request
`GET api/users/create/twitter/login`

`HEAD api/users/create/twitter/login`


<!-- END_20cf12ef86f7b55eddf6c0a1d1a30fff -->

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

<!-- START_23523d383e4cf18b2d7903817da416c5 -->
## api/users/create/step2

> Example request:

```bash
curl -X POST "http://localhost/api/users/create/step2" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/create/step2",
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
`POST api/users/create/step2`


<!-- END_23523d383e4cf18b2d7903817da416c5 -->

<!-- START_8b402bdafe5d38489dcb403c6a1cee12 -->
## api/users/set/fav_countries

> Example request:

```bash
curl -X POST "http://localhost/api/users/set/fav_countries" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/set/fav_countries",
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
`POST api/users/set/fav_countries`


<!-- END_8b402bdafe5d38489dcb403c6a1cee12 -->

<!-- START_188be3c3c08144dd040153c62a733725 -->
## api/users/set/fav_places

> Example request:

```bash
curl -X POST "http://localhost/api/users/set/fav_places" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/set/fav_places",
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
`POST api/users/set/fav_places`


<!-- END_188be3c3c08144dd040153c62a733725 -->

<!-- START_476e98d80e2f6b67410e48f21f0564c3 -->
## api/users/set/travel_styles

> Example request:

```bash
curl -X POST "http://localhost/api/users/set/travel_styles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/set/travel_styles",
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
`POST api/users/set/travel_styles`


<!-- END_476e98d80e2f6b67410e48f21f0564c3 -->

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
{
    "data": {
        "message": [
            "Wrong Token Provided."
        ]
    },
    "code": 400,
    "success": false
}
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

<!-- START_aa6088985d85f70a83fb8f1f09a9264b -->
## api/users/reset

> Example request:

```bash
curl -X POST "http://localhost/api/users/reset" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/reset",
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
`POST api/users/reset`


<!-- END_aa6088985d85f70a83fb8f1f09a9264b -->

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

<!-- START_257bb864c10078124525d3376f487ed9 -->
## api/users/unhidecontent

> Example request:

```bash
curl -X POST "http://localhost/api/users/unhidecontent" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/users/unhidecontent",
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
`POST api/users/unhidecontent`


<!-- END_257bb864c10078124525d3376f487ed9 -->

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
<!-- START_09de46a445ee056690bd2ac3e70e5750 -->
## api/authenticate

> Example request:

```bash
curl -X GET "http://localhost/api/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/authenticate",
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
[
    {
        "id": 1,
        "name": "Admin Istrator",
        "username": "Admin",
        "email": "admin@admin.com",
        "address": "dummy address",
        "single": null,
        "gender": null,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": "418af2a3480f69e3abd88e1f6c635331",
        "confirmed": 1,
        "created_at": "2017-06-09 16:46:47",
        "updated_at": "2017-06-09 16:46:47",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 2,
        "name": "Backend User",
        "username": "backend_user",
        "email": "executive@executive.com",
        "address": "dummy address",
        "single": null,
        "gender": null,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": "621b4895e93f560c7b1d88229471c870",
        "confirmed": 1,
        "created_at": "2017-06-09 16:46:47",
        "updated_at": "2017-06-09 16:46:47",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 3,
        "name": "Default User",
        "username": "user",
        "email": "user@user.com",
        "address": "dummy address",
        "single": null,
        "gender": null,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": "021aabe00f5aad4884e039722d549126",
        "confirmed": 1,
        "created_at": "2017-06-09 16:46:47",
        "updated_at": "2017-06-09 16:46:47",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 5,
        "name": "testfdsfsdfsdfsd",
        "username": "test_account",
        "email": "farzammoeen007@gmail.com",
        "address": "132sfsdfdsfdsf",
        "single": null,
        "gender": 1,
        "children": null,
        "age": 30,
        "profile_picture": "1500471157_profile_image.jpeg",
        "mobile": "+966123456789",
        "status": 1,
        "nationality": "Pakistani",
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-13 16:28:23",
        "updated_at": "2017-08-03 18:56:56",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 7,
        "name": "aya12345678",
        "username": "aya123",
        "email": "aya.adel.cs@gml.com",
        "address": null,
        "single": null,
        "gender": 1,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-16 13:19:49",
        "updated_at": "2017-07-26 21:20:04",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": "AqnuqGiNXsdMR0RB3t8S1500285719WDsxellhGTMhkaLKQ4xN",
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 8,
        "name": "aya12345678",
        "username": "aya1234",
        "email": "aya.adel.cs@ghml.com",
        "address": null,
        "single": null,
        "gender": 1,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": "123456",
        "status": 0,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-16 13:23:56",
        "updated_at": "2017-07-16 13:23:56",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 9,
        "name": "AyaAdelsayed",
        "username": "aya1237",
        "email": "aya.adel.cs@gmail.com",
        "address": "egypt",
        "single": null,
        "gender": 1,
        "children": null,
        "age": 20,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": "egyptian",
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-17 13:09:22",
        "updated_at": "2017-08-20 20:57:24",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 11,
        "name": "Utsav",
        "username": "Utsav Shah",
        "email": "shahutsav70@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 21,
        "profile_picture": null,
        "mobile": "+91 81234 50000",
        "status": 1,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "021d8df2d3c53ba9578c7e1ed10d0609",
        "confirmed": 1,
        "created_at": "2017-07-25 12:09:58",
        "updated_at": "2018-01-17 13:17:20",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 14,
        "name": "Lakshmi Santhi",
        "username": "Lakshmi",
        "email": "n.lakshmisanthi@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 40,
        "profile_picture": null,
        "mobile": "+91 81234 43212",
        "status": 0,
        "nationality": "India",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "3d9d3623b64b2013b0ce83cae5cc7316",
        "confirmed": 1,
        "created_at": "2017-07-25 12:21:56",
        "updated_at": "2017-09-10 12:45:14",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 15,
        "name": "Amrita Khandelwal",
        "username": "Amrita",
        "email": "khandoo.amrita@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 20,
        "profile_picture": null,
        "mobile": "+91 81234 82719",
        "status": 0,
        "nationality": "India",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "50a86825ee5c578b5a14f6f80f485d41",
        "confirmed": 1,
        "created_at": "2017-07-25 12:44:37",
        "updated_at": "2017-09-30 23:49:17",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 16,
        "name": "Meenal Chaturvedi",
        "username": "Meenal",
        "email": "Chaturvedi.meenal@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 25,
        "profile_picture": null,
        "mobile": "+91 81239 48626",
        "status": 1,
        "nationality": "India",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "7f129b12d01f963a9da83bc0a17d62bd",
        "confirmed": 1,
        "created_at": "2017-07-25 12:51:38",
        "updated_at": "2017-08-10 15:52:18",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 17,
        "name": "Jasvinder",
        "username": "Jasvinder",
        "email": "malik.kaur24@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 30,
        "profile_picture": null,
        "mobile": "+91 81228 86527",
        "status": 1,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "113b35ddeaf79875f1d8e8a7bd446d3c",
        "confirmed": 1,
        "created_at": "2017-07-26 01:43:15",
        "updated_at": "2017-08-10 15:55:53",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 18,
        "name": "Sugyan Swain",
        "username": "Sugyan",
        "email": "sugyanswain@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 25,
        "profile_picture": null,
        "mobile": "+91 87262 72668",
        "status": 0,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "765e258d41f9f5d28f094e4be4f691b8",
        "confirmed": 1,
        "created_at": "2017-07-26 01:51:22",
        "updated_at": "2017-08-10 16:02:10",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 19,
        "name": "test123456789",
        "username": "test1234",
        "email": "phpawy@gmail.com",
        "address": null,
        "single": null,
        "gender": 1,
        "children": null,
        "age": null,
        "profile_picture": "1501187621_profile_image.jpeg",
        "mobile": "+2661224652049",
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-26 15:07:25",
        "updated_at": "2017-07-27 23:33:41",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 20,
        "name": "Arooba Berlas",
        "username": "Arooba",
        "email": "arooba_berlas@live.com",
        "address": "Khobar",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 25,
        "profile_picture": null,
        "mobile": "+966 51 617 7271",
        "status": 1,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "ca258495a3a061563d7bc776070df147",
        "confirmed": 1,
        "created_at": "2017-07-26 17:55:44",
        "updated_at": "2017-08-10 15:56:35",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 21,
        "name": "aya14567",
        "username": "aya123456789",
        "email": "bezattest@gmail.com",
        "address": null,
        "single": null,
        "gender": 1,
        "children": null,
        "age": null,
        "profile_picture": "1501413628_profile_image.jpeg",
        "mobile": "+01224652049",
        "status": 3,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-07-26 21:55:24",
        "updated_at": "2017-08-02 22:15:53",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 22,
        "name": "Zohaib Irfan",
        "username": "Zohaib",
        "email": "zohaibirfanaziz@gmail.com",
        "address": "Riyadh",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 19,
        "profile_picture": null,
        "mobile": "+966 56 239 6671",
        "status": 1,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "6380edcacdbb28a8d41531139dff87e3",
        "confirmed": 1,
        "created_at": "2017-07-26 22:50:19",
        "updated_at": "2017-08-17 16:09:33",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 23,
        "name": "Khyati Pitroda",
        "username": "Khyati",
        "email": "pitrodakathy@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 25,
        "profile_picture": null,
        "mobile": "+91 81244 28734",
        "status": 1,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "261078af1ead0570f77f16370930cfb6",
        "confirmed": 1,
        "created_at": "2017-07-27 11:43:22",
        "updated_at": "2017-08-10 23:52:25",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 24,
        "name": "Prafulla",
        "username": "Prafulla",
        "email": "prafullasar41@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 27,
        "profile_picture": null,
        "mobile": "+91 81727 28172",
        "status": 0,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "595c8a1c837b17497475fc6da2dea68e",
        "confirmed": 1,
        "created_at": "2017-07-29 15:01:16",
        "updated_at": "2017-08-10 16:04:25",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 26,
        "name": "Shazaib Irfan",
        "username": "Shazaib",
        "email": "Shazaib@travooo.com",
        "address": "Riyadh",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 21,
        "profile_picture": "",
        "mobile": "+966 541755416",
        "status": 1,
        "nationality": "Saudi Arabia",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "6ad13bb361ae781957c31356df7694ea",
        "confirmed": 1,
        "created_at": "2017-08-10 15:41:25",
        "updated_at": "2017-08-10 15:41:25",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 27,
        "name": "Anas",
        "username": "Anas",
        "email": "AnasDankMemes@gmail.com",
        "address": "Riyadh",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 23,
        "profile_picture": "",
        "mobile": "+966 552714256",
        "status": 1,
        "nationality": "Saudi Arabia",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "5321c20721299f77ba72245dcb7f3037",
        "confirmed": 1,
        "created_at": "2017-08-17 16:09:00",
        "updated_at": "2017-09-03 15:20:22",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 28,
        "name": "Pliskin",
        "username": "Pliskin",
        "email": "playyamoon@gmail.com",
        "address": "Riyadh",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 29,
        "profile_picture": "",
        "mobile": "+966 58 2873298",
        "status": 1,
        "nationality": "Saudi Arabia",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "48c56f460316eba136ffc407784de58a",
        "confirmed": 1,
        "created_at": "2017-08-17 16:21:36",
        "updated_at": "2017-08-17 16:21:36",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 29,
        "name": "ayaadelabdo",
        "username": "ayaadelsayed",
        "email": "aakef85@gmail.com",
        "address": null,
        "single": null,
        "gender": 1,
        "children": null,
        "age": null,
        "profile_picture": null,
        "mobile": null,
        "status": 1,
        "nationality": null,
        "public_profile": null,
        "notifications": null,
        "messages": null,
        "sms": null,
        "confirmation_code": null,
        "confirmed": 0,
        "created_at": "2017-08-20 20:34:01",
        "updated_at": "2017-08-20 20:43:42",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 30,
        "name": "Ahmed Iqbal",
        "username": "Ahmed",
        "email": "thepotatostation@gmail.com",
        "address": "Riyadh",
        "single": null,
        "gender": 0,
        "children": null,
        "age": 23,
        "profile_picture": "",
        "mobile": "+966 541755416",
        "status": 0,
        "nationality": "Pakistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "ff4669225df0b126bba64a9f36331e8b",
        "confirmed": 1,
        "created_at": "2017-08-27 13:38:44",
        "updated_at": "2018-02-08 12:05:05",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 31,
        "name": "Karan Pitroda",
        "username": "Karan",
        "email": "pitrodakaran1406@gmail.com",
        "address": "India",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 30,
        "profile_picture": "",
        "mobile": "+91 812922 3329",
        "status": 1,
        "nationality": "India",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "379cc6684a9a4e53ad96f961cc66e346",
        "confirmed": 1,
        "created_at": "2017-10-02 12:58:35",
        "updated_at": "2017-10-02 12:58:35",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 33,
        "name": "Abdulahad Shah",
        "username": "Abdulahad",
        "email": "Klindamycin@gmail.com",
        "address": "Saudi Arabia",
        "single": 0,
        "gender": 0,
        "children": null,
        "age": 21,
        "profile_picture": "",
        "mobile": "+966 541755416",
        "status": 1,
        "nationality": "Pakistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "d4725f00a73df618a2ceaf0c917fb67f",
        "confirmed": 1,
        "created_at": "2017-10-15 07:56:54",
        "updated_at": "2017-10-15 07:56:54",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    },
    {
        "id": 34,
        "name": "Fares Arnous",
        "username": "Fares",
        "email": "FaresArnous@bezaat.com",
        "address": "Canada",
        "single": 1,
        "gender": 0,
        "children": null,
        "age": 33,
        "profile_picture": null,
        "mobile": "+1 210-555-2811",
        "status": 0,
        "nationality": "Afghanistan",
        "public_profile": 1,
        "notifications": 1,
        "messages": 1,
        "sms": 1,
        "confirmation_code": "d757268f6c647e67b64628e52289c8f8",
        "confirmed": 1,
        "created_at": "2017-11-26 10:48:38",
        "updated_at": "2018-01-17 13:16:26",
        "deleted_at": null,
        "last_login": null,
        "travel_type": null,
        "display_name": null,
        "password_reset_token": null,
        "login_type": 1,
        "social_key": null
    }
]
```

### HTTP Request
`GET api/authenticate`

`HEAD api/authenticate`


<!-- END_09de46a445ee056690bd2ac3e70e5750 -->

<!-- START_4a6a89e9e0eaea9c72ceea57315f2c42 -->
## api/authenticate

> Example request:

```bash
curl -X POST "http://localhost/api/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/authenticate",
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
`POST api/authenticate`


<!-- END_4a6a89e9e0eaea9c72ceea57315f2c42 -->

<!-- START_caa025f427924fde9905b0558bff61b1 -->
## api/pages/create

> Example request:

```bash
curl -X POST "http://localhost/api/pages/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/pages/create",
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
`POST api/pages/create`


<!-- END_caa025f427924fde9905b0558bff61b1 -->

<!-- START_0becd47bb0258d2280de5b28a0932c33 -->
## api/pages/add_admin

> Example request:

```bash
curl -X POST "http://localhost/api/pages/add_admin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/pages/add_admin",
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
`POST api/pages/add_admin`


<!-- END_0becd47bb0258d2280de5b28a0932c33 -->

<!-- START_6164819fccbca2e05cb2a09769d44215 -->
## api/pages/remove_admin

> Example request:

```bash
curl -X POST "http://localhost/api/pages/remove_admin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/pages/remove_admin",
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
`POST api/pages/remove_admin`


<!-- END_6164819fccbca2e05cb2a09769d44215 -->

<!-- START_a0fb5ca7f21ac06ef4467be05479b170 -->
## api/pages/deactivate

> Example request:

```bash
curl -X POST "http://localhost/api/pages/deactivate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/pages/deactivate",
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
`POST api/pages/deactivate`


<!-- END_a0fb5ca7f21ac06ef4467be05479b170 -->

<!-- START_2e1d120aa3ec260ec296c0cd88c6c7c4 -->
## api/pages/notification_settings

> Example request:

```bash
curl -X POST "http://localhost/api/pages/notification_settings" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/pages/notification_settings",
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
`POST api/pages/notification_settings`


<!-- END_2e1d120aa3ec260ec296c0cd88c6c7c4 -->

<!-- START_97a95756ea9fe938ff39ab03e0302dc8 -->
## api/embassy/{user_id}/{session_token}/{country_id}/{embassy_id?}

> Example request:

```bash
curl -X GET "http://localhost/api/embassy/{user_id}/{session_token}/{country_id}/{embassy_id?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/embassy/{user_id}/{session_token}/{country_id}/{embassy_id?}",
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
`GET api/embassy/{user_id}/{session_token}/{country_id}/{embassy_id?}`

`HEAD api/embassy/{user_id}/{session_token}/{country_id}/{embassy_id?}`


<!-- END_97a95756ea9fe938ff39ab03e0302dc8 -->

<!-- START_f044efb43315e57a63fc6a356f6113da -->
## api/countries

> Example request:

```bash
curl -X GET "http://localhost/api/countries" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/countries",
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
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/countries`

`HEAD api/countries`


<!-- END_f044efb43315e57a63fc6a356f6113da -->

<!-- START_f53c23a9fcabe40cf9a5009305a1542b -->
## api/countries/search

> Example request:

```bash
curl -X POST "http://localhost/api/countries/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/countries/search",
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
`POST api/countries/search`


<!-- END_f53c23a9fcabe40cf9a5009305a1542b -->

<!-- START_ba2909add967c16d9b7b3637175c03ca -->
## api/countries/places

> Example request:

```bash
curl -X POST "http://localhost/api/countries/places" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/countries/places",
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
`POST api/countries/places`


<!-- END_ba2909add967c16d9b7b3637175c03ca -->

<!-- START_e78b92e9574948d7bbb240a67761124f -->
## api/places/search

> Example request:

```bash
curl -X POST "http://localhost/api/places/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/places/search",
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
`POST api/places/search`


<!-- END_e78b92e9574948d7bbb240a67761124f -->

<!-- START_46679fed8f0fa75adeaa9965572abf2d -->
## api/travelstyles/search

> Example request:

```bash
curl -X POST "http://localhost/api/travelstyles/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/travelstyles/search",
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
`POST api/travelstyles/search`


<!-- END_46679fed8f0fa75adeaa9965572abf2d -->

<!-- START_cb9912535881d6e3ca79ea01efae8435 -->
## api/cities/search

> Example request:

```bash
curl -X POST "http://localhost/api/cities/search" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/cities/search",
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
`POST api/cities/search`


<!-- END_cb9912535881d6e3ca79ea01efae8435 -->

