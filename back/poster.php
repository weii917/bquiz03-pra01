<style>
    .item-title {
        display: flex;
        justify-content: space-between;
    }

    .item {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .item-title div,
    .item div {
        width: 24.5%;
        text-align: center;
        /* margin: 0 0.25%; */
    }
</style>

<h3 class="ct">預告片清單</h3>
<div>


    <div class="item-title">
        <div class="ct">預告片海報</div>
        <div class="ct">預告片片名</div>
        <div class="ct">預告片順序</div>
        <div class="ct">操作</div>
    </div>
    <form action="./api/edit_poster.php" method="post">
        <div style="width:100%;height:190px;overflow:auto">
            <?php
            $pos = $Poster->all(" order by rank");
            foreach ($pos as $idx => $po) {
            ?>
                <div class="item">
                    <div>
                        <img src="./img/<?= $po['img']; ?>" style="width:60px;height:80px">
                    </div>
                    <div>
                        <input type="text" name="name[]" value="<?= $po['name']; ?>">
                    </div>
                    <div>
                        <input type="button" value="往上" class="btn" data-id='<?= $po['id']; ?>' data-sw="<?= ($idx != 0) ? $pos[$idx - 1]['id'] : $po['id']; ?>">
                        <input type="button" value="往下" class="btn" data-id='<?= $po['id']; ?>' data-sw="<?= ((count($pos) - 1 != $idx)) ? $pos[$idx + 1]['id'] : $po['id']; ?>">
                    </div>
                    <div>
                        <input type="checkbox" name="sh[]" value="<?= $po['id']; ?>" <?= ($po['sh'] == 1) ? 'checked' : ''; ?>>顯示
                        <input type="checkbox" name="del[]" value="<?= $po['id']; ?>">刪除
                        <input type="hidden" name="id[]" value="<?= $po['id']; ?>">
                        <select name="ani[]" id="">
                            <option value="1" <?= ($po['ani'] == 1) ? 'selected' : ''; ?>>淡入淡出</option>
                            <option value="2" <?= ($po['ani'] == 2) ? 'selected' : ''; ?>>縮放</option>
                            <option value="3" <?= ($po['ani'] == 3) ? 'selected' : ''; ?>>滑入滑出</option>
                        </select>

                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="ct">
            <input type="submit" value="編輯確定"><input type="reset" value="重置">
        </div>
    </form>
</div>
<h3>新增預告片海報</h3>
<form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
    <div class="ts">
        <table>
            <tr>
                <td>預告片海報:</td>
                <td>
                    <input type="file" name="poster" id="">
                </td>
                <td>預告片片名:</td>
                <td>
                    <input type="text" name="name" id="">
                </td>
            </tr>
        </table>
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    $(".btn").on("click", function() {
        let id = $(this).data('id');
        let sw = $(this).data('sw');
        $.post("./api/edit_poster", {
            id,
            sw,
            table
        }, () => {
            location.reload();
        })
    })
</script>