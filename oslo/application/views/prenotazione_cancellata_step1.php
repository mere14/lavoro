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
               <b><?php echo "Sei sicuro di voler cancellare questo elemento? " ; ?></b>
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
                    <?php if($prenotazioni)
                        foreach($prenotazioni as $ris):                 
                    ?>      
                                <tr class="tab_oggi_riga1">  
                                    <td><?=$ris['ad_cognome']?></td>
                                    <td><?=$ris['pr_data']?></td>
                                    <td><?=$ris['pr_ora_inizio']?></td>
                                    <td><?=$ris['pr_ora_fine']?></td>
                                    <td><?=$ris['pr_nome']?></td>
                                    <td><?=$ris['pr_telefono']?></td>
                                    <td><?=$ris['pr_prezzo']?></td>
                                    <td><?=$ris['op_cognome']?></td>
                                </tr>   
                        <?php endforeach; ?>
                    </table>
                    <br/><br/>
                    <?php $id_sel=$ris['pr_id'];?>
                    <?php $hidden = array('cancella' => $id_sel);?>
                    <?php echo form_open('visualizza_all_master/elimina','', $hidden);?>
                        <?php $go_cancella=array(
                                           'id'=>'go_modifica',
                                           'name'=>'go_modifica',
                                           'type'=>'submit',
                                           'content'=>'PROCEDI',
                                           'value'=>'PROCEDI',
                                           );?>    
                    <div class="botton_delete_procedi">
                        <?=form_submit($go_cancella);?> 
                    </div>
                    
                    <?=form_close();?>
                    <?php echo form_open('visualizza_all_master/annulla');?>
                    <?php $go_anulla=array(
                                           'id'=>'go_annulla',
                                           'name'=>'go_annulla',
                                           'type'=>'submit',
                                           'content'=>'ANNULLA',
                                           'value'=>'ANNULLA',
                                           );?>    
                    <div class="botton_delete_procedi">
                        <?=form_submit($go_anulla);?> 
                    </div>
                    <?=form_close();?>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	