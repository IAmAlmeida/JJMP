<div>
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

            <div class='card-body' style='  text-align: left; color: darkgrey;'>
                " . $row['nickname'] . " : " . $row['pergunta'] . "
            </div>
            <left>
            <form method='POST'  class=\"form-horizontal\" name=\"responder\" onsubmit=\"return checknull('txtresposta')\">
                    <input style='align-content: left' name=\"txtresposta\" id=\"txtresposta\">
                    <button type='submit' value='$id' class=\"btn btn-primary\" name=\"btnvai\" >
                        Responder
                    </button>
                </left>
         ";

    }}
    }
    ?>
    </form>
</div>
