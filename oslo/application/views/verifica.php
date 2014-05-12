<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                    <b>Le prenotazioni online </b> non sono ancora attive, in questa pagina potete comunque verificare la disponibilità
                    dell'impianto inserendo la data e l'ora in cui vorreste prenotare. 
                    <br/>
                    Per effettuare la prenotazione o per altre informazioni 
                    <b><?php echo anchor('info', 'CHIAMACI') ?></b>.
                </p> 
                <br/>                
                <?php $attributi=array('class'=>'verificad', 'id'=>'verifica');?>
                <?php echo form_open('verifica/disponibilita',$attributi);?> 
                    <div > <?php// echo validation_errors()?></div>
                    <?php $at_label=array('class'=>'label_data');?>
                    <?=form_label('Inserisci la data : ', 'data',$at_label);?>
                    <?php $vet_data=array(
                                        'name' => 'data',
                                        'id' => 'data', 
                                        'type'=>'date',
                                        'required'=>'required',
                                        'placeholder' => 'aaaa/mm/gg',
                                        );
                    ?>
                    <div class='input-verifica'>
                        <?=form_input($vet_data);?>
                    </div> 
                    <div class="errore_form"><?php echo form_error('data') ?> </div>
                    <div class="form_clear"></div>                   
                    <?php $at_ora=array('class'=>'label_ora');?>
                    <?=form_label('Ora Inizio : ', 'inizio',$at_ora);?>
                    <?php $vet_ora_inizio=array(
                                                'name' => 'inizio',
                                                'id' => 'inizio', 
                                                'type'=>'time',
                                                'required'=>'required',
                                                'placeholder' => 'hh:mm',
                                                );
                    ?>
                    <div class='input-verifica_ora'>
                        <?=form_input($vet_ora_inizio);?>
                    </div>                   
                    <div class="form_clear"></div>  
                    <?=form_label('Ora Fine : ', 'fine',$at_ora);?>
                    <?php $vet_ora_fine=array(
                                            'name' => 'fine',
                                            'id' => 'fine', 
                                            'type'=>'time',
                                            'required'=>'required',
                                            'placeholder' => 'hh:mm',
                        
                                            );
                    ?>
                    <div class='input-verifica_ora'>
                        <?=form_input($vet_ora_fine);?>
                    </div>
                    <div class="errore_form"><?php echo form_error('fine') ?> </div>
                    <div class="form_clear"></div>             
                    <div>
                        <?php $go=array(
                                        'id'=>'go',
                                        'name'=>'go',
                                        'type'=>'submit',
                                        'content'=>'INVIA',
                                        'value'=>'VERIFICA',
                                        'class'=>'go'
                                        );
                        ?>    
                        <?=form_submit($go);?>
                    </div>
                <?=form_close();?>
                <br/><br/><br/>
                <div class="informativa"> La pagina è uno strumento aggiuntivo per i clienti.
                    I dati visualizzati potrebbero non essere aggiornati in tempo reale. <br/>
                    Potrebbe capitare pertanto di visualizzare uno spazio disponibile, laddove l'impianto in realtà è già stato
                    prenotato, ma non è stata ancora inserita la registrazione all'interno del database.<br/>
                    Ricordiamo inoltre che con questa procedura non si effettua nessuna prenotazione (per prenotare leggi qui).
                </div>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	