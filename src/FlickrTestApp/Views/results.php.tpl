<!DOCTYPE HTML>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Cache-control" content="NO-CACHE">
    <meta http-equiv="Pragma" content="NO-CACHE">
    <title>Results for <?=$query?></title>
</head>
<body>
    <form action="/search/" method="get">
        <input type="text" name="query" value="<?=$query?>" placeholder="Search..." required>
        <button type="submit">Search</button>
    </form>

    <table>
        <tbody>
            <tr>
            <?php
            if (!empty($photos)) {
                foreach ($photos as $photo) {
                    $variations = $photo->getVariations();
                    $largest    = end($variations);
                ?>
                <td>
                    <a href="<?=$largest->getSource()?>" target="_blank">
                        <img src="<?=$photo->getVariation('Square')->getSource()?>">
                    </a>
                </td>
                <?php
                }
            } else {
            ?>
                <strong>No results found</strong>
            <?php
            }
            ?>
            </tr>
        </tbody>
    </table>

    <a href="<?=$prev?>">Previous</a>
    <a href="<?=$next?>">Next</a>
</body>

</html>
