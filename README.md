# Portal do Aluno
 
Trabalho da disciplina de Tecnologias para Internet (Análise e Desenvolvimento de Sistemas, Senac).
 
É um sistema bem simples de cadastro de aluno feito em PHP puro. O aluno entra na página inicial, preenche nome, e-mail e idade, e depois consegue ver os dados que cadastrou. Não tem banco de dados, tudo fica guardado na sessão do PHP, então quando a sessão acaba os dados somem.
 
## Como rodar
 
Precisa ter o PHP instalado. Com o terminal aberto dentro da pasta do projeto:
 
```
php -S localhost:8000
```
 
Depois é só abrir `http://localhost:8000` no navegador.
 
## Estrutura
 
```
portal_aluno/
├── index.php
├── cadastro.php
├── processar_cadastro.php
├── resultado.php
├── logout.php
├── TESTES.md
└── includes/
    ├── cabecalho.php
    ├── rodape.php
    └── funcoes.php
```
 
