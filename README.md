# RPG Guild Manager

Este projeto é um sistema de gerenciamento de jogadores e guildas para jogos de RPG, desenvolvido utilizando Laravel, Blade, e TailwindCSS. O sistema permite criar, listar, balancear e gerenciar jogadores e guildas, proporcionando uma interface moderna e responsiva.

---

## Funcionalidades

- **Cadastro de Jogadores**: Registre jogadores com classe, experiência e guilda.
- **Gerenciamento de Guildas**: Crie e balanceie guildas automaticamente.
- **Interface Responsiva**: Layout moderno e mobile-first usando TailwindCSS.
- **Relatórios**: Visualize estatísticas como total de jogadores, XP acumulado por guilda, e mais.
- **Confirmação de Jogadores**: Slider para confirmar jogadores diretamente na listagem.
- **Persistência de Dados**: As ações realizadas pelo usuário são persistidas no banco de dados.

---

## Tecnologias Utilizadas

- **Backend**: Laravel 8.x
- **Frontend**: Blade Templates com TailwindCSS
- **Banco de Dados**: MySQL
- **Gerenciamento de Dependências**: Composer e npm
- **Servidor Web**: Nginx com Docker Compose

---

## Requisitos

- **PHP** >= 7.4
- **Composer** >= 2.0
- **Docker** >= 20.0 (opcional)
- **MySQL** >= 5.7

---

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/rpg-guild-manager.git
   cd rpg-guild-manager
   ```

2. Instale as dependências PHP:
   ```bash
   composer install
   ```

3. Instale as dependências do frontend:
   ```bash
   npm install
   npm run dev
   ```

4. Configure o arquivo `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=rpg
   DB_USERNAME=seu-usuario
   DB_PASSWORD=sua-senha
   ```

5. Execute as migrações e as seeds:
   ```bash
   php artisan migrate --seed
   ```

6. Inicie o servidor:
   ```bash
   php artisan serve
   ```

7. Acesse no navegador:
   ```
   http://localhost:8000
   ```

---

## Utilizando Docker Compose (Opcional)

1. Suba os contêineres:
   ```bash
   docker-compose up -d
   ```

2. Acesse no navegador:
   ```
   http://localhost:8080
   ```

---

## Estrutura de Diretórios

```plaintext
├── app
│   ├── Models
│   │   ├── Player.php
│   │   └── Guild.php
│   ├── Services
│   │   └── BalancingService.php
├── database
│   ├── migrations
│   └── seeders
├── public
├── resources
│   ├── views
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── players
│   │   │   └── player-table.blade.php
│   │   └── guilds
├── routes
│   ├── web.php
│   └── api.php
```

---

## Como Contribuir

1. Faça um fork do projeto.
2. Crie uma branch para sua feature ou correção:
   ```bash
   git checkout -b minha-feature
   ```
3. Faça o commit de suas alterações:
   ```bash
   git commit -m "Minha nova feature"
   ```
4. Envie suas alterações:
   ```bash
   git push origin minha-feature
   ```
5. Abra um Pull Request.

---

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

---

## Contato

Se você tiver dúvidas ou sugestões, entre em contato através de:

- Email: seu-email@example.com
- LinkedIn: [Seu Nome](https://linkedin.com/in/rafael-fideles-costa)
