�o\m�=�\N�r�o8��E��	���e'����/�]VA�Q�V�谳�	��S��,�`6�	��#���iWDW/�mOU-�GV�����հ���N���؆��&��
�i�m��D�#k�����߯�ڔ���/c��̀�H�<�P����ʺ�������^�gt@�����ޑAck��Ѱ��l}ӳ�FӾR��Z!�.���o��/�W���A���C�,}�l�������Z���9T�^�ߗ��{��!�%`M~v��U�;r|W���4 �z�u�����g^�oZ"�)�~X77���`\8�ǝ5Y�٬�]�����oA^b�a2������d�>Ǻ� ^�t4k����τ��>r�M6��1�
)ۥ��A;r{��֬�Y,~$��.wmF���Vqd*�pn�K���j87MR0�i�o��j�%���W�A��=�w�)�W�s��(.�۪0� �����m�E=%-�+��N��m���� ��y~�       arr['.$y.'] = prompt("Ingresa porcentaje del corte '.$arr[$y].'");
                suma=suma+parseInt(arr['.$y.'],10);
            </script>
        ';
    }
    $porcentajes = array(sizeof($arr));
    $suma=0;
    for($y=0; $y<sizeof($arr); $y++){
        $porcentajes[$y]='<script type="text/javascript">document.write(arr['.$y.']);</script>';
    }
    $suma='<script type="text/javascript">document.write(suma);</script>';
    
    if($suma=='100'){
        echo 'entro';
        #for($y=0; $y<sizeof($arr); $y++){
        #    $update_cortes= pg_query("UPDATE cortes SET porcentajes = ".$porcentajes[$y]." WHERE cod_cur=".$cur." and n_corte=".($y+1)."");
        #}
    }else{
        #echo '
        #<script type="text/javascript" >
        #    alert("La suma de los porcentajes debe ser igual a 100 por favor intentar nuevamente");
        #    window.location="../Profesor_cursos.php?user='.$mensaje.'";   
        #</script>
        #';
    }
?>