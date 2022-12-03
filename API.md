## Autorización

Paara cosumir la api se debera de utilizar el tipo de autorización **Bearer**.

```bash
-Header "Authorization: Bearer token_proporcionado_por_login"
```

Para obtener el toke de autorización de debera realizar el login de la sigueinte manera:

### Url:

> http://127.0.0.1:8000/api/login

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
    "token": "token_example"
}
```

## Perfil

Para obtener la informacion del usuario se hara de la siguiente manera:

### Url:

> http://127.0.0.1:8000/api/user-profile

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

> http://127.0.0.1:8000/api/logout

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
