$(document).ready(function() {
        // 何もしなくてもホバー時のスタイルが適用されるよう、初期画像を非表示にする
        $('.delete-icon').css('background-image', 'none');

        $('.delete-icon').hover(
            function() {
                // ホバー時の画像パスに切り替える
                $(this).css('background-image', 'url("images/trash-h.png")');
            },
            function() {
                // 非ホバー時の画像パスに戻す
                $(this).css('background-image', 'url("images/trash.png")');
            }
        );
    });
