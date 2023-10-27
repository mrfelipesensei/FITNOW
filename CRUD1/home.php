<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="assests/css/boot.css" rel="stylesheet"> <!--boot.css-->
    <link href="assests/css/style.css" rel="stylesheet"> <!--style.css-->
    <link href="assests/css/styles.css" rel="stylesheet">
    <link href="assests/css/fonticon.css" rel="stylesheet"> <!--fonticon.css-->
    <link rel="stylesheet" href="assests/css/modal.css"> <!--modal.css-->
    <link rel="stylesheet" href="assests/css/login.css"> <!--login.css-->
    <script src="script1.js" defer></script>
    <title>FITNOW</title>
</head>
<style>
    section.carrossel1{
    overflow: hidden;
    width: 800px;
    height: 400px;
    margin: 3em auto;
    text-align: center;
    border: 10px outset red;
    border-radius: 25px;
}

section.carrossel1 img{
    object-fit: cover;
    width: 800px;
    height: 400px;
}

div.container1{
    display: flex;
    transform: translateX(0);
    transition: .1s ease-in-out;
}
</style>

<body>
    <!--DOBRA CABEÇALHO-->

    <header class="main_header">
        <div class="main_header_content">
            <a href="home.html" class="logo">
                <img id="logofit" src="img/logofit.png" alt="FITNOW - A qualquer hora e qualquer lugar"
                    title="FITNOW - A qualquer hora e qualquer lugar"></a>

            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Seja Parceiro</a></li>
                    <li><a href="">Seja Cliente</a></li>
                    <li><a href="#ancora">Contato</a></li>
                    <li><a href="#" class="modal-link">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--FIM DOBRA CABEÇALHO-->

    <!-- POP LOGIN -->
    <div class="overlay"></div>
    <div class="modal">
        <div class="div_login">
            <form action="opcao.html" method="get">
                <h1>Login</h1>
                <br>
                <input type="text" placeholder="Nome" class="input">
                <br><br>
                <input type="password" placeholder="Senha" class="input">
                <br><br>
                <button class="button">Enviar</button>
                <br><br>
                <p>Esqueceu sua senha?</p>
                <br>
                <button id="lilbtn">Recuperar Senha</button>
            </form>
        </div>
    </div>
    <!-- FIM POP LOGIN -->



    <!--DOBRA PALCO PRINCIPAL-->

    <!--1ª DOBRA-->
    <main>
        <div class="main_cta">
            <article class="main_cta_content">
                <div class="main_cta_content_spacer">
                    <header>
                        <h1>Aqui você encontra a academia<br>mais próxima de você
                        </h1>
                    </header>
                    <p>Treine em qualquer lugar e hora</p>
                    <p><a href="#" class="btn">Procurar</a></p>
                </div>
            </article>
        </div>
        <!--FIM 1ª DOBRA-->

        <!--INICIO SESSÃO SESSÃO DE ARTIGOS-->
        <section class="main_blog">
            <header class="main_blog_header">
                <h1 class="icon-blog">Nosso Últimos Artigos</h1>
                <p>Aqui você encontra os artigos necessários para auxiliar na sua caminhada web.</p>
            </header>

            <article>
                <a href="#">
                    <img src="img/musculacao.jpeg" width="200" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Musculação</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/boxing.jpg" width="200" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Boxing</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/yoga.jpg" width="200" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Yoga</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/natacao.webp" width="" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Natação</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/crossfit.webp" width="" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Crossfit</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/pilates.jpg" width="" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Pilates</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/funcional.jpg" width="" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Funcional</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>

            <article>
                <a href="#">
                    <img src="img/Jiu-Jitsu.png" width="" alt="Imagem post" title="Imagem Post">
                </a>
                <p><a href="" class="category">Jiu Jitsu</a></p>
                <h2><a href="" class="title">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam magnam
                        error dolorem. Recusandae,
                        quo ex laborum voluptate pariatur praesentium error doloremque cumque, mollitia laboriosam vel
                        aut
                        et eveniet eaque quaerat!</a></h2>
            </article>
        </section>

        <!--FIM SESSÃO SESSÃO DE ARTIGOS-->

        <!--INICIO SESSÃO OPTIN-->
        <article class="opt_in">
            <div class="opt_in_content">
                <header>
                    <h1>Quer receber todas as novidades em seu e-mail?</h1>
                    <p>Informe o seu nome e e-mail no campo ao lado e clique em Ok!</p>
                </header>
                <form>
                    <input type="text" placeholder="Seu nome">
                    <input type="email" placeholder="Seu email">
                    <button type="submit">Ok</button>
                </form>
            </div>
        </article>

        <!--FIM SESSÃO OPTIN-->

        <!-- INICIO SESSÃO DOBRA  CURSOS-->
        <section class="main_course">
            <header class="main_course_header">
                <h1 class="icon-books">FITNOW</h1>
                <p>Você tem liberdade para escolher o local mais prático para seu treino de qualidade</p>
            </header>
            <div class="main_course_content">
                <article>
                    <header>
                        <h2>Academias Reconhecidas</h2>
                        <p>Todos nossos parceiros têm excelente reputação dentre seus clientes mais fiéis</p>
                    </header>
                </article>
                <article>
                    <header>
                        <h2>Treino Especializado</h2>
                        <p>Conheça novas modalidades de exercícios nos locais mais variados para te entusiasmar</p>
                    </header>
                </article>
                <article>
                    <header>
                        <h2>Mais de 100 parceiros divididas em 35 regiões</h2>
                        <p>Parceiros em todos os lugares para melhor te atender em qualquer momento</p>
                    </header>
                </article>
                <article>
                    <header>
                        <h2>Promoções aos Clientes Plus</h2>
                        <p>Ao assinar o Plus você terá preços únicos para seus tão necessários suplementos</p>
                    </header>
                </article>
            </div>
            <!-- FIM SESSÃO DOBRA  CURSOS-->

            <section class="carrossel1">
                <a href="pedidos.html">
                    <div class="container1" id="img">
                        <div>
                            <h1>ITEM1</h1>
                            <img src="imgs/carrosel1.jpg" alt="">
                        </div>
                        <div>
                            <h1>ITEM2</h1>
                            <img src="imgs/carrosel2.png" alt="">
                        </div>
                        <div>
                            <h1>ITEM3</h1>
                            <img src="imgs/carrosel3.png" alt="">
                        </div>
                    </div>
                </a>
            </section>
            <!--INICIO DOBRA REVIEWS-->
            <div class="main_course_fullwidth">
                <div class="main_course_ratting_content">
                    <article class="main_course_rating_title">
                        <header>
                            <h2>Opinião de nossos clientes e parceiros</h2>
                        </header>
                        <img src="img/star.png" alt="Estrela" title="Estrela">
                        <img src="img/star.png" alt="Estrela" title="Estrela">
                        <img src="img/star.png" alt="Estrela" title="Estrela">
                        <img src="img/star.png" alt="Estrela" title="Estrela">
                        <img src="img/star.png" alt="Estrela" title="Estrela">
                    </article>

                    <section class="main_course_ratting_content_comment">
                        <header>
                            <h2>Veja o que estão falando sobre o FITNOW</h2>
                        </header>
                        <article>
                            <header>
                                <h3>Dark Gym</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Depois que nos tornamos parceiros, nossa academia está bombando!</p>
                        </article>

                        <article>
                            <header>
                                <h3>John L.</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Com a pandemia me tornei totalmente sedentário, agora treino em qualquer lugar.</p>
                        </article>

                        <article>
                            <header>
                                <h3>Corpo e Mente</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Incrível como a plataforma é capaz de abrir 
                                nossas portas para todos os públicos.</p>
                        </article>

                        <article>
                            <header>
                                <h3>Iggy Pop</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Posso viajar sem me preocupar com meus treinos, 
                                onde vou tenho o FITNOW.</p>
                        </article>

                        <article>
                            <header>
                                <h3>Arena Fit</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Posso dizer que sem o FITNOW teríamos falido, 
                                agora temos alunos novos a cada dia.</p>
                        </article>

                        <article>
                            <header>
                                <h3>Fidel C.</h3>
                                <p>03/03/2023</p>
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                                <img src="img/star.png" alt="Imagem" title="Imagem">
                            </header>
                            <p>Para alguem como eu que trabalha viajando, 
                                sem dúvida me ajuda diariamente manter a disciplina.</p>
                        </article>
                    </section>
                </div>
            </div>
        </section>
        <!--DOBRA A ESCOLA-->
        <div class="main_school">
            <section class="main_school_content">
                <header class="main_school_header">
                    <h1>Bem vindo ao FITNOW - A Qualquer Hora e Lugar</h1>
                    <p>Permitimos a liberdade de escolha para nossos clientes
                        e sucesso para nossos parcerios.
                    </p>
                </header>
                <div class="main_school_content_left">
                    <article class="main_school_content_left_content">
                        <header>
                            <p>
                                <span class="icon-facebook"><a href="#">Facebook</a>&nbsp;</span><span
                                    class="icon-google-plus2"><a href="#">Google+</a></span>&nbsp;<span
                                    class="icon-twitter"><a href="#">Twitter</a></span>
                            </p>
                            <h2>Tudo o que você precisa para treinar com praticidade em um só lugar</h2>
                        </header>
                        <p>Desde 2023 o FITNOW - vem aproximando as melhores academias do mercado, entregamos ao cliente
                            opções múltiplas e de qualidade. Você tem acesso a academias, centros de treinamentos com os melhores equipamentos que
                            impulsionam seus excercícios e sua saúde.</p>
                        <p>Que tal treinar com ajuda da plataforma com o certificado da aplicação eleita a melhor do Brasil com reconhecimento
                            em mais de 17 países pela Latin American Quality Institute?</p>
                    </article>


                    <section class="main_school_list">
                        <header>
                            <h2>Confira nossos prêmios</h2>
                        </header>
                        <article>
                            <header>
                                <h3 class="icon-trophy">Qualidade e Excelência - Master Pesquisas</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Qualidade e Atendimento - Master Pesquisas</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Prêmio Diamante - Master Pesquisas</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Estrela do Sul - Master Pesquisas</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Medalha de Ouro a Excelência - LAQ</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Brazil Quality Certification - LAQI</h3>
                            </header>
                        </article>

                        <article>
                            <header>
                                <h3 class="icon-trophy">Melhor Plataforma APP - Digital Awards</h3>
                            </header>
                        </article>
                    </section>
                </div>
                <div class="main_school_content_right">
                    <img src="img/etclogo.png" width="200" alt="Imagem" title="Imagem">
                </div>
                <article class="main_school_adress">
                    <header>
                        <h2 class="icon-map2">Conheça Nossa Sede</h2>
                    </header>
                    <p>St. N, Área Especial QNN 14 - Ceilândia, Brasília - DF</p>
                </article>
            </section>
        </div>
        <!-- FIM DOBRA A ESCOLA -->


        <!-- INICIO DOBRA TUTOR -->
        <section class="main_tutor">
            <div class="main_tutor_content">
                <header>
                    <h1>Venha ser AESTHETIC!</h1>
                    <p>Nosso embaixador garante: "É a plataforma única para você treinar melhor e sempre!"</p>
                </header>
                <div class="main_tutor_content_img">
                    <img src="img/rodrigo.jpg" width="200" title="Instrutor" alt="Instrutor">
                </div>
                <article class="main_tutor_content_history">
                    <header>
                        <h2>Formado em Ciências da Computação e apaixonado pela Web</h2>
                    </header>
                    <p>Como muitos, comecei na programação por conta dos jogos! Com o tempo, o amor pela programação foi
                        crescendo a ponto de tomar como profissão e me especializar na área. Hoje, com a bagagem que
                        tenho,
                        compartilho meu conhecimento com todos os alunos da UpInside Treinamentos
                    </p>
                </article>

                <section class="main_tutor_social_network">
                    <header>
                        <h2>Me siga nas redes sociais</h2>
                    </header>
                    <article>
                        <header>
                            <h3><a href="#" class="icon-facebook">Meu Facebook</a></h3>
                        </header>
                        <article>
                            <header>
                                <h3><a href="#" class="icon-facebook2">Minha Fan Page</a></h3>
                            </header>
                        </article>
                        <article>
                            <header>
                                <h3><a href="#" class="icon-instagram">Meu Instagram</a></h3>
                            </header>
                        </article>
                        <article>
                            <header>
                                <h3><a href="#" class="icon-google-plus2">Meu Google+</a></h3>
                            </header>
                        </article>

                    </article>
                </section>
            </div>
        </section>
        <!--FIM DOBRA PALCO PRINCIPAL-->
    </main>

    <!-- INICIO DOBRA RODAPÉ -->
    <section class="main_optin_footer">
        <div class="main_optin_footer_content">
            <header>
                <h1>Quer receber nossos conteúdos exclusivo? Assina já e seja Plus :)</h1>
            </header>
            <article>
                <header>
                    <h2><a href="#" class="btn">Assinar Cliente Plus</a></h2>
                </header>
            </article>
        </div>
    </section>

    <section class="main_footer">
        <header>
            <h1>Quer saber mais?</h1>
        </header>

        <article class="main_footer_our_pages">
            <header>
                <h2>Nossas Páginas</h2>
            </header>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Quem Somos</a></li>
                <li><a href="#" id="ancora">Contato</a></li>
            </ul>
        </article>

        <article class="main_footer_links">
            <header>
                <h2>Links Úteis</h2>
            </header>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
        </article>

        <article class="main_footer_about">
            <header>
                <h2>Sobre o Projeto</h2>
            </header>
            <p>Através da nossa plataforma o cliente pode ter acesso as mais variadas academias parceiras
                mais próximas em sua região, de modo que poderá treinar conforme sua disposição, para ter acesso 
                à conteúdos e serviços exclusivos é necessário assinar o Plus
            </p>
        </article>
    </section>
    <footer class="main_footer_rights">
        <p>FITNOW - Todos os direitos reservados.</p>
    </footer>
    <!-- FIM DOBRA RODAPÉ -->
</body>
<script>
    // Seleciona o link e a janela modal
    var link = document.querySelector('.modal-link');
    var modal = document.querySelector('.modal');
    var overlay = document.querySelector('.overlay');

    // Adiciona um listener de evento para o link
    link.addEventListener('click', function (event) {
        event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

        overlay.style.display = 'block'; // exibe a camada escura
        modal.style.display = 'block'; // exibe a janela modal
    });

    // Adiciona um listener de evento para a camada escura
    overlay.addEventListener('click', function () {
        overlay.style.display = 'none'; // oculta a camada escura
        modal.style.display = 'none'; // oculta a janela modal
    });
</script>
</html>