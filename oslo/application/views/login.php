<!DOCTYPE html>
<html lang="it">
    <?php $this->load->view ('base/head');?>
<body>
    <div id="wrapper">
        <?php $this->load->view ('base/header');?>
        <div id="page">
            <div id="content">
                <p>
                    <b>Inserisci i dati e effettua il Login </b>
                </p>
                <?php 
                echo "<br/>";
                echo form_open('login/check');?>
                    <div ><?php// echo validation_errors()?></div>

                    <?php $at_nick=array('class'=>'label_nick');?>
                    <?=form_label('Nickname : ', 'nome', $at_nick);?>  
                    <!-- <input type="text" name="nome" value="<?php // echo set_value('nome'); ?>" size="0" /> -->
                    <?php 
                    $vet_nome=array(
                                'name' => 'nome',
                                'id' => 'nome', 
                                'required'=>'required',
                                'value'=>set_value('nome', ''),
                                    );
                    ?>
                    <?=form_input($vet_nome);?>

                    <br/> <br/>
                    <?php $at_pass=array('class'=>'label_pass');?>
                    <?=form_label('Password : ', 'pin',$at_pass);?>
                    <?php 
                    $vet_pin=array(
                               'name' => 'pin',
                               'id' => 'pin', 
                               'required'=>'required',
                               'value'=>set_value('pin', ''),
                               'type'=>'password',
                                   );
                    ?>  
                    <?=form_input($vet_pin);?>
                    <?php// echo form_error('pin'); ?>
                    <br/> <br/>
                    <?php 
                    if (isset ($error)) {
                        echo "<div class='errore_login'>";
                        echo "ATTENZIONE! ERRORE! I dati inseriti non sono corretti ";                            
                        echo  anchor ('login', ' RIPROVA') ;    
                        echo "</div>";
                    }
                    ?>
                    <div class="form_clear"></div>

                    <?php $go=array(
                                    'id'=>'go',
                                    'name'=>'go',
                                    'type'=>'submit',
                                    'value'=>'LOGIN',
                                    'class'=>'botton_login'
                                    );
                    ?>    
                    <?=form_submit($go);?>
                <?=form_close();?>
                <br/><br/>
            </div> <!-- end #content -->
            <div style="clear: both;">&nbsp;</div>
        </div> <!-- end #page -->
    </div><!-- end #wrapper --> 
    <?php $this->load->view ('base/footer');?>
</body>
</html>	