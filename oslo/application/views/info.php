<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">	
                <p>
                    Pagina Info, adesso provo a leggere file xls
                </p>
                <?php
                echo $percorso;
                echo "</br> </br>" ;  
                
                foreach ($header as $titoli) {
                
                    echo $titoli['A'] . '-';
                    echo $titoli['B'] . '-'; 
                    echo $titoli['C'] . '-';
                    echo "</br>";
                    
                }
                
                
                foreach ($values as $data) {
                
                    echo $data['A'] . '-';
                    echo $data['B'] . '-'; 
                    echo $data['C'] . '-';
                    echo "</br>";
                    
                }

                   
                       
                ?>
                



            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper -->
    <?php $this->load->view ('base/footer');?>
    
</body>
</html>	