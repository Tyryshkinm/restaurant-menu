## API
In this api you have to set two headers:

`Content-Type: application/json`

`X-Requested-With: XMLHttpRequest`

### User:
#### Signup

------------


Method: `POST`

URL: **/api/auth/signup**

Request data:
```json
{
	"name": "string",
	"email": "email",
	"password": "string",
	"password_confirmation": "string"
}
```
Response data (201):
```json
{
	"message": "Successfully created user!"
}
```
#### Login

------------


Method: `POST`

URL: **/api/auth/login**

Request data:
```json
{
	"email": "email",
	"password": "string",
	"remember_me": true
}
```
Example response data (200):
```json
{
	"access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcyMGE3YmNlMzY0Yzc3MTM0ODc2ZTlkZjgxYzYxNGUwMDczNzYyNjU4MjgyNzZmOThlYzZhMWVmYWIyZjk1YzA0NzUyZjcxZDhkNTI0ZWFhIn0.eyJhdWQiOiIxIiwianRpIjoiNzIwYTdiY2UzNjRjNzcxMzQ4NzZlOWRmODFjNjE0ZTAwNzM3NjI2NTgyODI3NmY5OGVjNmExZWZhYjJmOTVjMDQ3NTJmNzFkOGQ1MjRlYWEiLCJpYXQiOjE1MzI4NTk0MTksIm5iZiI6MTUzMjg1OTQxOSwiZXhwIjoxNTY0Mzk1NDE5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.tBTxHQaRCoxwKM6w8O8hUFQ-7FwZbbWHoVR3WdBrUEZZiMPGCSWf6NCKAIEC1oJMhA0640XQdW0MbnkRb8HO0o138n6FhSB_mI8p8uCQ0agf2ruLNeXU3378GZMlvN9pklu4Z2PH703YQ-sfQtj0JIIwiHOERhDXsWLAkHBYNKOZAdvzkuvE7v1SvKKxqYFkuAKrF7JYIj4LQUl-sk2ZdkRl9ZClIPwz0oeuWv5Gn6B_r5C-GNoqJefarAP0-DJwMXYyaXS-qVXrdZ6jI2Hj684kf7dlHH1LjCNkY94YSvlV_uPmIOOJqXISGvpzOXKvhGqKCneRNpkdK_xYj1A6_MyJiVP9mDS48EM10DEeeGEtR0Vhues1P5OQdZ6NTIEqEq2Q0WYqqsOu05u5c1KX9NYWjeWKzzq542CxuZU5GBLYuksg7BkReYb6oxA2Q71Ear6MNm6SKd3dxDfjilWS50Pmw5lRLOR0-z4qC7GCentlGk0SXjrMNXEV6CwWmhKVaAO60yn231OhttRZa0ITsbDsup5Msb-7Ca8dL6bJvZbiZgay4felFXpZwvgwIoXiNy_8L8TZ20LJoPgsTIubGAAsAoCBKQkK20dipqgitBHJL3sY84TEUkeoF9NYWHGKDShf9bhnLpY6P3cZ6yx6enpPj99F56NEAMHfMpd7PyY",
	"token_type": "Bearer",
	"expires_at": "2019-07-29 10:16:59"
}
```
#### Logout

------------


Method: `GET`

URL: **/api/auth/logout**

Header: `Authorization: Bearer access_token `

Response data (200):
```json
{
	"message": "Successfully logged out"
}
```
#### User

------------

Method: `GET`

URL: **/api/auth/user**

Header: `Authorization: Bearer access_token `

Example response data (200):
```json
{
	"id": 1,
	"name": "test",
	"email": "test@test.com",
	"created_at": "2018-07-29 08:35:51",
	"updated_at": "2018-07-29 08:35:51"
}
```
### Menu:
#### Get a listing of the menus

------------

Method: `GET`

URL: **/api/menus**

Example response data (200):
```json
[
	{
		"id": 1,
		"name": "Pan-Asian cuisine",
		"enabledFrom": "2018-07-29 12:00:00",
		"enabledUntil": "2018-07-29 16:00:00",
		"created_at": "2018-07-29 08:35:51",
		"updated_at": "2018-07-29 08:35:51"
	},
	{
		"id": 2,
		"name": "Buryat cuisine",
		"enabledFrom": "2018-07-29 16:00:00",
		"enabledUntil": "2018-07-29 20:00:00",
		"created_at": "2018-07-29 08:35:51",
		"updated_at": "2018-07-29 08:35:51"
	}
]
```
#### Get the specified menu

------------


Method: `GET`

URL: **/api/menus/{menu_id}**

Example response data (200):
```json
{
	"id": 1,
	"name": "Pan-Asian cuisine",
	"enabledFrom": "2018-07-30 12:00:00",
	"enabledUntil": "2018-07-30 16:00:00",
	"created_at": "2018-07-30 20:03:40",
	"updated_at": "2018-07-30 20:03:40"
}
```
#### Create new menu

------------


Method: `POST`

URL: **/api/menus**

Header: `Authorization: Bearer access_token `

Request data:
```json
{
	"name": "string",
	"enabledFrom": "datetime",
	"enabledUntil": "datetime"
}
```
Example response data (201):
```json
{
	"name": "New menu created via the API",
	"enabledFrom": "2018-07-29 08:35:51",
	"enabledUntil": "2018-07-29 12:35:51",
	"updated_at": "2018-07-29 10:51:42",
	"created_at": "2018-07-29 10:51:42",
	"id": 3
}
```
#### Update the specified menu

------------

Method: `PUT`

URL: **/api/menus/{menu_id}**

Header: `Authorization: Bearer access_token `

Request data:
```json
{
	"name": "string",
	"enabledFrom": "datetime",
	"enabledUntil": "datetime"
}
```
Example response data (200):
```json
{
	"id": 3,
	"name": "Updated menu via api",
	"enabledFrom": "2018-07-29 08:35:51",
	"enabledUntil": "2018-07-29 12:35:51",
	"created_at": "2018-07-29 10:51:42",
	"updated_at": "2018-07-29 10:55:46"
}
```
#### Remove the specified menu

------------

Method: `DELETE`

URL: **/api/menus/{menu_id}**

Header: `Authorization: Bearer access_token `

Response data (204): return null.
### Product:
#### Get a listing of the products of the specified menu

------------


Method: `GET`

URL: **/api/menus/{menu_id}/products**

Example response data (200):
```json
[
	{
		"id": 1,
		"name": "Quesadilla",
		"menu_id": 1,
		"position": 1,
		"created_at": "2018-07-30 20:03:40",
		"updated_at": "2018-07-30 20:03:40"
	},
	{
		"id": 2,
		"name": "Ramen",
		"menu_id": 1,
		"position": 2,
		"created_at": "2018-07-30 20:03:40",
		"updated_at": "2018-07-30 20:03:40"
	},
	{
		"id": 3,
		"name": "Tom-Yam",
		"menu_id": 1,
		"position": 3,
		"created_at": "2018-07-30 20:03:40",
		"updated_at": "2018-07-30 20:03:40"
	}
]
```
#### Get the specified product

------------

Method: `GET`

URL: **/api/menus/{menu_id}/products/{product_id}**

Example response data (200):
```json
{
	"id": 1,
	"name": "Quesadilla",
	"menu_id": 1,
	"position": 1,
	"created_at": "2018-07-30 20:03:40",
	"updated_at": "2018-07-30 20:03:40"
}
```
#### Create new product to the specified menu

------------

Method: `POST`

URL: **/api/menus/{menu_id}/products**

Header: `Authorization: Bearer access_token `

Request data:
```json
{
	"name": "string",
	"position": "integer"
}
```
Example response data (201):
```json
{
	"name": "Created product via api",
	"position": 1,
	"menu_id": "1",
	"updated_at": "2018-07-29 13:10:21",
	"created_at": "2018-07-29 13:10:21",
	"id": 9
}
```
#### Update the specified product

------------

Method: `PUT`

URL: **/api/menus/{menu_id}/products/{product_id}**

Header: `Authorization: Bearer access_token `

Request data:
```json
{
	"name": "string",
	"position": "integer"
}
```
Example response data (200):
```json
{
	"id": 1,
	"name": "Update product via api",
	"menu_id": 1,
	"position": 1,
	"created_at": "2018-07-29 12:40:49",
	"updated_at": "2018-07-29 12:59:15"
}
```
#### Remove the specified product

------------

Method: `DELETE`

URL: **/api/menus/{menu_id}/products/{product_id}**

Header: `Authorization: Bearer access_token `

Response data (204): return null.