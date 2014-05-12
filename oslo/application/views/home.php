<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                 <p>
                    Oggi è : <?php echo $today ?> <br/>
                    Ecco le prenotazioni per i prossimi giorni
                </p>
                <table>
                <?php 
                    foreach($prenotazioni as $ris): ?>
                        <tr>    
                            <td><?=$ris['pr_data']?></td>
                            <td><?=$ris['pr_ora_inizio']?></td>
                            <td><?=$ris['pr_ora_fine']?></td>
                        </tr>   
                    <?php endforeach; ?>
                </table>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
    
</body>
</html>	