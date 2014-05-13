<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                  <?php echo  "messaggio = ". $messaggio ; ?>
                    <br/><br/>
                  <?php echo  "nome cliente = ". $cl_nome ; ?>  
                </p> 
                
                <?php 
                    echo anchor('registrazione', 'nuovo cliente', 'title= "cliente" ');
                ?>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	