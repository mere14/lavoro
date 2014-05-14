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
                <?php $id_administrator=$this->session->userdata('is_id');?> 
                <?php echo "<br/> <br/> Per registrare una prenotazione compila tutti i campi del form <br/> <br/>";?>          
                <?php echo form_open('prenota/nuova');?> 
                    <div > <?php //echo validation_errors()?></div>
                    <!--NON SERVE PIU IL MENU A TENDINA PASSO ID_ADMIN IN AUTOMATICO E NASCOSTO -->
                    <?php
                    $at_admin=array('class'=>'label_admin');
                    //echo form_label('Seleziona Admin','admin', $at_admin);
                    //$dropdown_carica = array();
                    //foreach ($admin as $ad) {
                    //$dropdown_carica[$ad['ad_id']] = $ad['ad_cognome'];
                    //} ?>
                    <div class='input_admin'>
                    <?php // echo form_dropdown('admin',$dropdown_carica); ?>       
                    </div> 
                    <div class="form_clear"></div>
                    <!--//FINE MENU A TENDINA -->
                    <?php echo form_hidden('admin', $id_administrator);?>
                       
                        <?php $at_cliente=array('class'=>'label_cliente');?>
                            <?=form_label('Inserisci Cliente ', 'clientes',$at_cliente);?>
                            
                        <?php 

                        $dropdown_carica3 = array();
                        foreach ($clienti as $cl) {
                        $dropdown_carica3[$cl['cl_cognome']] = $cl['cl_cognome']. ' - ' .$cl['cl_nome']. ' - ' .$cl['cl_telefono']; 
                        
                        
                        }
                        
                        ?>
                        <div class='input_admin'>
                         <?php  echo form_dropdown('cliente',$dropdown_carica3); ?>       
                        </div>     
                    
                       
                    <div class="errore_form"><?php echo form_error('cliente') ?> </div>
                    <div class="form_clear"></div>
                    
                    
                        <?php $at_data=array('class'=>'label_data_prenota'); ?>
                            <?=form_label('Inserisci la data', 'data', $at_data);?>
                            <?php $vet_data=array('name' => 'data',
                                              'id' => 'data', 
                                              'type'=>'date',
                                              'required'=>'required',
                                              'value'=>set_value('data', ''),
                                              'placeholder' => 'aaaa/mm/gg', 
                                                );
                            ?>
                             <div class='input-verifica'>
                            <?=form_input($vet_data);?>
                       </div> 
                   
                    <div class="form_clear"></div>  
                    
                    
                    
                        <?php $at_ora=array('class'=>'label_ora_prenota');?>
                            <?=form_label('Ora Inizio', 'inizio',$at_ora);?>
                            <?php $vet_ora_inizio=array('name' => 'inizio',
                                              'id' => 'inizio', 
                                              'type'=>'time',
                                              'required'=>'required',
                                              'placeholder' => 'hh:mm',
                                              'value'=>set_value('inizio', ''),
                                            );
                            ?>
                            <div class='input-verifica_ora'>
                            <?=form_input($vet_ora_inizio);?>
                       </div>                   
                    <div class="form_clear"></div>

                            <?=form_label('Ora Fine', 'fine', $at_ora);?>
                            <?php $vet_ora_fine=array('name' => 'fine',
                                              'id' => 'fine',
                                              'type'=>'time',
                                              'required'=>'required',
                                              'placeholder' => 'hh:mm',
                                              'value'=>set_value('fine', ''),
                                            );
                            ?>
                             <div class='input-verifica_ora'>
                            <?=form_input($vet_ora_fine);?>
                         </div>
                    <div class="errore_form"><b><?php echo form_error('fine') ?> </b></div>
                    <div class="form_clear"></div>
                        
                        <?php $at_telefono=array('class'=>'label_telefono');?>
                            <?=form_label('Telefono', 'telefono',$at_telefono);?>
                            <?php $vet_telefono=array('name' => 'telefono',
                                              'id' => 'telefono',
                                              'type'=>'tel',
                                              'value'=>set_value('fine', ''),
                                            );
                            ?>
                            <?php// messaggio di errore sopra il campo echo form_error('telefono'); ?>
                            <div class='input-verifica_ora'>
                            <?=form_input($vet_telefono);?>
                        </div>
                    <div class="errore_form"><b><?php echo form_error('telefono') ?></b> </div>
                    <div class="form_clear"></div>
                        
                             <?php $at_prezzo=array('class'=>'label_prezzo');?>
                            <?=form_label('Prezzo', 'prezzo',$at_prezzo);?>
                            <?php $asa=set_value('prezzo'); ?>
                            <?php $vet_prezzo=array('name' => 'prezzo',
                                              'id' => 'prezzo', 
                                              'required'=>'required',
                                              'value' => '30',
                                              'size' =>'2',
                                            );
                            ?>
                            <div class='input-verifica_ora'>
                            <?=form_input($vet_prezzo);?>
                        </div>
                    <div class="errore_form"><?php echo form_error('prezzo') ?> </div>
                    <div class="form_clear"></div>
                        
                       
                        <?php echo form_label('Scegli custode','custode', $at_admin);

                        $dropdown_carica2 = array();
                        foreach ($operatori as $op) {
                        $dropdown_carica2[$op['op_id']] = $op['op_cognome']. ' ' .$op['op_nome'];
                        
                        
                        }
                        ?>
                        <div class='input_admin'>
                         <?php  echo form_dropdown('custode',$dropdown_carica2); ?>       
                        </div> 
                        <div class="form_clear"></div>
                        <div>
                        <?php $go_prenota=array(
                                       'id'=>'go_prenota',
                                       'name'=>'go_prenota',
                                       'type'=>'submit',
                                       'content'=>'PRENOTA',
                                       'value'=>'PRENOTA',
                                       'class'=>'go');?>    
                        <?=form_submit($go_prenota);?>
                        </div>
                    <?=form_close();?>
                        
                         <b>&nbsp;</b>
                            <?php echo form_open('prenota/nuovo_cliente');?> 
                            <?php $add_cliente=array(
                                       'id'=>'add',
                                       'name'=>'add',
                                       'type'=>'submit',
                                       'content'=>'ADD NUOVO CLIENTE',
                                       'value'=>'ADD NUOVO CLIENTE',
                                       'class'=>'add_bot_cliente');?>    
                            <?=form_submit($add_cliente);?>
                            <?php echo form_close();?> 
                         
<!--                         <br/><br/>-->
<!--                         <input type="date" name="cuddu" id="cuddu" />-->
                       
                </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
</body>
</html>	