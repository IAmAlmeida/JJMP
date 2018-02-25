

    <?php
    require_once("../../config.php");
    if (isset($_POST['ID'])) {
        $id = $_POST['ID'];
        $imgpath='public_html/img/background.png';
        $query = "SELECT info.nickname, forum.pergunta, forum.idpergunta FROM forum INNER JOIN info on forum.idutilizador = info.id WHERE forum.idpergunta = $id ";
        $query2 = mysqli_query($jjmpconn, $query);
    if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
        echo "
    <div st>
    
            <center>
                <div style=' text-align: left; color: rgba(77,70,48,0.83);'>
                    <label style='display:inline-block' for='textarearesponse'>" . $row['nickname'] . " : </label>
                    <label rows='4' id='textarearesponse' style='display:inline-block;min-height: 35px; margin-left: 12.5%;margin-right: 12.5%;width:75%;' name='textarearesponse'  disabled>" . $row['pergunta'] . "</label>
                </div>
            </center>
   
            <hr style='background-color: rgba(13,47,71,0.71);'>
          
        <form method='POST'  class=\"form-horizontal\" name=\"responder\" onsubmit=\"return checknull('txtresposta')\">
            <textarea rows='8' style='min-height: 35px;width:100%' name=\"txtresposta\" id=\"txtresposta\"></textarea>
            <br><br>
           
                <button style='width: 100%;' onclick=\"return checknull('txtresposta')\" type='submit' value='$id' class=\"btn btn-primary\" name=\"btnvai\" >
                    Responder
                </button>
           
            
         </form>
    </div>
  
         ";

    }}
    }
    ?>


