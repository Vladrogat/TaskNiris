<?php
    session_start();
    require_once "vendor/autoload.php";
    require_once "template/header.php";
    use \App\Services\DB;
    DB::start();
    $cities = DB::getAll();
?>
    <div class="container">
        <div class="btn toggle-btn animation" onclick="openForm()">
            Добавить город
        </div>
        <div class="wraper">
            <table class="table">
                <tr>
                    <th>
                        Название
                    </th>
                    <th>
                        Площадь(км^2)
                    </th>
                    <th>
                        Население (тыс. человек)
                    </th>
                </tr>
                <?php
                foreach ($cities as $city) {
                ?>
                <tr class="row animation">
                    <td><?= $city["name"]?></td>
                    <td><?= $city["square"]?></td>
                    <td><?= $city["population"]?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <div id="form" class="block <?=$_SESSION["errors"]?"active":""?>">
            <?php
            if($_SESSION["errors"]) {
                foreach ($_SESSION["errors"] as $error) {
                    ?>
                    <div class="error">
                        <?=$error?>
                    </div>
                    <?php
                }
            }
            ?>
            <form method="post" action="create.php">
                <img onclick="closeForm()" class="close" src="assets/Close_round.png" alt="">
                <div class="group">
                    <div class="lable"><label for="name">Название</label></div>
                    <input class="input" type="text" id="name" name="name" placeholder="">
                </div>
                <div class="group">
                    <div class="lable"><label for="square">Площадь км^2</label></div>
                    <input class="input" min="0" value="0" type="number" name="square" id="square" placeholder="">
                </div>
                <div class="group">
                    <div class="lable"><label for="population">Население (тыс)</label></div>
                    <input class="input" min="0" maxlength="10" value="0" type="number" name="population" id="population" placeholder="">
                </div>
                <button class="btn btn-submit input" type="submit">Добавить</button>
            </form>
        </div>
    </div>

<script src="assets/js/script.js"></script>
<?php
    require_once "template/footer.php";
    DB::close();
    unset($_SESSION["errors"]);
?>
