# RODAR PROJETO INCREAZY

### Leia com atenção os comandos abaixo para execução

### Dependendo da verão do docker instalado utilize o "docker compose" sem traço

## COM DOCKER

## construção e inicialização
```bash
docker-compose up -d
```

## instalação das dependências
```bash
docker-compose exec app_increazy composer install
```

## permissão ncessária para desenvolvimento local
```bash
docker exec -it --user=root app_increazy chmod -R 777 /var/www
```

## Rodar Teste de Unidade

#### com docker
```bash
docker-compose exec app_increazy php artisan test --testsuite=Unit
```

#### local sem docker
```bash
php artisan test --testsuite=Unit
```

### INFO CONTAINER

```info

    VERSION PHP: 8.2
    VERSION LARAVEL: 10

```

## SEM DOCKER

Para rodar o projeto na máquina sem o uso de docker você precisa baixar as dependências abaixo do projeto.

- PHP 8.2 [DOWNLOAD](https://www.php.net/downloads.php)
- Composer [DOWNLOAD](https://getcomposer.org/download/)

### Desenvolvido

```bash

    - Victor emanuel Almeida Santos
    - victor_santos1162@hotmail.com
    - Desenvolvedor Back-End

```
# Increazy
