

<?php

// Conexão com o banco de dados
$servername = "localhost";
$username = "sousamir_user";
$password = "@evssj@SBO5l";
$dbname = "sousamir_perguntas_e_respostas";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if (isset($_POST['user_input'])) {
    $userInput = $_POST['user_input'];

    // Conexão com banco de dados e consulta SQL
    $pergunta = mysqli_real_escape_string($conn, $userInput);
    $sql = "SELECT resposta FROM perguntas_e_respostas WHERE pergunta LIKE '%$pergunta%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Exibe resposta do banco de dados
        $row = mysqli_fetch_assoc($result);
        echo $row['resposta'];
    } else {
        // Consulta OpenAI API
        $response = getResponseFromOpenAI($userInput);
        echo $response;

        // Insere pergunta e resposta no banco de dados
        $generatedResponse = mysqli_real_escape_string($conn, $response);
        $sql = "INSERT INTO perguntas_e_respostas (pergunta, resposta) VALUES ('$userInput', '$generatedResponse')";
        if (mysqli_query($conn, $sql)) {
            echo "Pergunta e resposta armazenadas com sucesso!";
        } else {
            echo "Erro ao armazenar pergunta e resposta: " . mysqli_error($conn);
        }
    }
}

function getResponseFromOpenAI($userInput) {
    // Tratar assentos e pontuações
    $userInput = htmlentities($userInput, ENT_QUOTES, 'UTF-8');

    // Use a API de OpenAI para processar a pergunta do usuário e gerar uma resposta
    $openaiApiKey = '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';
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openai.com/v1/engines/davinci-codex/completions",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode(array(
            "prompt" => $userInput,
            "max_tokens" => 2000,
            "n" => 1,
            "stop" => "\n"
        )),
        CURLOPT_HTTPHEADER => array(
            "content-type: application/json",
            "authorization: Bearer " . $openaiApiKey
        ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        return "Ocorreu um erro ao processar a pergunta. Por favor, tente novamente.";
    } else {
        $responseArray = json_decode($response, true);
        $generatedResponse = $responseArray['choices'][0]['text'];

        // Tratar assentos e pontuações na resposta
        $generatedResponse = html_entity_decode($generatedResponse, ENT_QUOTES, 'UTF-8');

        return $generatedResponse;
    }
}



	
?>
