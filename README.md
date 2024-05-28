
# Teste Prático - Techsocial

Sistema para cadastro de usuários e pedidos. As tecnologias utilizadas são:

- PHP 8.2.19
- Bootstrap 5.3
- PHPUnit 10.5
- Doctrine 4.0
- MySQL 8.0




## Requisitos

Para a montagem do ambiente de desenvolvimento, os requisitos são:

- Docker Desktop
- Visual Studio Code ou outra IDE (PHP Storm, NetBeans...)


## Montagem do ambiente

Todo o sistema é executado através de container Docker. Executando o comando abaixo, será construído um container para o servidor PHP com Apache, outro para o servidor do banco de dados com MySQL e, por fim, um container com a ferramenta PHPMyAdmin, para gerenciamento do banco de dados.
Para executar o comando, basta abrir o prompt de comando no diretório raiz do projeto.

```bash
  docker-compose up --build
```

