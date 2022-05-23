<?php if (isset($info)) { ?>
    <div id="info_box">
        <?= $info ?>
    </div>
    <script id=info_script>
        setTimeout(() => {
            document.querySelector('#info_box').classList.add('t_fadeout');
            setTimeout((info_box) => {
                document.querySelector('#info_box').remove();
                document.querySelector('#info_script').remove();
            }, 300);
        }, 10000);
    </script>
<?php } ?>