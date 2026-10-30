# Registro de Testes — Portal do Aluno

Ambiente: PHP 8.3 com servidor embutido (`php -S 127.0.0.1:8099`), requisições feitas com `curl` mantendo cookie de sessão.
Sintaxe: `php -l` sem erros em todos os arquivos.

| # | Cenário | Entrada | Resultado esperado | Resultado obtido |
|---|---------|---------|--------------------|------------------|
| 1 | Primeiro acesso | GET `index.php` | Título, links de navegação, cabeçalho e rodapé | OK |
| 2 | Nome não informado | nome vazio/espaços, e-mail e idade válidos | Mensagem "O nome não pode estar vazio." | OK |
| 3 | E-mail inválido | `mariana.com` | Mensagem "Informe um e-mail válido." | OK |
| 4 | Idade inválida | idade `0` (e também `abc`) | Mensagem "A idade deve ser um número inteiro maior que zero." | OK |
| 5 | Cadastro válido | Ana Souza / ana@senac.br / 22 | Redireciona a `resultado.php` com dados e "Cadastro realizado com sucesso!" | OK |
| 6 | Atualizar resultado | F5 em `resultado.php` | Dados permanecem; mensagem de sucesso não reaparece | OK |
| 7 | Encerrar sessão | `logout.php` e depois `resultado.php` | Redireciona a `index.php`; "Nenhum aluno cadastrado nesta sessão." | OK |
| 8 | HTML no nome | `<h1>Ana</h1>` | Exibido como texto (`&lt;h1&gt;`), sem virar título | OK |
| 9 | Preservação de dados | nome e idade válidos, e-mail inválido | Formulário volta com os valores preenchidos (inclusive o e-mail digitado) | OK |

## Testes extras

- **GET direto em `processar_cadastro.php`:** redireciona (302) para `cadastro.php`.
- **Campos ausentes no POST:** tratado sem erros; cai na validação do nome.
- **Erro não persiste:** ao recarregar `cadastro.php`, a mensagem e os dados anteriores somem (removidos da sessão).
