
    <?php
    require_once("../../config.php");
    if (isset($_POST['ID'])) {
        $user = $_SESSION['email_user'];
        $id = $_POST['ID'];

        $query = "SELECT info.nickname, forum.pergunta, forum.idpergunta FROM forum INNER JOIN info on forum.idutilizador = info.id WHERE forum.idpergunta = $id ";
        $query2 = mysqli_query($jjmpconn, $query);
    if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
        echo "
    <div>
    
            <center>
                <div style=' text-align: left; color: rgba(77,70,48,0.83);'>
                <label for='textarearesponse'>" . $row['nickname'] . " : </label><br>
                    <textarea rows='4' id='textarearesponse' style='min-height: 35px; margin-left: 12.5%;margin-right: 12.5%;width:75%;' name='textarearesponse'  disabled>" . $row['pergunta'] . "</textarea>
                </div>
            </center>
   
            <hr style='background-color: rgba(13,47,71,0.71);'>
          
        <form method='POST'  class=\"form-horizontal\" name=\"responder\" onsubmit=\"return checknull('txtresposta')\">
            <textarea rows='4' style='min-height: 35px; margin-left: 12.5%;margin-right: 12.5%;width:75%' name=\"txtresposta\" id=\"txtresposta\"></textarea>
            <br><br>
            <center>
            <button onclick=\"return checknull('txtresposta')\" type='submit' value='$id' class=\"btn btn-primary\" name=\"btnvai\" >
                Responder
            </button>
            </center>
            
         </form>
    </div>
  
         ";

    }}
    }
    ?>


