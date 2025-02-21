<section>
    <p><b>Auftragsbearbeitung:</b></p>
    <?php if ($orderByID != 0): ?>
        <form method="post">
            <input type="hidden" name="auftragID" value="<?php echo e($orderByID[0]->auftragID); ?>"</input>
            <input type="text" name="edlName" value="<?php echo e($orderByID[0]->edlName); ?>"</input>
            <input type="text" name="reprMail" value="<?php echo e($orderByID[0]->reprMail); ?>"</input>
            <input type="text" name="status" value="<?php echo e($orderByID[0]->status); ?>"</input>
            <select name="edlName" >
                <?php foreach ($edl as $item): ?>
                    <option <?php if($item->edlName === $orderByID[0]->edlName) echo 'selected'; ?>>
                        <?php echo e($item->edlName); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Speichern">
            <input type="reset" value="Abbrechen">
        </form>
    <?php else: ?>
        <p>Kein oder kein gültiger Auftrag ausgewählt</p>
    <?php endif; ?>
</section>
