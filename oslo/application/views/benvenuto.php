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
                <?php echo "Oggi è : <b>  $today_vera  </b>" ; ?><br/><br/>
                <?php echo "Ecco le prenotazioni in programma per il:&nbsp;<b>  $today  </b>" ; ?>
                <br/> <br/>
                <?php 
                if($prenotazioni) :
                ?>
                    <table class="tab_oggi">
                        <tr class="tab_oggi_titolo">
                            <td>ADMIN</td>                      
                            <td>ORA INIZIO</td>
                            <td>ORA FINE </td>
                            <td>CLIENTE</td>
                            <td>TELEFONO</td>
                            <td>PREZZO</td>
                             <td>OPERATORE</td>
                        </tr>                    
                  <?php 
                  else: 
                  ?>     
                    <table class="tab_oggi">
                        <tr class="tab_oggi_titolo">
                            <td>NESSUNA PRENOTAZIONE</td>                                                 
                        </tr>
                  <?php
                  endif;          
                        $cambia_righe=1;
                        foreach($prenotazioni as $ris): ?> 
                            <?php 
                            if ($cambia_righe % 2) : ?>
                                <tr class="tab_oggi_riga1">
                            <?php 
                            else : ?>
                                <tr class="tab_oggi_riga2">
                            <?php endif;?>
                                <?php $cambia_righe ++;  ?>  
                                <td><?=$ris['ad_cognome']?></td>                            

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
                <div class="sfoglia_agenda_data">SFOGLIA AGENDA</div>
                <div class="sfoglia_agenda">
                    <?php echo form_open('benvenuto/indietro'); ?>
                        <?php
                        $data_del = array(
                                        'name' => 'indietro',
                                        'id' => 'indietro',
                                        'value' => '../../images/freccia_sx.png',
                                        'type' => 'image',
                                        'src' =>base_url().'images/freccia_sx2.png',
                                        'class'=>'sfoglia_agenda_indietro', 
                                        );
                        echo form_submit($data_del);
                    echo form_close();
                    echo form_open('benvenuto/avanza'); 
                        $data_add = array(
                                        'name' => 'indietro',
                                        'id' => 'indietro',
                                        'value' => 'true',
                                        'type' => 'image',
                                        'src' =>base_url().'images/freccia_dx2.png',
                                        'class'=>'sfoglia_agenda_avanti',
                                        );
                        echo form_submit($data_add);
                    echo form_close();
                    ?>
                </div>
                <div class="sfoglia_agenda_data">
                    <?php 
                    if (isset($domani))
                        echo $domani;
                    if (isset($ieri))
                        echo $ieri;
                   ?>
                 </div>          
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
</body>
</html>	