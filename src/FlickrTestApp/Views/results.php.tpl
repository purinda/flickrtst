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
            foreach ($photos as $photo) {
            ?>
                <img src="<?=$photo->getVariation('Square')->getSource()?>">
            <?php
            }
            ?>
            </tr>
        </tbody>
    </table>
</body>

</html>
