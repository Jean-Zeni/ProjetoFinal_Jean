# Projeto Final de Jean Pereira Zeni

## Desenvolvedor

<img src="https://github.com/Jean-Zeni.png" width="200" style="border-top-left-radius: 50px; border-bottom-right-radius: 50px">

[Jean Pereira Zeni](https://github.com/Jean-Zeni)

---


## Índice
- [Descrição do Projeto](#descricao_do_projeto)
- [Tabela de Relações ER](#tab_relacoes)
- [Badges](#badges)
- [Tecnologias](#tecnologias)
- [IDEs Utilizadas](#ides)
- [Instruções de Configuração e Execução do Projeto](#instrucoes)
- [Funcionalidades Adicionadas](#func)
- [Como Contribuir](#contribuicoes)
- [Tabelas](#tabelas)
---

<a name="descricao_do_projeto"></a>
## Descrição do Projeto
Este projeto se trata de uma página web usada para controlar o estoque de uma livraria fícticia, onde os colaboradores poderão acessar com facilidade os produtos cadastrados na loja, além dos autores e editoras relacionadas aos mesmos. Nele o usuário pode verificar os ***livros*** juntamente com informações como *autor*, *data de publicação*, *valor* e etc. Também os ***autores*** e ***editoras*** cadastrados poderão ser verificados e modificados. Projeto desenvolvido por Jean Pereira Zeni.

---
<a name="tab_relacoes"></a>
## Tabela de Relações ER

<img src="./imgsReadme/diagrama_er.PNG" width="600" style="border-radius: 20px;">

<a name="badges"></a>
<!-- Link para pagina da badges -->
[Link Badges](https://ileriayo.github.io/markdown-badges/)
---

<a name="tecnologias"></a>
## Tecnologias Utilizadas
<!-- Badge PHP -->
- ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
<!-- Badge HTML5 -->
- ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
<!-- Badge CSS3 -->
- ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
<!-- Badge JavaScript -->
- ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
<!-- Badge MySQL -->
- ![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
<!-- Badge GitHub Pages -->
- ![Github Pages](https://img.shields.io/badge/github%20pages-121013?style=for-the-badge&logo=github&logoColor=white)

- **...** 
---

<a name="ides"></a>
## IDEs/Editores utilizados
<!-- Badge Visual Studio Code -->
![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white)

<a name="instrucoes"></a>
## Instruções de Configuração e Execução
Para configurar e executar o projeto localmente, siga os passos abaixo:

1. Clone o repositório:
    ```bash
    git clone https://github.com/Jean-Zeni/projeto_livraria
    
---
2. Para acessar a página web, abra o arquivo pelo powershell, Prompt de comando ou etc. e digite: 
    ```bash
    code . 
---
3. Será necessário ter o Xampp instalado em sua máquina e, tendo este instalado, subir o servidor Apache e o banco de dados MySQL (use o arquivo SQL que está disponível em meu Git Hub).
---
4. Após isso será necessário escrever o caminho do arquivo do projeto precedido por "localhost/" ou "127.0.0.1/" na barra de tarefas. Exemplo: "localhost/projeto_livraria/php/index.php"
---
5. após isso, será necessário fazer a importação do arquivo db_livaria.sql que deverá estar baixado de antemão em sua máquina. 

<a name="func"></a>
## Funcionalidades Implementadas
- **Formulários**

    - Formulários que permitem o cadastro e edição de objetos de uma tabela.

- **CRUDs**

    - **CRUD Livros:**
    <p>O CRUD relacionado aos livros da loja concede ao usuário a capacidade de adicionar um livro com Nome do Livro, a data de publicação do mesmo, além de vinculá-lo a um autor e à uma editora já cadastrados no banco de dados e adicionar uma imagem para ao produto. Também permite que os usuários deletem ou editem um livro além de possibilitar que eles sejam listados em uma tela para esse fim. </p>

    - **CRUD Autores:**
    <p>Muito parecido com o primeiro CRUD, mas foca em alguns dados do autor, como seu nome e sua nacionalidade.</p>

    - **CRUD Editoras:**
    <p>Como os demais, permite ao usuário adicionar, deletar, ler ou atualizar um objeto da tabela. Possui um atributo de nome e um atributo de textual de informações da editora onde se pode adicionar informações relevantes à editora cadastrada como, por exmeplo números telefônicos, emails, endereços...</p>

- **Integração com Banco de Dados**

    - Conexão entre os arquivos que compõem a página e o banco de dados.

- **Sistema de Login**

    - Sistema funcional de Login com email e senha.

- **Sistema de Logout**

    - Sistema de finalização de um login.

- **Sistema de Upload de Imagem**

    - Sistema que filtra imagens salvas na máquina por formato e por tamanho e que permite que elas sejam salvas em uma das pastas do projeto

- **Sistema de Salvamento de Senhas com Criptografia**

    - As senhas dos usuários são armazenadas criptografadas no banco de dados.

---

<a name="contribuicoes"></a>
## Como Contribuir para o Projeto
Se você deseja contribuir para este projeto, siga os passos abaixo:

1. Faça um fork do repositório.

2. Crie uma nova branch para a sua funcionalidade ou correção:
    ```bash
    git checkout -b minha-feature
    ```
3. Faça commit das suas alterações:
    ```bash
    git commit -m 'Adiciona nova funcionalidade'
    ```
4. Envie para o repositório remoto:
    ```bash
    git push origin minha-feature
    ```
5. Abra um Pull Request no GitHub.

Agradeço por contribuir com este projeto!
---

<a name="tabelas"></a>
## Infos adicionais do desenvolvedor

<table>
  <tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Número</th>
    <th>Email</th>
    <th>Git Hub</th>
    <th>Discord</th>
  </tr>
  <tr>
    <td>Jean Pereira Zeni</td>
    <td>17</td>
    <td>51 999989257</td>
    <td>pereirazenij@gmail.com</td>
    <td>Jean-Zeni</td>
    <td>Ripchip</td>
  </tr>
</table>
