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
               <?php echo "Solo x master, ora puoi Modificare " ; ?>
               <br/><br/>
               <table class="tab_modifica_prenotazioni">
                   <tr class="tab_oggi_titolo">
                       <td>ADMIN</td>
                       <td>DATA</td>                             
                       <td>ORA INIZIO</td>
                       <td>ORA FINE </td>
                       <td>CLIENTE</td>
                       <td>TELEFONO</td>
                       <td>PREZZO</td>
                       <td>OPERATORE</td>
                       <td><img src="<?php echo base_url().'images/edit.png'?>" /></td>
                       <td><img src="<?php echo base_url().'images/canc.png'?>" /></td>
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
                            <?php $id_sel=$ris['pr_id'];?>
                            <?php $hidden_m = array('modifica' => $id_sel);?>
                            <?php echo form_open('visualizza_all_master/modifica','', $hidden_m);?>
                                <?php $go_modifica=array(
                                               'id'=>'go_modifica',
                                               'name'=>'go_modifica',
                                               'type'=>'image',
                                               
                                               'src' =>base_url().'images/edit.png',
                                                'class'=>'edit_prenotazione',
                                            );
                                ?>
                              
                            
                                <td> <?=form_submit($go_modifica);?> </td>
                            <?=form_close();?> 
                            <?php $hidden = array('cancella' => $id_sel);?>
                            <?php echo form_open('visualizza_all_master/cancella','', $hidden);?>
                                <?php $go_cancella=array(
                                               'id'=>'go_cancella',
                                               'name'=>'go_cancella',
                                               'type'=>'image',                                             
                                               'src' =>base_url().'images/canc.png',
                                                'class'=>'edit_prenotazione',
                                               );?>    
                                <td> <?=form_submit($go_cancella);?> </td>
                            <?=form_close();?>
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