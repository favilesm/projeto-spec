<table border="1">
    <thead>
        <tr>
            <th> Título </th>
            <th> Texto </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dicas as $dica) : ?>
            <tr>
                <td><?php echo $dica->titulo_dica; ?></td>
                <td><?php echo $dica->texto_dica; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>