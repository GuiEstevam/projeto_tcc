<h1> Horientando </h1>
<h2> Um sistema de busca aluno-orientador</h2>

<h3>Descrição do projeto:</h3>
<p>
    Este projeto está sendo realizado como projeto final para a conclusão de Análise e Desenvolvimento de Sistemas do IFSP - Guarulhos
</p>
<p>
    Tal projeto visa realizar uma ponte entre alunos que ainda não encontraram um orientador ou que ainda não possuem um tema para realização de seu TCC ( Trabalho de conclusão de curso) e orientadores disponíveis e com vontades de orientadar projetos específicos 
</p>

<h3>Tecnologias utilizadas:</h3>
<p>
    A concepção atual do projeto visa utilizar a Framework Laravel e suas dependências, tão como tecnologias como Bootstrap, html, css e javascript.
</p>

<h3> Como fazer o projeto rodar em outras máquinas?</h3>
<p> 
    <h3> Windows </h3>
    Em primeiro lugar, será necessário ter instalado o Composer, Node.JS e preferencialmente o Xampp;<br>
    Tendo essas dependencias instaladas, execute o comando: "composer install" dentro da pasta do projeto;<br>
    Em seguida, ainda dentro da pasta do projeto execute os seguintes comandos: copy .env.example .env e em seguinda<br>
    php artisan key:generate;<br>
    Atualize as informações do seu banco de dados dentro do arquivo .env criado; <br>
    Dentro do portal administrador do Xampp, crie um novo banco de dados com o nome utilizado nas configurações do arquivo env;<br>
    Após isso, utilize o comando: "php artisan migrate" que irá carregar todas as tabelas; <br>
    Pronto, só testar! :D
    </p>
