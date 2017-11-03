<div>
    <?php
    require_once("../../config.php");
    if (isset($_POST['ID'])) {

        $id = $_POST['ID'];
        $query = "SELECT * from forum where idpergunta like $id";
        $query2 = mysqli_query($jjmpconn, $query);
    if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
        echo "
            <div class='card-body' style='text-align: left; color: darkgrey;'>
                " . $row['nickname'] . " : " . $row['pergunta'] . "
            </div>
            <left>
            <form method='Post'>
                    <input style='align-content: left' name=\"txtresposta\" id=\"txtresposta\">
                    <submit  onclick='ifcango()' class=\"btn btn-primary\" name=\"btnvai\" >
                        Responder
                    </submit>
                    </form>
                </left>
         ";
        if (isset($_POST['btnvai'])){

            $queryr = "INSERT INTO respostas (idpergunta,nickname,resposta) VALUES ($id, $_SESSION[email_user]), $_POST[txtresposta]";
            $queryr2 =  mysqli_query($jjmpconn, $query);
        }
    }}
    }
    ?>
</div>
