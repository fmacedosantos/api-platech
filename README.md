# API Platech

Bem-vindo à API **Platech**! Esta API fornece endpoints para gerenciamento de usuários, veículos e clientes, com autenticação, criação e busca de dados. A API foi desenvolvida com o intuito de facilitar o controle e a administração dos dados relacionados a veículos e clientes.

## URL Base

A URL base para todas as requisições é:

```
https://platech-b2bf5ba2cfc9.herokuapp.com/
```

> **Nota:** Somente domínios autorizados têm permissão para acessar essa API.

---

## Sumário

- [Recursos](#recursos)
- [Rotas](#rotas)
- [Exemplos de Uso](#exemplos-de-uso)
- [Autenticação](#autenticação)
- [Erros Comuns](#erros-comuns)

---

## Recursos

### Usuários

- **POST** `/users/login`: Autentica o usuário e retorna um token JWT.
- **POST** `/users/create`: Cadastra um novo usuário.

### Veículos

- **POST** `/plates/create`: Registra um novo veículo.
- **GET** `/plates/fetch`: Retorna a lista de veículos registrados.

### Clientes

- **POST** `/clients/create`: Cadastra um novo cliente.
- **GET** `/clients/fetch`: Retorna a lista de clientes cadastrados.

---

## Exemplos de Uso

### Autenticação

#### Login do Usuário

**Rota:** `POST /users/login`

**Corpo da Requisição:**
```json
{
  "cpf": "12345678900",
  "password": "suaSenhaSegura"
}
```

**Resposta Sucesso (200):**
```json
{
  "error": false,
  "success": true,
  "jwt": "token_jwt_gerado"
}
```

**Resposta Erro (400):**
```json
{
  "error": true,
  "success": false,
  "message": "Não foi possível autenticar."
}
```

### Registro de Usuário

**Rota:** `POST /users/create`

**Corpo da Requisição:**
```json
{
  "cpf": "12345678900",
  "password": "suaSenhaSegura"
}
```

**Resposta Sucesso (201):**
```json
{
  "error": false,
  "success": true,
  "message": "User registered successfully"
}
```

---

### Veículos

#### Registro de Veículo

**Rota:** `POST /plates/create`

**Corpo da Requisição:**
```json
{
  "plate": "ABC1234",
  "applicant": "Fulano de Tal",
  "type": "carro",
  "value": 50000,
  "paymentMethod": "cartao"
}
```

**Resposta Sucesso (201):**
```json
{
  "error": false,
  "success": true,
  "data": "Plate created successfully!"
}
```

#### Buscar Veículos

**Rota:** `GET /plates/fetch`

**Resposta Sucesso (200):**
```json
{
  "error": false,
  "success": true,
  "data": [
    {
      "plate": "ABC1234",
      "applicant": "Fulano de Tal",
      "type": "carro",
      "value": 50000,
      "paymentMethod": "cartao",
      "date": "2024-10-28"
    }
  ]
}
```

### Clientes

#### Registro de Cliente

**Rota:** `POST /clients/create`

**Corpo da Requisição:**
```json
{
  "applicant": "Cliente A",
  "company": "Empresa X",
  "phone": "11987654321",
  "registerType": "mensal",
  "priceCar": 200,
  "priceMotorcycle": 100
}
```

**Resposta Sucesso (201):**
```json
{
  "error": false,
  "success": true,
  "data": "Cliente cadastrado com sucesso!"
}
```

#### Buscar Clientes

**Rota:** `GET /clients/fetch`

**Resposta Sucesso (200):**
```json
{
  "error": false,
  "success": true,
  "data": [
    {
      "applicant": "Cliente A",
      "company": "Empresa X",
      "phone": "11987654321",
      "registerType": "mensal",
      "priceCar": 200,
      "priceMotorcycle": 100
    }
  ]
}
```

---

## Erros Comuns

- **1049**: Erro de conexão com o banco de dados.
- **23000**: Veículo já cadastrado.
- **22001**: Dados excedem o limite de tamanho permitido.
- **22003**: Valor muito grande para o campo.

---

## Arquitetura e Estrutura do Código

A API é organizada em uma estrutura MVC (Model-View-Controller), com validações no `UserService`, `PlateService` e `ClientService`, e autenticação implementada no `UserController`. 

### Exemplo de Controller (UserController)

```php
public function login(Request $request, Response $response)
{
    $body = $request::body();
    $userService = UserService::auth($body);
    if (isset($userService['error'])) {
        return $response::json(['error' => true, 'message' => $userService['error']], 400);
    }
    return $response::json(['success' => true, 'jwt' => $userService], 200);
}
```

---

Se tiver dúvidas ou dificuldades para usar esta API, por favor, entre em contato com o time de desenvolvimento através do email: [luancesetti16@gmail.com](mailto:luancesetti16@gmail.com)