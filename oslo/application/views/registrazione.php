<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">		
                
                <?php echo "<br/> <br/> Per registrare un nuovo Cliente compila tutti i campi del form <br/> <br/>";?>          
                <?php echo form_open('registrazione/add');?> 
                    <div > <?php //echo validation_errors()?></div>
                    <!--NON SERVE PIU IL MENU A TENDINA PASSO ID_ADMIN IN AUTOMATICO E NASCOSTO -->
                    
                       
                        <?php $at_nome=array('class'=>'label_data_prenota'); ?>
                            <?=form_label('Inserisci nome', 'data', $at_nome);?>
                            <?php $vet_nome=array('name' => 'data',
                                              'id' => 'nome', 
                                              'type'=>'text',
                                              'required'=>'required',
                                              'value'=>set_value('nome', ''),
                                              'placeholder' => 'name', 
                                                );
                            ?>
                             <div class='input-verifica'>
                            <?=form_input($vet_nome);?>
                       </div> 
                   
                    <div class="form_clear"></div>  
                    
                    
                    
                        <?php $at_cognome=array('class'=>'label_ora_prenota');?>
                            <?=form_label('Cognome', 'cognome',$at_cognome);?>
                            <?php $vet_cognome=array('name' => 'cognome',
                                              'id' => 'cognome', 
                                              'type'=>'text',
                                              'required'=>'required',
                                              'placeholder' => 'surname',
                                              'value'=>set_value('cognome', ''),
                                            );
                            ?>
                            <div class='input-verifica_ora'>
                            <?=form_input($vet_cognome);?>
                       </div>                   
                    <div class="form_clear"></div>
                   
                        <?php $at_telefono=array('class'=>'label_telefono');?>
                            <?=form_label('Telefono', 'telefono',$at_telefono);?>
                            <?php $vet_telefono=array('name' => 'telefono',
                                              'id' => 'telefono',
                                              'type'=>'tel',
                                              'value'=>set_value('telefono', ''),
                                            );
                            ?>
                            <?php// messaggio di errore sopra il campo echo form_error('telefono'); ?>
                            <div class='input-verifica_ora'>
                            <?=form_input($vet_telefono);?>
                        </div>
                    <div class="errore_form"><b><?php echo form_error('telefono') ?></b> </div>
                    <div class="form_clear"></div>
                        
                           
                        
                        <div>
                        <?php $go_registra=array(
                                       'id'=>'go_registra',
                                       'name'=>'go_registra',
                                       'type'=>'submit',
                                       'content'=>'Registra',
                                       'value'=>'Registra',
                                       'class'=>'go');?>    
                        <?=form_submit($go_registra);?>
                        </div>
                    <?=form_close();?>
                </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
</body>
</html>	