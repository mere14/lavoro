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
                    <?php 
                    echo "<b>";
                    echo "ATTENZIONE, NON E' POSSIBILE REGISTRARE LA PRENOTAZIONE, L'IMPIANTO NON E' DISPONIBILE";
                    echo "</b>";
                    echo "<br/> <br/>";
                    echo "Nella giornata selezionata il campo risulta già essere occupato nei seguenti orari : ";
                    ?>
                    <br/><br/>
                    <table class="tab2_non_disponibile">
                        <tr class="tab1_riga_titolo"> 
                            <td class="tab2_campo1"> </td>
                            <td class="tab2_campo2"> ORA INIZIO </td>                       
                            <td class="tab2_campo2">ORA FINE</td>
                            <td class="tab2_campo3">CLIENTE</td>
                        </tr>
                        <?php 
                        $cambia_righe=1;
                        foreach($prenotazioni as $ris): ?>
                            <?php 
                            if ($cambia_righe % 2) : ?>
                                <tr class="tab1_riga1">
                            <?php 
                            else : ?>
                                <tr class="tab1_riga2">
                            <?php endif;?>                             
                                    <!--<td><?//=$ris['pr_data']?></td> -->
                                    <td class="tab1_campo1">OCCUPATO</td>
                                    <td class="tab1_campo2"><?=$ris['pr_ora_inizio']?></td>                           
                                    <td class="tab1_campo2"><?=$ris['pr_ora_fine']?></td>
                                    <td class="tab1_campo2"><?=$ris['pr_nome']?></td>
                                </tr> 
                            <?php $cambia_righe++; ?>
                        <?php endforeach; ?>
                    </table>
                    <br/><br/>
                    <?php 
                        echo anchor('prenota', 'RIPROVA', 'title= "prenota" ');
                    ?>
             </div> <!-- end #content -->
             <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
</body>
</html>	
         
        
            
