<!DOCTYPE html>
<html>
<body>

<div style="border-top: 3px solid #1122FF;border-bottom: 3px solid #1122FF">
    <div style="margin: auto;width: 50%;padding-top: 20px;padding-bottom: 40px">
        <H1>Welcome to QnA</H1>
        <br>
        <?php
        if(isset($entries)) {
            foreach ($entries as $entry) {
                echo  'Category : ' . $entry['catagoryname']. '<br>';
                echo  'Question : ' . $entry['question'] . '<br>';
                echo  'Answer   : ' . $entry['answer'] . '<br><br><br>';
            }
        }
        ?>
    </div>
</div>

</body>
</html>