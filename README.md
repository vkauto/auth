# Аутентификация

```php
use VKauto\Auth\Auth;

# Можно войти напрямую
$user = Auth::directly("+79057151171", "password");

# Или запросить информацию пользователя, передав токен
$user = Auth::byToken('access_token');
```

Оба метода возвращают класс `Account`.
