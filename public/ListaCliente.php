
        <h2>Clientes</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Alterar</th>
            </tr>
           <?
           foreach ($param as $valor){
            ?>
            <tr>
                <td><?= $valor["id"] ?></td>
                <td><?= $valor["nome"]?></td>
                <td><a href="/mvc20242/cliente/alterar?id=<?= $valor["id"]?>">Aterar</a></td>
            </tr>
            <?
           }
           ?>
        </table>
     

