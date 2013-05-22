<div class="results">
<?php
// consty results
$c = getConsty($consty);
$consty_name = $c[$consty]
?>
    <div> IN CONSTITUENCY: 
<form>
        <select id="name" name="consty">
            <?php foreach (getConsty() as $id => $name): ?>
                <?php $selected = $name == $consty_name ? "selected='selected'" : ""; ?>
                <option value="<?= $id ?>" <?= $selected ?>><?= $name ?></option>
            <?php endforeach; ?>
        </select> <input type="submit" value="change" />
</form>
        <div class="resultbox">
            <?php
            $results = getResults($consty);
            makeResults($results);
            #    echo("<pre>".print_r($results,1)."</pre>");
            ?>
        </div>
    </div>

    <?php
// national results
    $consty = FALSE;
    ?>
    <div> NATIONAL:
        <div class="resultbox">
            <?php
            $results = getResults($consty);
            makeResults($results);
            #    echo("<pre>".print_r($results,1)."</pre>");
            ?>
        </div>
    </div>

<a href="">vote again</a>

</div>

<?php
function makeResults($results){
    foreach ($results['votes'] as $partyname => $tally){
        $vote_percent = round($tally / $results['totalvotes'] * 100, 1);
        $vote_percent2 = round($tally / $results['totalvotes'] * 100, 0);
        ?>
        <div>
            <?= $partyname ?> <?= $vote_percent . "%" ?>
            <div style="width: <?= $vote_percent2 . "%" ?>; background-color: black; border: 1px solid black; margin: 3px 0; height: 3px;">
            </div>
        </div>
    <?php }
}

