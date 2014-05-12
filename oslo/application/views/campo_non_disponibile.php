<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                    <?php 
                    echo "Ciao, hai selezionato <b>" .$a. " </b>dalle ore <b>" .$b. "</b> alle <b>" .$c. "</b> ";
                    echo "<br/> <br/>";
                    echo "Ti informiamo che nella giornata, e nelle ore da te indicate, il campo <b> non è disponibile </b>"; 
                    echo "<br/><br/>" ;
                    echo "<b>Ecco le prenotazioni per la data selezionata!</b><br/> Dai uno sguardo e se trovi uno spazio libero adatto ai tuoi impegni affrettati a ";
                    echo "<b>";
                    echo anchor('info', 'CONTATTARCI');
                    echo "</b>";
                    ?>
                </p>
                <br/>
              
                <table class="tab1_non_disponibile">
                    <tr class="tab1_riga_titolo"> 
                        <td class="tab1_campo1"> </td>
                        <td class="tab1_campo2"> ORA INIZIO </td>                       
                        <td class="tab1_campo2">ORA FINE</td>
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
                            </tr> 
                        <?php $cambia_righe++; ?>
                    <?php endforeach; ?>
                </table>
                <br/><br/>
                <?php 
                    echo anchor('verifica', 'Verifica la disponibilità del campo in un altra data <b> >> </b>', 'title= "riprova" ');
                ?>
                <br/><br/><br/><br/>
                <div class="informativa"> La pagina è uno strumento aggiuntivo per i clienti.
                    I dati visualizzati potrebbero non essere aggiornati in tempo reale. <br/>
                    Potrebbe capitare pertanto di visualizzare uno spazio disponibile, laddove l'impianto in realtà è già stato
                    prenotato, ma non è ancora stata inserita la registrazione all'interno del database.<br/>
                    Ricordiamo inoltre che con questa procedura non si effettua nessuna prenotazione (per prenotare leggi qui).
                </div>
            </div> <!-- end #content -->           
            <div style="clear: both;">&nbsp;</div>            
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	
 
         
        
            
