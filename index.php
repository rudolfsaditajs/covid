<?php


$limit = 50;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
if(isset($firstDate)||isset($secondDate)) {
    $firstDate = $_GET['firstDate'];

}


    $n = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a"));


?>

<form name="Filter" method="get">
    From:
    <input type="datetime-local" name="firstDate"  />
    <br/>
    To:

    <input type="submit" name="submit" />
</form>




<table>
    <thread>
        <th>Datums
        </th>
        <th>Testu Skaits</th>
        <th>Apstiprināto infekciju skaits</th>
        <th>Izārstēto pacientu skaits</th>
    </thread>
    <tbody>
    <?php
    foreach ($n->result->records as $record):

        ?>
        <tr>
            <td><?php echo $record->Datums;?></td>
            <td><?php echo $record->TestuSkaits;?></td>
            <td><?php echo $record->ApstiprinataCOVID19InfekcijaSkaits;?></td>
            <td><?php echo $record->IzarstetoPacientuSkaits;?></td>



        </tr>
    <?php



    endforeach;
    ?>

    </tbody>
</table>

<form method="get" action="/">
    <?php if($offset>0) : ?>
        <button type="submit" name="offset" value="<?php echo $offset-$limit; ?>"> << </button>
    <?php endif ?>
    <?php if(count($n->result->records)>=$limit): ?>
        <button type="submit" name="offset" value="<?php echo $offset+$limit; ?>"> >> </button>
    <?php endif ?>
</form>



