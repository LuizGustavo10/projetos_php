<?php
// Importar a biblioteca FPDF
require 'lib/fpdf.php';

// Conexão com o banco de dados (substitua pelos seus detalhes de conexão)
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'localdb';

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar a conexão com o banco de dados
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Função para converter caracteres especiais com acentos
function converte($string) {
    return iconv("UTF-8", "ISO-8859-1", $string);
}

// Cria um documento PDF
$fpdf = new FPDF('p', 'mm', 'A4');
$fpdf->AddPage();

// Configurações iniciais do PDF
$fpdf->SetFont('helvetica', 'B', 12);
$fpdf->SetAutoPageBreak(true, 10);
$fpdf->AliasNbPages();

// Informações da empresa
//largura - 0 automatico
//altura - 5 milimetros
//w3c info - Texto da celula
//borda - 0 - sem borda
// quebra de linha - 1
//Alinhamento - L esquerda
$fpdf->Cell(0, 5, "W3L - INFORMATICA", 0, 1, 'L');
$fpdf->Cell(0, 5, "Rua Fulano de Tal, s/n, Bairro Industrial", 0, 1, 'L');

// Email para contato
$fpdf->SetFont('arial', '', 12);
$fpdf->Cell(0, 5, "atendimento@empresa.com.br", 0, 1, 'L');

// Exibir data no relatório
$data = date("d/m/Y H:i:s");
$fpdf->Cell(0, 5, $data, 0, 1, 'R');

// Espaçamento
$fpdf->Ln(20);

// Configura a fonte
$fpdf->SetFont('arial', 'B', 18);
$fpdf->Cell(0, 5, converte("Relatório de Usuário"), 0, 1, 'C');

// Linha abaixo do título
$fpdf->Cell(0, 5, "", 0, 1, 'C');

// Espaçamento
$fpdf->Ln(20);

// Verifique o parâmetro 'opcao'
if (isset($_GET['opcao']) && $_GET['opcao'] == '1') { // Mostrar todos os usuários
    // Consulta: Selecionar todos os usuários
    $sql = "SELECT * FROM tusuario";
    $dados = mysqli_query($conexao, $sql);

    // Verifique se há registros
    if (mysqli_num_rows($dados) > 0) {
        // Loop pelos registros do banco de dados
        while ($linha = mysqli_fetch_assoc($dados)) {
            // Rótulo e valor para o nome do usuário
            $fpdf->SetFont('arial', 'B', 12);
            $fpdf->Cell(70, 5, converte("Nome do Usuário"), 0, 0, 'L');
            $fpdf->SetFont('arial', '', 12);
            $fpdf->Cell(0, 5, $linha['nomeUsuario'], 0, 1, 'L');

            // Rótulo e valor para o código do usuário
            $fpdf->SetFont('arial', 'B', 12);
            $fpdf->Cell(70, 5, converte("Código do Usuário"), 0, 0, 'L');
            $fpdf->SetFont('arial', '', 12);
            $fpdf->Cell(0, 5, $linha['codigoUsuario'], 0, 1, 'L');

            // Espaçamento
            $fpdf->Ln(10);
        }
    } else {
        // Mensagem se nenhum usuário for encontrado
        $fpdf->SetFont('arial', 'B', 12);
        $fpdf->Cell(0, 5, "Nenhum registro encontrado.", 0, 1, 'C');
    }
}

// Gerar a saída do PDF
$fpdf->Output();
?>