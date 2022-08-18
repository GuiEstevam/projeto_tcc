# Horientando 
## Um sistema de busca aluno-orientador</h2>

### Status: Em desenvolvimento!

### Descrição do projeto:
Este projeto está sendo realizado como Trabalho de Conclusão de Curso de Análise e Desenvolvimento de Sistemas do IFSP - Guarulhos
<br> Tal projeto visa realizar uma ponte entre alunos que ainda não encontraram um orientador ou que ainda não possuem um tema para realização de seu TCC e orientadores disponíveis e com vontade de orientadar projetos específicos 

### Tecnologias utilizadas:
A concepção atual do projeto visa utilizar a Framework Laravel e suas dependências, tão como tecnologias como Bootstrap, html, css e javascript.
    
### Como fazer o projeto rodar em outras máquinas?
#### Windows:
1) Em primeiro lugar, será necessário ter instalado o Composer, Node.JS e preferencialmente o Xampp;
2) Tendo essas dependencias instaladas, execute o comando: "composer install" dentro da pasta do projeto;
3) Em seguida, ainda dentro da pasta do projeto execute os seguintes comandos:
    ```
        copy .env.example .env
    ```
    ```
        php artisan key:generate
     ```
 
4) Atualize as informações do seu banco de dados dentro do arquivo .env criado;
5) Dentro do portal administrador do Xampp, crie um novo banco de dados com o nome utilizado nas configurações do arquivo env;<br>
6) Após isso, utilize o comando: "php artisan migrate" que irá carregar todas as tabelas;
7) Pronto, só testar! :D
