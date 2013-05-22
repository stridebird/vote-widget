How will you vote in the next election?
<form action="" method="POST">
    <div class="formelement">    
        <div class="formlabel">Which party</div>
        <select id="name" name="party">
            <?php foreach ($PARTY as $id => $name): ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formelement">    
        <div class="formlabel">Your Constituency</div>
        <select id="name" name="consty">
            <?php foreach ($CONSTY as $id => $name): ?>
                <option value="<?= $id ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formelement">    
        <div class="formlabel">Your email (optional)</div>
        <input type="text" name="email" value="" />
    </div>

    <div class="formelement">    
        <input type="submit" value="vote!" />
    </div>    
</form>