<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Kronotime</title>    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles//style.css')?>">     
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles/ui-lightness/jquery-ui-1.10.3.custom.css')?>">     

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>          
    <script type="text/javascript" src="<?php echo base_url('assets/js/default.js')?>"></script>  	
    <script type="text/javascript" src="<?php echo base_url('assets/js/tab.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/common.js')?>"></script>  	
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>  	
     
</head>

<body>

    <header>
        <div class="logo">
            <img src="../../assets/image/logo.png">
        <nav>
            <ul>
                <li>HOME</li>
                <li>NOSOTROS</li>
                <li>CONTACTO</li>
                <li>LOGIN</li>
            </ul>
        </nav>
        </div>
    </header>    
    <section class="div_tittle_race">
    
        <div class="tittle_race">
            <?php echo ucwords($objCarrera->car_nombre) ?>
        </div> 
         <div class="date_race">
           <?php  $date = new DateTime($objCarrera->car_fecha); echo $date->format('F-m-d');?>
        </div>                
    </section>

    <section class="race_info">
        <div class="div_race caja-sombra">
         <img src="../../upload/<?php echo  $objCarrera->car_imagen?>" class="image_carrera">
            <div class="social">
                <div class="twitter"></div>
                <div class="fb"></div>
                <div class="mail"></div>
            </div>
        </div>         
       
        <div class="div_race" style="margin-left : 24px;">
            <select class="select_category"> 
                    <?php if($objSelectCategoria){
                    echo "<option selected='selected' value=".$objSelectCategoria->cat_id.">".$objSelectCategoria->cat_nombre."</option>";
                    }?>
                   <?php foreach ($objDatosCategoria->Datos as $categoria) {
                          echo "<option value=".$categoria->cat_id.">".$categoria->cat_nombre."</option>";
                    }?>
            </select>            
            <div class="resumen_carrera caja-sombra">
                <div class="promedio_carrera">
                    <span>PROMEDIO</span>
                </div>
                <div class="mejor_tiempo ">
                    <span>MEJOR TIEMPO</span>
                </div>
                <div class="div_text_resumen">
                    <span class="text_time">Tiempo promedio de la carrera</span>
                    <span class="val_time">00:45:98</span>
                </div>
            </div>
        </div>    

      <div class="div_race" style="margin-left : 24px;">
            <select class="select_category">
                  <option value="">Seleccione genero</option>
                  <option value="saab">Masculino</option>
                  <option value="mercedes">Femenino</option>
                  
            </select>            
            <div class="resumen_carrera caja-sombra">
                <div class="promedio_mujeres">
                    <span>75% MUJERES</span>
                </div>
                <div class="mejor_tiempo">
                    <span>25% HOMBRES</span>
                </div>
                <div class="div_text_resumen">                    
                    <span class="val_time">UNA TORTA</span>
                </div>
            </div>
        </div>


    </section>
    <section class="content">
        <div class="content_more">        
            <div class = "form_seach">
                <form name="myform" action="index.php/carrera/show_race">
                    <input type="hidden" id="id_carrera" name="id_carrera" value="el id"/>
                    <input type="text" id="button_search" class="input_search">
                    <div class = "div_search">
                    <input type="submit" class="button_search" value="">
                </form>
            </div>
        </div>
        
    </section>
    <section class="user_list">        
        <?php foreach ($objDatosCompetidor->Datos as $competidor) {
            echo "<div class='div_user'>";
            echo "<div class='div_user_name'>";
            echo "<span class='innerTEXT'>".$competidor->com_numero."</span>";
            echo "<div class='text_name'>".$competidor->com_nombre."</div>";
            if ($competidor->com_sexo == 'M'): 
            echo "<span class='info_user'>GENERO: HOMBRE</span>";
            else:
            echo "<span class='info_user'>GENERO: MUJER</span>";            
            endif;
            echo "</div>";
            echo "<div class='div_user_numero'>";
            echo $competidor->com_posicion;
            echo "<span class='info_numero'>NUMERO EN LA COMPETENCIA</span>";
            echo "</div>";
            echo "<div class='div_user_numero_general'>";
            echo $competidor->com_posicion_general;
            echo "<span class='info_numero'>NUMERO POSICION GENERAL</span>";
            echo "</div>";
            echo "<div class='div_user_tiempo'>";
            echo $competidor->com_tiempo_oficial;
            echo "<span class='info_numero'>TIEMPO DE LLEGADA</span>";
            echo "</div>";
            echo "</div>";  
        }?>
        
    </section>    

    <footer  class="footer">
    <div class ="content_carriers">
        <div class="div_footer">
                <div class="square_fooder">
                </div>
                <div class ="fixed">                        
                    <span class="title">PURA VIDA</span><br>
                    <span class="text_footer">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non lectus sit amet arcu faucibus laoreet.</span><br>
                </div>

        </div>        
        <div class="div_footer">
            <input type="text" class="input_form name" placeholder="escriba su nombre completo">
            <input type="text" class="input_form email" placeholder="email">
            <input type="text" class="input_form telefono" placeholder="telefono">
          <input type="submit" id="guardar" value="">
        </div>        
    </div>
    </footer>
</body>





</html>

