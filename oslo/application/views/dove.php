<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                    Pagina Info, adesso provo a leggere file testo
                </p>
                <?php
                echo $percorso;
                echo "</br> </br>" ;  
                
               $file = fopen($percorso, "r"); // leggiamo linea per linea
                while(!feof($file))
                {
                echo fgets($file). "<br />";
                }
              fclose($file);
               
            
                ?>
                



            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
    
</body>
</html>	