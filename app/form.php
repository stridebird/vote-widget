<form action="" method="POST">
    <input type="text" name="" value="" />
    <select id="name" name="party">
        <?php foreach ( $PARTY as $id=>$name ): ?>
        <option value="<?=$id?>"><?=$name?></option>
        <?php endforeach; ?>
    </select>
    <select id="name" name="consty">
        <?php foreach ( $CONSTY as $id=>$name ): ?>
        <option value="<?=$id?>"><?=$name?></option>
        <?php endforeach; ?>
    </select>
</form>