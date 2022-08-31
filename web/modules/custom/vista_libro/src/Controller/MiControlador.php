<?php
namespace Drupal\vista_libro\Controller;

class MiControlador{
    public function page(){
        $items = array();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "experience_backend";

        // Create connection
        $conn = new \mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        /*Buscamos las categorias*/
        $vid = 'categoria';
        $terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
        foreach ($terms as $term) {
            $a_categorias[] = array(
                'id' => $term->tid,
                'name' => $term->name
            );
        }
        $a_categorias = $this->array_por_id($a_categorias, 'id');
        /*Buscamos a los autores*/
        $vid = 'autor';
        $terms =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vid);
        foreach ($terms as $term) {
         $a_autores[] = array(
          'id' => $term->tid,
          'name' => $term->name
         );
        }
        $a_autores = $this->array_por_id($a_autores, 'id');
        // echo '<pre>';
        // print_r($a_autores);
        // echo '</pre>';
        // exit;



        $sql = "SELECT
                    nid,
                    TYPE,
                    field_titulo_value,
                    field_categoria_target_id,
                    field_autor_target_id,
                    field_descripcion_value,
                    field_imagen_target_id,
                    SUBSTRING(file_managed.uri, 10) AS uri,
                    filename
                    
                FROM
                    node
                LEFT JOIN node__field_titulo ON node.nid = node__field_titulo.entity_id
                LEFT JOIN node__field_categoria ON node.nid = node__field_categoria.entity_id
                LEFT JOIN node__field_autor ON node.nid = node__field_autor.entity_id
                LEFT JOIN node__field_descripcion ON node.nid = node__field_descripcion.entity_id
                LEFT JOIN node__field_imagen ON node.nid = node__field_imagen.entity_id
                LEFT JOIN file_managed ON node__field_imagen.field_imagen_target_id = file_managed.fid
                ";
        
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            // echo '<pre>';
            // print_r($row);
            // echo '</pre>';
            $resultado_final[$row['nid']] = $row;
            $resultado_final[$row['nid']]['autor'] = $a_autores[$row['field_autor_target_id']]['name'];
            $resultado_final[$row['nid']]['categoria'] = $a_categorias[$row['field_categoria_target_id']]['name'];
        }
        // echo 'Se viene';
        // echo '<pre>';print_r($resultado_final);echo('</pre>');exit; 
        $conn->close();
        
    


        return array(
            '#theme' => 'article_list',
            '#items' => $resultado_final,
            '#title' => 'Libros experience'
        );
    }

    function array_por_id($_datos,$_indice,$_varios=false,$_vacio=false){

        /*********************************************************************************************************/
        /*	FUNCION QUE PERMITE RETORNAR UN ARRAY CON LOS INDICES DESEADOS    									 */
        /*  pasamos de tener un array con indices numericos, 0,1,2,3,etc.. a tener un array con los indices 	 */	
        /*  de nombres que deseemos
        //
        // Parametros : 		
        //     $_datos  : Array con los valores.
        //	   $_indice : Es el nombre del indice interno del array que deseamos poner como principal.
        //		$_vacio : Si es true elimina espacios en blanco del valor.
        //
        //  retorna un array con los nombres de indice que queramos.	
        /**********************************************************************************************************/
    
        $_array_datos = array();
        foreach ($_datos as $key => $value) {
    
            if ($_vacio){			
                $_cadena = trim($_datos[$key][$_indice]);
            }else{
                $_cadena = $_datos[$key][$_indice];
            }
    
            if ($_varios) {
                $_array_datos[$_cadena][] = $_datos[$key];
            } else {
                $_array_datos[$_cadena] = $_datos[$key];
            }
        }
    
        return $_array_datos;
    }
}