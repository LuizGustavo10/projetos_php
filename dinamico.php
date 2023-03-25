<?php
$paginas = [
    //difinindo chave e valor, desse jeito indexação 0, não funciona
    'home' => '',

    'sobre' => 'Estou na página Sobre!',

    'contato' => ''
];
$paginas['contato'] = '
    <form>
        <input type="text" placeholder="Seu nome..."/>

        <p>PHP (um acrônimo recursivo para "PHP: Hypertext Preprocessor", originalmente Personal Home Page) é uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado do servidor, capazes de gerar conteúdo dinâmico na World Wide Web.[2] Figura entre as primeiras linguagens passíveis de inserção em documentos HTML, dispensando em muitos casos o uso de arquivos externos para eventuais processamentos de dados. O código é interpretado no lado do servidor pelo módulo PHP, que também gera a página web a ser visualizada no lado do cliente. A linguagem evoluiu, passou a oferecer funcionalidades em linha de comando, e além disso, ganhou características adicionais, que possibilitaram usos adicionais do PHP, não relacionados a web sites. É possível instalar o PHP na maioria dos sistemas operacionais, gratuitamente. Concorrente direto da tecnologia ASP pertencente à Microsoft, o PHP é utilizado em aplicações como o MediaWiki, Facebook, Drupal, Joomla!, WordPress, Magento e o Oscommerce.

        Criado por Rasmus Lerdorf em 1995, o PHP tem a produção de sua implementação principal, referência formal da linguagem, mantida por uma organização chamada The PHP Group. O PHP é software livre, licenciado sob a PHP License, uma licença incompatível com a GNU General Public License (GPL) devido a restrições no uso do termo PHP.</p>
    </form>
'; 
$paginas['home'] = '
    <h1>Projeto Piloto PHP</h1>
    <img width="600px" class="logo" src="https://arquivo.devmedia.com.br/cursos/imagem/curso_preparando-o-ambiente-para-programar-em-php_2057.png">
    <p> PHP (um acrônimo recursivo para PHP: Hypertext Preprocessor) é uma linguagem de script open source de uso geral, muito utilizada, e especialmente adequada para o desenvolvimento web e que pode ser embutida dentro do HTML.</p>
    <p> O que distingue o PHP de algo como o JavaScript no lado do cliente é que o código é executado no servidor, gerando o HTML que é então enviado para o navegador. O navegador recebe os resultados da execução desse script, mas não sabe qual era o código fonte. Você pode inclusive configurar seu servidor web para processar todos os seus arquivos HTML com o PHP, e então não há como os usuários dizerem o que você tem na sua manga.</p>
    <p> A melhor coisa em usar o PHP é que ele é extremamente simples para um iniciante, mas oferece muitos recursos avançados para um programador profissional. Não tenha medo de ler a longa lista de recursos do PHP. Pode entrar com tudo, o mais rápido que puder, e começar a escrever scripts simples em poucas horas. </p>
    ';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página Dinâmica PHP</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header{
                background-color: black;
                padding:5px 10px;
                text-align: left;
            }
        .logo{
            border-radius: 20px;
        }

        a{  
            display: inline-block;
            margin: 0 20px;
            color: white;
            text-decoration: none;
            font-size: 120%;
           ;
        }
        p{  
            padding: 5px;
        }
        /* body{
            text-align: center;
        } */

        h2 {
            background-color: #069;
            text-align: center;
            border-radius: 20px;
            color: white;
        }
        section{
            max-width: 960px;
            margin: 20px auto;
            padding: 0 2%;
        }

    </style>
</head>

<body>
    <!-- <php
        echo $paginas['home'];
        echo $paginas['sobre'];
        echo $paginas['contato'];
    -->
    <header>
        <img class="logo" width="50px;" src="https://img.freepik.com/vetores-premium/design-de-logotipo-de-mascote-de-streaming-de-raposa-agressivo_511562-53.jpg?w=2000"/>
        <?php
            foreach($paginas as $valor => $value){
                echo '<a href= "?page='.$valor.'">'.$valor.'</a>';
            }
        ?>
    </header>

    <section>
        <h2> 
            <?php
                $pagina = (isset(
                 $_GET['page']) ?
                 $_GET['page'] :
                'home');
                
                //se não tiver a chave pagina no array pagina, vai por padrão Home
                if(!array_key_exists($pagina, $paginas)){
                   $pagina= 'home';
                }
                echo $pagina;
            ?>
        </h2>

        <p><?php echo $paginas[$pagina]; ?></p>

    </section>



</body>

</html>