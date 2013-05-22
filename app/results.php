<?php 
// consty results
$CONSTY = 1;
?>
<div>
    <?php foreach ( getResults($CONSTY) as $results ): 
        $partyname = '';
        $vote_percent = 45;
        ?>
        <?=$partyname?> <?=$vote_percent?>%
        <div style="width: <?=$vote_percent?>; color: black; margin: 3px 0; height: 3px;">
        </div>
    <?php endforeach; ?>
<div>
</div>

<?php 
// national results
$CONSTY = FALSE;
?>
<div>
    <?php foreach ( getResults($CONSTY) as $results ): 
        $partyname = '';
        $vote_percent = 45;
        ?>
        <?=$partyname?> <?=$vote_percent?>%
        <div style="width: <?=$vote_percent?>; color: black; margin: 3px 0; height: 3px;">
        </div>
    <?php endforeach; ?>
<div>
</div>

    
    
<?php ?>
<?php ?>
<?php ?>
