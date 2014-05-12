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
               <b><?php echo "MODIFICA I CAMPI CHE VUOI " ; ?></b>
               <br/><br/>
                <table class="tab_edit">
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
                        <?php $id_sel=$ris['pr_id'];?>
                        <?php $hidden = array('cancella' => $id_sel);?>
                        <?php echo form_open('visualizza_all_master/aggiorna','', $hidden);?>
                                <tr class="tab_oggi_riga1">  
                                    <td>
                                    
                                    <?php
                                    $drop1 = array(
                                                '1'  => 'Mereu',
                                                '2'    => 'Scano',
                                               
                                                    );

                                    
                                    echo form_dropdown('admin', $drop1, $ris['pr_ad_id']) ;   
                                    ?>    
                                    </td>
                                    <td>                                                                                              
                                    <?php $vet_data=array('name' => 'data',
                                              'id' => 'data', 
                                              'type'=>'date',
                                              'required'=>'required',
                                              'value'=>$ris['pr_data'],
                                              
                                                );
                                    ?>    
                                    <?=form_input($vet_data);?>    
                                    </td>
                                    
                                    <td>
                                   
                                    <?php $vet_ora_inizio=array(
                                              'name' => 'inizio',
                                              'id' => 'inizio', 
                                              'type'=>'time',
                                              'required'=>'required',
                                              'placeholder' => 'hh:mm',
                                              'value'=>$ris['pr_ora_inizio'],
                                            );
                                    ?>                          
                                    <?=form_input($vet_ora_inizio);?>
                                    </td>
                                    
                                    <td>
                                    <?php $vet_ora_fine=array('name' => 'fine',
                                              'id' => 'fine',
                                              'type'=>'time',
                                              'required'=>'required',
                                              'placeholder' => 'hh:mm',
                                              'value'=>$ris['pr_ora_fine'],
                                            );
                                    ?>
                                    <?=form_input($vet_ora_fine);?>
                                    </td>
                                    <td>
                                    <?php $vet_cliente=array('name' => 'cliente',
                                              'id' => 'telefono',
                                              'type'=>'tel',
                                              'value'=>$ris['pr_nome'],
                                            );
                                    ?>                     
                                    <?=form_input($vet_cliente);?>
                                    </td>
                                    <td>
                                    <?php $vet_telefono=array('name' => 'telefono',
                                              'id' => 'telefono',
                                              'type'=>'tel',
                                              'value'=>$ris['pr_telefono'],
                                            );
                                    ?>                     
                                    <?=form_input($vet_telefono);?>
                                    </td>
                                    
                                    <td>
                                    
                                    <?php $vet_prezzo=array('name' => 'prezzo',
                                              'id' => 'prezzo', 
                                              'required'=>'required',
                                              'value' => $ris['pr_prezzo'],
                                              'size' =>'2',
                                            );
                                    ?>
                            
                                    <?=form_input($vet_prezzo);?>
                                    
                                    </td>
                                    <td>                                    
                                    
                                    <?php 
                                    $drop2 = array(
                                                '3'  => 'Piras',
                                                '2'    => 'Scano',
                                                '1'    => 'Mereu',
                                                    );

                                    //$shirts_on_sale = array('small', 'large');
                                    echo form_dropdown('custode', $drop2, $ris['pr_op_id']) ;
                                    ?>                      
                                             
                                    
                                    </td>
                                </tr> 
                                 <tr>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>
                                    <td> <?php echo form_error('fine') ?> </td>
                                    <td> <?php echo form_error('cliente') ?> </td>
                                    <td> <?php echo form_error('telefono') ?> </td>
                                    <td> <?php echo form_error('prezzo') ?> </td>
                                    <td> &nbsp; </td>
                                </tr> 
                        <?php endforeach; ?>
                    </table>
                    <br/><br/>
                    
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
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	