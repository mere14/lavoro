<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                    Ciao, hai selezionato <b> <?php echo $data ?></b> dalle ore <b> <?php echo $inizio ?></b> alle ore <b> <?php echo $fine ?></b>
                    <br/> <br/>
                    Ti informiamo che il campo <b> è disponibile </b>, per effettuare la prenotazione
                    <b><?php echo anchor('info', 'CONTATTACI'); ?><b/>
                </p> 
                
                <?php 
                    echo anchor('verifica', 'Effettua un altra ricerca', 'title= "riprova" ');
                ?>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	