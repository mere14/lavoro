<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
         <?php 
        if ($this->session->userdata('is_livello'))
            $this->load->view ('base/header_private_master');
        else
        $this->load->view ('base/header_private');
        ?>
        <div id="page">
            <div id="content">
               <div class="saluto">Benvenuto <?php echo ucfirst($this->session->userdata('nome'));?></div> 
               <br/><br/>
               <?php echo "Elenco di tutte le prenotazioni " ; ?>
               <br/><br/>
               <table class="tab_oggi">
                   <tr class="tab_oggi_titolo">
                       <td>ADMIN</td>
                       <td>DATA</td>                             
                       <td>ORA INIZIO</td>
                       <td>ORA FINE </td>
                       <td>CLIENTE</td>
                       <td>TELEFONO</td>
                       <td>PREZZO</td>
                       <td>OPERATORE</td>
                   </tr>                 
                   <?php 
                   $cambia_righe=2;
                   $flag=0;
                   foreach($prenotazioni as $ris): ?>
                       <?php                            
                       if (($ris['pr_data'] < $today) AND ($cambia_righe % 2) )
                           {$color="passato";}
                       else 
                           { $color="passato2"; }
                       if ($ris['pr_data'] == $today)
                           $color="presente";
                       if (($ris['pr_data'] > $today) AND ($cambia_righe % 2) )
                           $color="futuro2";
                       else if ($ris['pr_data'] > $today)  
                           $color="futuro";
                       ?> 
                       <tr class="<?php echo $color ?>">
                            <td ><?=$ris['ad_cognome']?></td>                                   
                            <td><?=$ris['pr_data']?></td>
                            <td><?=$ris['pr_ora_inizio']?></td>
                            <td><?=$ris['pr_ora_fine']?></td>
                            <td><?=$ris['pr_nome']?></td>
                            <td><?=$ris['pr_telefono']?></td>
                            <td><?=$ris['pr_prezzo']?></td>
                            <td><?=$ris['op_cognome']?></td>
                       </tr>   
                        <?php 
                        $cambia_righe ++;
                    endforeach; ?>
                </table>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	