# api-sale-challenge

## Informações do projeto

O start do projeto sera feito com o [Sail](https://laravel.com/docs/12.x/sail)

Para Iniciar
``` 
./vendor/bin/sail up
```


Para Parar o projeto
``` 
./vendor/bin/sail down
```

Testes
``` 
./vendor/bin/sail test
```

Para acessar o Shell
```
./vendor/bin/sail shell
```

Em Seguida, pode-se rodar o Infection
```
./vendor/bin/infection
```


(Alguns dos relatorios gerados por ele, estao na paste de tests/reports)


Ou um comando composer para rodar o php-cs-fixer
```
composer lint:cs:fix
```

### Outros

- [x] Documentar start
- [x] Cache dos arquivos/rotas
- [x] Lista das rotas
- [x] Configurar PHPStan, Infection
- [ ] Money
- [ ] Supervisor para o envio dos emails
