<?php
// consty results
$c = getConsty($consty);
$consty_name = $c[$consty]
?>
<div> YOUR CONSTITUENCY: <?= $consty_name ?>
    <?php
    $results = getResults($consty['id']);
#    echo("<pre>".print_r($results,1)."</pre>");

    foreach ($results['votes'] as $partyname => $tally):
        $vote_percent = round($tally / $results['totalvotes'] * 100, 1);
        $vote_percent2 = round($tally / $results['totalvotes'] * 100, 0);
        ?>
        <div>
            <?= $partyname ?> <?= $vote_percent . "%" ?>
            <div style="width: <?= $vote_percent2 . "%" ?>; background-color: #666; border: 1px solid black; margin: 3px 0; height: 3px;">
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
// national results
$consty = FALSE;
?>
<div> NATIONAL:
    <?php
    $results = getResults($consty);
#    echo("<pre>".print_r($results,1)."</pre>");

    foreach ($results['votes'] as $partyname => $tally):
        $vote_percent = round($tally / $results['totalvotes'] * 100, 1);
        $vote_percent2 = round($tally / $results['totalvotes'] * 100, 0);
        ?>
        <div>
            <?= $partyname ?> <?= $vote_percent . "%" ?>
            <div style="width: <?= $vote_percent2 . "%" ?>; background-color: black; border: 1px solid black; margin: 3px 0; height: 3px;">
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a href="">vote again</a>

<?php ?>
<?php ?>
<?php ?>
