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
                <p>
                  <?php echo  "messaggio = ". $messaggio ; ?>
                    <br/><br/>
                  <?php echo  "nome cliente = ". $cl_nome ; ?>  
                </p> 
                
                <?php 
                    echo anchor('prenota', 'prenota campo', 'title= "prenota campo" ');
                ?>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	