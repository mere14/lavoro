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
               <b><?php echo "ELEMENTO CANCELLATO DEFINITIVAMENTE" ; ?></b>
               <br/><br/><br/><br/><br/><br/>
               <div class="botton_delete_procedi">
                   <?php echo anchor('visualizza_all_master','TORNA ALLA PAGINA MODIFICHE PRENOTAZIONI'); ?>
               </div>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	