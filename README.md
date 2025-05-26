# api-sale-challenge

PROVA PRÁTICA - TRAY - LWSA

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

## To-Do List


### API

- [x] Cadastrar vendedores informando nome e e-mail
- [x] Cadastrar vendas, informando o vendedor, o valor e a data da venda
- [x] Listar todos os vendedores
- [x] Listar todas as vendas
- [x] Listar todas as vendas por vendedor

### Aplicação

- [ ] Interagir com todos os endpoints da API
- [x] Enviar um e-mail para o vendedor ao final de cada dia com a quantidade de vendas realizadas no dia, o valor total delas e o valor total das comissões
- [x] Enviar um e-mail para o administrador do sistema contendo a soma de todas as vendas efetuadas no dia
- [x] Permitir que o administrador reenvie o e-mail de comissão a um determinado vendedor

### Bonus

- [ ] Implementar autenticação na API;
- [x] Implementar testes;
- [x] Implementar validação dos dados enviados;
- [x] Implementar uso de cache e fila
- [ ] Implementar uso de TypeScript

### Outros

- [x] Documentar start
- [x] Cache dos arquivos/rotas
- [x] Lista das rotas
- [x] Configurar PHPStan, Infection
- [ ] Money
- [ ] Supervisor para o envio dos emails
