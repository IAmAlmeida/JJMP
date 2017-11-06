<div>
    <?php
    require_once("../../config.php");
    if (isset($_POST['ID'])) {
        $user = $_SESSION['email_user'];
        $id = $_POST['ID'];

        $query = "SELECT * from forum where idpergunta like $id";
        $query2 = mysqli_query($jjmpconn, $query);
    if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
        echo "
            <div class='card-body' style='  text-align: left; color: darkgrey;'>
                " . $row['nickname'] . " : " . $row['pergunta'] . "
            </div>
            <left>
            <form method='POST'  class=\"form-horizontal\" name=\"responder\">
                    <input style='align-content: left' name=\"txtresposta\" id=\"txtresposta\">
                    <button type='submit' class=\"btn btn-primary\" name=\"btnvai\" >
                        Responder
                    </button>
                    
                </left>
         ";
        if (isset($_POST['btnvai'])){
            $resposta1 = $_POST['txtresposta'];
            $queryr = "INSERT INTO respostas (idpergunta,nickname,resposta) VALUES ($id,$user,$resposta1)";
            $queryr2 =  mysqli_query($jjmpconn, $query);
            header("refresh:0");
        }
    }}
    }
    ?>
    </form>
</div>
