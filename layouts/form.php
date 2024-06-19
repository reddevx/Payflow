<div class="container mx-auto p-20 pt-20" id="form">
    <main class="flex flex-wrap">
        <section class="w-full md:w-1/3 p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Formulário</h1>
            </div>
            <form class="w-full" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mb-4">
                    <label for="tipo" class="block text-sm font-medium">Tipo:</label>
                    <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200" name="tipo" id="tipo">
                        <option value="Entrada" <?php if (isset($tipo) && $tipo == 'Entrada') echo 'selected'; ?>>Entrada</option>
                        <option value="Saída" <?php if (isset($tipo) && $tipo == 'Saída') echo 'selected'; ?>>Saída</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="descricao" class="block text-sm font-medium">Descrição:</label>
                    <input class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200" type="text" name="descricao" id="descricao" value="<?php echo isset($descricao) ? $descricao : ''; ?>">
                </div>
                <div class="mb-4">
                    <label for="valor" class="block text-sm font-medium">Valor:</label>
                    <input class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200" type="text" name="valor" id="valor" value="<?php echo isset($valor) ? $valor : ''; ?>">
                </div>
                <div class="mb-4">
                    <label for="data" class="block text-sm font-medium">Data:</label>
                    <input class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200" type="date" name="data" id="data" value="<?php echo isset($data) ? $data : ''; ?>">
                </div>
                <div class="mb-4">
                    <label for="forma_pagamento" class="block text-sm font-medium">Forma de Pagamento:</label>
                    <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200" name="forma_pagamento" id="forma_pagamento">
                        <option value="Dinheiro" <?php if (isset($forma_pagamento) && $forma_pagamento == 'Dinheiro') echo 'selected'; ?>>Dinheiro</option>
                        <option value="Cartão de Crédito" <?php if (isset($forma_pagamento) && $forma_pagamento == 'Cartão de Crédito') echo 'selected'; ?>>Cartão de Crédito</option>
                        <option value="Cartão de Débito" <?php if (isset($forma_pagamento) && $forma_pagamento == 'Cartão de Débito') echo 'selected'; ?>>Cartão de Débito</option>
                        <option value="Transferência Bancária" <?php if (isset($forma_pagamento) && $forma_pagamento == 'Transferência Bancária') echo 'selected'; ?>>Transferência Bancária</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Status:</label><br>
                    <div class="flex items-center mb-2">
                        <input class="mr-2 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 focus:ring-indigo-500" type="radio" name="status" id="liquidado" value="Liquidado" <?php if (isset($status) && $status == 'Liquidado') echo 'checked'; ?>>
                        <label class="block text-sm font-medium" for="liquidado">Liquidado</label>
                    </div>
                    <div class="flex items-center mb-2">
                        <input class="mr-2 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 focus:ring-indigo-500" type="radio" name="status" id="aberto" value="Em aberto" <?php if (isset($status) && $status == 'Em aberto') echo 'checked'; ?>>
                        <label class="block text-sm font-medium" for="aberto">Em aberto</label>
                    </div>
                    <div class="flex items-center">
                        <input class="mr-2 h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-600 focus:ring-indigo-500" type="radio" name="status" id="atraso" value="Em atraso" <?php if (isset($status) && $status == 'Em atraso') echo 'checked'; ?>>
                        <label class="block text-sm font-medium" for="atraso">Em atraso</label>
                    </div>
                </div>
                <?php if (isset($edit_id)) { ?>
                    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                <?php } ?>
                <div class="flex space-x-4">
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Gravar</button>
                    <button type="button" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600" onclick="limparCampos()">Limpar</button>
                </div>
            </form>
        </section>
        <section id="exibir" class="w-full md:w-2/3 p-4 bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
            <?php
                include 'static/database/connect.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tipo = $_POST['tipo'];
                    $descricao = $_POST['descricao'];
                    $valor = $_POST['valor'];
                    $data = $_POST['data'];
                    $forma_pagamento = $_POST['forma_pagamento'];
                    $status = $_POST['status'];

                    if (isset($_POST['edit_id'])) {
                        $edit_id = $_POST['edit_id'];
                        $sql = "UPDATE registros SET tipo='$tipo', descricao='$descricao', valor='$valor', data='$data', forma_pagamento='$forma_pagamento', status='$status' WHERE id='$edit_id'";
                    } else {
                        $sql = "INSERT INTO registros (tipo, descricao, valor, data, forma_pagamento, status) VALUES ('$tipo', '$descricao', '$valor', '$data', '$forma_pagamento', '$status')";
                    }

                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='bg-blue-100 text-blue-800 text-xs font-medium h-10 inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400' role='alert'>Dados inseridos com sucesso!</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Erro ao inserir os dados: " . $conn->error . "</div>";
                    }
                }

                if (isset($_GET['delete_id'])) {
                    $delete_id = $_GET['delete_id'];
                    $sql = "DELETE FROM registros WHERE id='$delete_id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='bg-blue-100 text-blue-800 text-xs font-medium h-10 inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400' role='alert'>Registro deletado com sucesso!</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Erro ao deletar o registro: " . $conn->error . "</div>";
                    }
                }

                $sql = "SELECT * FROM registros";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<div class='overflow-x-auto'><h2 class='text-xl font-bold mb-4'>Registros</h2><table class='min-w-full bg-white dark:bg-gray-800'><thead><tr><th class='py-2 px-4 border-b dark:border-gray-600'>Tipo</th><th class='py-2 px-4 border-b dark:border-gray-600'>Descrição</th><th class='py-2 px-4 border-b dark:border-gray-600'>Valor</th><th class='py-2 px-4 border-b dark:border-gray-600'>Data</th><th class='py-2 px-4 border-b dark:border-gray-600'>Forma de Pagamento</th><th class='py-2 px-4 border-b dark:border-gray-600'>Status</th><th class='py-2 px-4 border-b dark:border-gray-600'>Ações</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["tipo"] . "</td><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["descricao"] . "</td><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["valor"] . "</td><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["data"] . "</td><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["forma_pagamento"] . "</td><td class='py-2 px-4 border-b dark:border-gray-600'>" . $row["status"] . "</td>
                        <td class='py-2 px-4 border-b dark:border-gray-600'>
                            <a href='?edit_id=" . $row["id"] . "' class='text-blue-500 hover:text-blue-200'>Editar</a> 
                            <a href='?delete_id=" . $row["id"] . "' class='text-red-500 hover:text-red-200' onclick='return confirm(\"Tem certeza que deseja deletar?\")'>Apagar</a>
                        </td></tr>";
                    }
                    echo "</tbody></table></div>";
                } else {
                    echo "Nenhum registro encontrado.";
                }

                if (isset($_GET['edit_id'])) {
                    $edit_id = $_GET['edit_id'];
                    $sql = "SELECT * FROM registros WHERE id='$edit_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $tipo = $row['tipo'];
                        $descricao = $row['descricao'];
                        $valor = $row['valor'];
                        $data = $row['data'];
                        $forma_pagamento = $row['forma_pagamento'];
                        $status = $row['status'];
                    }
                }
            ?>
        </section>
    </main>
</div>
