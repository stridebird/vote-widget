<form action="" method="POST">
    <div>    
        <input type="text" name="email" value="" />
    </div>

    <div>    
        <select id="name" name="party">
            <?php foreach ($PARTY as $id => $name): ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>    
        <select id="name" name="consty">
            <?php foreach ($CONSTY as $id => $name): ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>    
        <input type="submit" value="vote!" />
    </div>    
</form>