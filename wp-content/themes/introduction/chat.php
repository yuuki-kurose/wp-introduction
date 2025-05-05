<?php get_header(); ?>
<div class="chat__window">
  <h3 class="chat__title">AIと会話してみよう</h3>
  <div class="chat__messages">
    <!-- チャットメッセージはここに表示 -->
  </div>
  <form class="chat__input" id="chat-form">
    <input type="text" id="chat-input" placeholder="AIに話しかけてみてください"></input>
    <button type="submit">送信</button>
  </form>
</div>

<script>
  document.getElementById('chat-form').addEventListener('submit', (e) => {
    e.preventDefault();
    // 送信ボタンがクリックされたときの処理
    const inputText = document.getElementById('chat-input').value;
    if(inputText.trim() === '') {
      return;
    }

    // 取得したテキストをカスタムプラグインに送信・受信する
    fetch('<?php echo admin_url("admin-ajax.php") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'chatgpt_request',
        user_message: inputText
      })
    })
    .then(response => response.json());
    // if(response.ok) {
    //   console.log('Success');
    // } else {
    //   console.log('Error');
    // }
  })
</script>