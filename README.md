# Jogo de lógica

<b>Ideia: </b> Baseando-se nos 4 números fornecidos pelo sistema, encontrar a lógica contida na 
sequência para responder qual será o quinto número.

Este sistema é baseado em pontos. De acordo com o número de tentativas gastas para acertar o número, 
a quantidade de pontos ganhos será diferente.

Tentativa | Pontos ganhos
----|-----
1ª | 5 pontos
2ª | 3 pontos
3ª | 2 pontos
demais | 1 ponto

### Este projeto está hospedado

Para acessar o projeto, visite [este link](https://rodrigotognin.com.br/quintonumero). 
O usuário é <em>convidado</em> e a senha é <em>c0nv1d4d0</em>

## Ambientes:

- <strong>Administrativo: </strong> Apenas o administrador do sistema terá acesso. Nesse ambiente terá o cadastro dos usuários e das perguntas.

- <strong>Perguntas: </strong> Qualquer usuário, exceto o administrador, tem acesso a esse ambiente para participar 
do jogo e responder os desafios.

Um usuário cadastrado como "Usuário Comum" não terá acesso ao sistema administrativo, assim como administradores não terão acesso ao ambiente de perguntas.

## Detalhes técnicos:

Sistema sendo desenvolvido em PHP 7.4+, usando a arquitetura MVC (POO), CoffeeCode DataLayer como ORM, banco de dados MySQL, seguindo as melhores práticas de programação (separação de camadas, separação de responsabilidades, nomes de variáveis e métodos com coerência).

Para rodar esse sistema localmente, é necessário: PHP 7.4+, MySQL, Composer, GIT (para clonar o repositório, caso queira).

## Procedimentos para instalação local:

- Baixe o projeto em uma pasta
  - Com o GIT instalado, use o comando <code>git clone https://github.com/rotognin/quintonumero.git</code>
  - Será criada a pasta <code>quintonumero</code>
- Acesse a pasta via linha de comando
- Execute o comando: <code>composer update</code> para baixar as dependências do projeto
- No MySQL crie um banco com o nome <code>quinto_db</code>
- Rode o script <code>docs/tabelas.sql</code> no banco para criar as tabelas do sistema
  - Será criado o usuário "admin" no banco, senha "123", com acesso ao ambiente administrativo.
- Ajuste as configurações de acesso ao banco de dados no arquivo <code>src/config.php</code>

### Considerações

O projeto está em constante atualização, sendo adicionadas funcionalidades e melhorias. Sugestões serão muito bem vindas.