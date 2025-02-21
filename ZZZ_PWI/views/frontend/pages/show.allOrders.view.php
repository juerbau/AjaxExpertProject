<section>
    <p><b>Auftragsauswahl:</b></p>
    <table>
        <thead>
        <tr>
            <th>LINK</th>
            <th>EDL</th>
            <th>Mail</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($allOrders as $item): ?>
            <tr>
                <td><a href="./?route=order&id=<?php echo e($item->auftragID); ?>">Auftrag: <?php echo e($item->auftragID); ?></a></td>
                <td><?php echo e($item->edlName); ?></td>
                <td><?php echo e($item->reprMail); ?></td>
                <td><?php echo e($item->status); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
