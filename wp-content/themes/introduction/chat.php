<?php get_header(); ?>
<div class="chat__window">
  <h3 class="chat__title">AIと会話してみよう</h3>
  <div class="chat__messages" id="chat-messages">
    <!-- ここにチャットメッセージを表示 -->
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
    // チャットメッセージのCSSを制御
    document.getElementById('chat-messages').style.display = 'block';
    // 入力されたテキストを取得・表示する
    document.getElementById('chat-messages').textContent = inputText;

    // 取得したテキストをカスタムプラグインに送信・受信する
    fetch('<?php echo admin_url("admin-ajax.php") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'gemini_request',
        user_message: inputText
      })
    })
    .then(response => response.json())
    .then(data => {
      if(data.success) {
        document.getElementById('chat-input').value = '';
        document.getElementById('chat-messages').textContent = data.data;
      } else {
        console.error('Error:', data.data);
      }
    })
  })
</script>