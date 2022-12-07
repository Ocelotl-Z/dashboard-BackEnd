## Autorización

Paara cosumir la api se debera de utilizar el tipo de autorización **Bearer**.

```bash
-Header "Authorization: Bearer token_proporcionado_por_login"
```

Para obtener el toke de autorización de debera realizar el login de la sigueinte manera:

### Url:

> https://dashboard-app-sdaw-ii-ecsml.ondigitalocean.app/api/login

### Headers:

```bash
'Accept': 'application/json',
'Content-Type': 'application/json'
```

### Body:

```json
{
    "email": "examplel@example.com",
    "password": "password"
}
```

### Respuesta:

```json
{
	"token": "token_example",
	"user": {
		"id": 1,
		"name": "Example",
		"paternal_surname": "Example",
		"maternal_surname": "Example",
		"email": "Example@gmail.com",
		"email_verified_at": null,
		"current_team_id": null,
		"profile_photo_path": null,
		"created_at": "2022-12-07T02:45:11.000000Z",
		"updated_at": "2022-12-07T02:45:11.000000Z",
		"two_factor_confirmed_at": null,
		"profile_photo_url": "Example URL",
		"full_name": "Example Full NAME"
	}
}
```

## Perfil

Para obtener la informacion del usuario se hara de la siguiente manera:

### Url:

> https://dashboard-app-sdaw-ii-ecsml.ondigitalocean.app/api/user-profile

### Headers:

```bash
'Accept': 'application/json',
'Authorization': 'Bearer token_example'
```

### Respuesta:

```json
{
    "user": {
        "id": 1,
        "name": "Example User",
        "email": "example@example.com",
        "photo_url": "example.com",
        "roles": ["Admin"]
    }
}
```

## Logout

Para cerrar sesion se manda lo siguiente:

### Url:

> https://dashboard-app-sdaw-ii-ecsml.ondigitalocean.app/api/logout

### Headers:

```bash
'Accept': 'application/json',
'Authorization': 'Bearer token_example'
```

### Respuesta:

```json
}
	"message": "Logout OK"
}
```
